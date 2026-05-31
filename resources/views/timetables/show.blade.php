@extends('adminlte.template')

@section('content')

<div class="row px-2 mb-4" style="justify-content: space-between">
    <div class="">
        <h4 class="font-weight-bold">Timetable Details</h4>
    </div>
    <div class="">
        <a class="btn btn-outline-primary" href="{{ route('timetables.edit', $timetable->id) }}">
            <i class="fas fa-edit mr-1"></i>Edit
        </a>
    </div>
</div>

<div class="row px-2">
    <div class="col-md-6 p-4" style="background-color: white; border-radius: 12px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
        <p><strong>Day:</strong> {{ $timetable->day->day_name }}</p>
        <p><strong>Subject:</strong> {{ $timetable->subject->subject_name }}</p>
        <p><strong>Hall:</strong> {{ $timetable->hall->lecture_hall_name }}</p>
        <p><strong>Time From:</strong> {{ $timetable->time_from }}</p>
        <p><strong>Time To:</strong> {{ $timetable->time_to }}</p>
    </div>
</div>

<div class="mt-4">
    <a class="btn btn-outline-primary" href="{{ route('timetables.index') }}">Back</a>
</div>

@endsection