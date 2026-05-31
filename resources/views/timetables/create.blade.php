@extends('adminlte::page')

@section('title', 'Create Timetable')

@section('content_header')
    <h1>Create Timetable</h1>
@stop

@section('content')

<div class="row px-2 mb-4" style="justify-content: space-between">
    <div class="">
        <h4 class="font-weight-bold">New Timetable</h4>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="p-4" style="background-color: white; border-radius: 12px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
    <form method="POST" action="{{ route('timetables.store') }}">
       <div class="form-group mb-3">
    <label>Day</label>
    <select name="day_id" class="form-control">
        <option value="">Select Day</option>
        @foreach($days as $id => $day)
            <option value="{{ $id }}">{{ $day }}</option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label>Subject</label>
    <select name="subject_id" class="form-control">
        <option value="">Select Subject</option>
        @foreach($subjects as $id => $subject)
            <option value="{{ $id }}">{{ $subject }}</option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label>Hall</label>
    <select name="hall_id" class="form-control">
        <option value="">Select Hall</option>
        @foreach($halls as $id => $hall)
            <option value="{{ $id }}">{{ $hall }}</option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label>Time From</label>
    <input type="time" name="time_from" class="form-control">
</div>

<div class="form-group mb-3">
    <label>Time To</label>
    <input type="time" name="time_to" class="form-control">
</div>

<button type="submit" class="btn btn-success">
    Save Timetable
</button>

<a href="{{ route('timetables.index') }}" class="btn btn-secondary">
    Back
</a>
    </form>
</div>

@endsection
