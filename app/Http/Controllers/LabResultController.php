<?php

namespace App\Http\Controllers;

use App\Models\LabResult;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\LabTechnician;
use Illuminate\Http\Request;

class LabResultController extends Controller
{

    public function index()
    {
        $query = LabResult::with(['patient.user', 'doctor.user', 'labTechnician.staff.user']);

        // Apply filters
        if (request('patient_id')) {
            $query->where('patient_id', request('patient_id'));
        }

        if (request('doctor_id')) {
            $query->where('doctor_id', request('doctor_id'));
        }

        if (request('lab_technician_id')) {
            $query->where('lab_technician_id', request('lab_technician_id'));
        }

        if (request('status')) {
            $query->where('status', request('status'));
        }

        if (request('is_abnormal')) {
            $query->where('is_abnormal', true);
        }

        $labResults = $query->latest()->paginate(10);

        // Get data for filter dropdowns
        $patients = Patient::with('user')->get();
        $doctors = Doctor::with('user')->get();
        $labTechnicians = LabTechnician::with('staff.user')->get();

        return view('lab-results.index', compact('labResults', 'patients', 'doctors', 'labTechnicians'));
    }

    public function create(Request $request)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $labTechnicians = LabTechnician::all();

        // If this is a follow-up request, get the original test
        $followUpTest = null;
        if ($request->has('follow_up_id')) {
            $followUpTest = LabResult::findOrFail($request->follow_up_id);
            // Get the original test to get patient and doctor information
            $originalTest = LabResult::findOrFail($followUpTest->original_result_id);
            $followUpTest->patient_id = $originalTest->patient_id;
            $followUpTest->doctor_id = $originalTest->doctor_id;
            $followUpTest->lab_technician_id = $originalTest->lab_technician_id;
        }

        return view('lab-results.create', compact('patients', 'doctors', 'labTechnicians', 'followUpTest'));
    }

    public function store(Request $request)
    {
        // If this is a follow-up result, update the existing record
        if ($request->has('follow_up_id')) {
            $validated = $request->validate([
                'patient_id' => 'required|exists:patients,id',
                'doctor_id' => 'required|exists:doctors,id',
                'lab_technician_id' => 'required|exists:lab_technicians,id',
                'test_name' => 'required|string|max:255',
                'test_category' => 'required|string|max:255',
                'result_value' => 'required|string',
                'reference_range' => 'nullable|string',
                'is_abnormal' => 'boolean',
                'test_date' => 'required|date',
                'status' => 'required|in:pending,completed,reviewed',
                'follow_up_id' => 'required|exists:lab_results,id',
            ]);

            $labResult = LabResult::findOrFail($validated['follow_up_id']);
            $labResult->update($validated);
            return redirect()->route('lab-results.show', $labResult)
                ->with('success', 'Follow-up test result created successfully.');
        }

        // For regular results
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'lab_technician_id' => 'required|exists:lab_technicians,id',
            'test_name' => 'required|string|max:255',
            'test_category' => 'required|string|max:255',
            'result_value' => 'required|string',
            'reference_range' => 'nullable|string',
            'is_abnormal' => 'boolean',
            'test_date' => 'required|date',
            'status' => 'required|in:pending,completed,reviewed',
        ]);

        LabResult::create($validated);
        return redirect()->route('lab-results.index')
            ->with('success', 'Lab result created successfully.');
    }

    public function show(LabResult $labResult)
    {
        // Get previous results for the same test and patient
        $previousResults = LabResult::where('patient_id', $labResult->patient_id)
            ->where('test_name', $labResult->test_name)
            ->where('id', '!=', $labResult->id)
            ->orderBy('test_date', 'desc')
            ->get();

        return view('lab-results.show', compact('labResult', 'previousResults'));
    }

    public function orderFollowUp(Request $request, LabResult $labResult)
    {
        $request->validate([
            'follow_up_date' => 'required|date|after:today',
            'follow_up_notes' => 'nullable|string|max:500',
        ]);

        // Create a new lab result for the follow-up with only essential information
        $followUpResult = LabResult::create([
            'test_name' => $labResult->test_name,
            'test_category' => $labResult->test_category,
            'test_date' => $request->follow_up_date,
            'status' => 'pending',
            'follow_up_notes' => $request->follow_up_notes,
            'is_follow_up' => 1,
            'original_result_id' => $labResult->id,
        ]);

        return redirect()->route('lab-results.show', $labResult)
            ->with('success', 'Follow-up test ordered successfully.');
    }

    public function edit(LabResult $labResult)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $labTechnicians = LabTechnician::all();
        return view('lab-results.edit', compact('labResult', 'patients', 'doctors', 'labTechnicians'));
    }

    public function update(Request $request, LabResult $labResult)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'lab_technician_id' => 'required|exists:lab_technicians,id',
            'test_name' => 'required|string|max:255',
            'test_category' => 'required|string|max:255',
            'result_value' => 'required|string',
            'reference_range' => 'nullable|string',
            'is_abnormal' => 'boolean',
            'test_date' => 'required|date',
            'doctor_notes' => 'nullable|string',
            'status' => 'required|in:pending,completed,reviewed',
        ]);

        $labResult->update($validated);

        return redirect()->route('lab-results.index')
            ->with('success', 'Lab result updated successfully.');
    }

    public function destroy(LabResult $labResult)
    {
        $labResult->delete();
        return redirect()->route('lab-results.index')
            ->with('success', 'Lab result deleted successfully.');
    }

    public function technicianDashboard()
    {
        $assignedTests = LabResult::with(['patient.user', 'doctor.user'])
            ->orderBy('test_date', 'asc')
            ->get();

        $pendingTests = $assignedTests->where('status', 'pending')->where('is_follow_up', false);
        $pendingFollowUps = $assignedTests->where('status', 'pending')->where('is_follow_up', true);
        $completedTests = $assignedTests->where('status', 'completed');
        $reviewedTests = $assignedTests->where('status', 'reviewed');

        return view('lab-results.technician-dashboard', compact('pendingTests', 'pendingFollowUps', 'completedTests', 'reviewedTests'));
    }
}
