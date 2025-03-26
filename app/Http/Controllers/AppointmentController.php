<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // View all appointments (for simplicity, show all appointments)
    public function index()
    {
        $appointments = Appointment::all(); // Fetch all appointments
        return view('appointments.index', compact('appointments'));
    }

    // Show the form to create a new appointment
    public function create()
    {
        $doctors = Doctor::all(); // Fetch all doctors
        return view('appointments.create', compact('doctors'));
    }

    // Store a new appointment
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'scheduled_time' => 'required|date|after:now',
            'reason' => 'required|string|max:255',
        ]);

        Appointment::create([
            'patient_id' => 1, // Hardcoded for simplicity (no auth)
            'doctor_id' => $request->doctor_id,
            'scheduled_time' => $request->scheduled_time,
            'reason' => $request->reason,
            'status_id' => 1, // Default to 'pending' status
            'confirmation_status' => 'pending',
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment scheduled successfully!');
    }

    // Manage appointments (for simplicity, show all appointments)
    public function manage()
    {
        $appointments = Appointment::all(); // Fetch all appointments
        return view('appointments.manage', compact('appointments'));
    }

    // Approve an appointment
    public function approve(Appointment $appointment)
    {
        $appointment->confirm();
        return back()->with('success', 'Appointment approved successfully!');
    }

    // Reschedule an appointment
    public function reschedule(Request $request, Appointment $appointment)
    {


        $request->validate(['rescheduled_time' => 'required|date|after:now']);
        $appointment->reschedule($request->rescheduled_time);

        return back()->with('success', 'Appointment rescheduled successfully!');
    }

    // Cancel an appointment
    public function cancel(Appointment $appointment)
    {
        $appointment->cancel();
        return back()->with('success', 'Appointment cancelled successfully!');
    }
}
