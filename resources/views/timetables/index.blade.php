@extends('adminlte::page')

@section('title', 'Timetables')

@section('content_header')
    <h1>Timetable List</h1>
@stop

@section('content')

<a href="{{ route('timetables.create') }}" class="btn btn-primary mb-3">
    + Add Timetable
</a>

<div class="card">
    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject ID</th>
                    <th>Hall ID</th>
                    <th>Day ID</th>
                    <th>Time From</th>
                    <th>Time To</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($timetables as $timetable)
                <tr>
                    <td>{{ $timetable->id }}</td>
                    <td>{{ $timetable->subject_id }}</td>
                    <td>{{ $timetable->hall_id }}</td>
                    <td>{{ $timetable->day_id }}</td>
                    <td>{{ $timetable->time_from }}</td>
                    <td>{{ $timetable->time_to }}</td>

                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

@stop