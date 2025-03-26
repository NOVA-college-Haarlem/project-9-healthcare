<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\ScheduleRequest;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $schedules = Schedule::all();
        return view('schedules.create', compact('schedules'));
    }

    public function store(ScheduleRequest $request)
    {
        $schedule = new Schedule();
        $this->save($schedule, $request);
        return redirect()->route('schedules.index');
    }

    public function show(string $id)    
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedules.show', compact('schedule'));
    }

    public function edit(string $id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedules.edit', compact('schedule'));
    }

    public function update(ScheduleRequest $request, string $id)
    {
        $schedule = Schedule::findOrFail($id);
        $this->save($schedule, $request);
        return redirect()->route('schedules.index');
    }

    public function destroy(string $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }

    private function save($schedule, ScheduleRequest $request)
    {
        $schedule->date           = $request->date;
        $schedule->start_time     = $request->start_time;
        $schedule->end_time       = $request->end_time;
        $schedule->save();
    }
}
