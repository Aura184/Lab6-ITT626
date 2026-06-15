<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
use App\Models\Subject;
use App\Models\Hall;
use App\Models\Day;
use App\Models\LecturerGroup;

class StudentTimetableController extends Controller
{
    /**
     * Display timetable list
     */
   public function index()
{
    $timetables = Timetable::all();

    return view('timetables.index', compact('timetables'));
}

    /**
     * Show create form
     */
    public function create()
    {
        $days = Day::pluck('day_name', 'id');
        $halls = Hall::pluck('lecture_hall_name', 'id');
        $subjects = Subject::pluck('subject_name', 'id', 'subject_code');

        return view('timetables.create', compact('days', 'halls', 'subjects'));
    }

    /**
     * Store new timetable
     */
    public function store(Request $request)
    {
        $result = Timetable::create([
            'user_id'    => auth()->user()->id,
            'day_id'     => $request->day_id,
            'subject_id' => $request->subject_id,
            'hall_id'    => $request->hall_id,
            'time_from'  => $request->time_from,
            'time_to'    => $request->time_to,
        ]);

        if (!$result) {
            return redirect()->route('timetables.index')
                ->with('failed', 'Timetable not created');
        }

        return redirect()->route('timetables.index')
            ->with('success', 'Timetable created successfully.');
    }

    /**
     * Show timetable details
     */
    public function show(Timetable $timetable)
{
    $timetable->load(['subject', 'hall', 'day']);

    return view('timetables.show', compact('timetable'));
}

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $timetable = Timetable::findOrFail($id);

        $days = Day::pluck('day_name', 'id');
        $halls = Hall::pluck('lecture_hall_place', 'id');
        $subjects = Subject::pluck('subject_name', 'id');

        return view('timetables.edit', compact('timetable', 'days', 'halls', 'subjects'));
    }

    /**
     * Update timetable
     */
    public function update(Request $request, Timetable $timetable)
{
    $request->validate([
        'day_id'     => 'required',
        'subject_id' => 'required',
        'hall_id'    => 'required',
        'time_from'  => 'required',
        'time_to'    => 'required',
    ]);

    $result = $timetable->update([
        'day_id'     => $request->day_id,
        'subject_id' => $request->subject_id,
        'hall_id'    => $request->hall_id,
        'time_from'  => $request->time_from,
        'time_to'    => $request->time_to,
    ]);

    if (!$result) {
        return redirect()->route('timetables.index')
            ->with('failed', 'Timetable not updated');
    }

    return redirect()->route('timetables.index')
        ->with('success', 'Timetable updated successfully.');
}

    /**
     * Delete timetable
     */
   public function destroy($id)
{
    $timetable = Timetable::findOrFail($id);
    $timetable->delete();

    return redirect()->route('timetables.index')
        ->with('success', 'Timetable deleted successfully');
}
}