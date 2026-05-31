@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Timetables List</h3>

                    <div class="card-tools">
                        <a href="{{ route('timetables.create') }}" class="btn btn-primary btn-sm">
                            + Add Timetable
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Course</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Room</th>
                                <th>Lecturer</th>
                                <th width="150px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($timetables as $timetable)
                                <tr>
                                    <td>{{ $timetable->id }}</td>
                                    <td>{{ $timetable->course_name }}</td>
                                    <td>{{ $timetable->day }}</td>
                                    <td>{{ $timetable->start_time }} - {{ $timetable->end_time }}</td>
                                    <td>{{ $timetable->room }}</td>
                                    <td>{{ $timetable->lecturer }}</td>
                                    <td>
                                        <a href="{{ route('timetables.show', $timetable->id) }}" class="btn btn-info btn-sm">
                                            View
                                        </a>

                                        <a href="{{ route('timetables.edit', $timetable->id) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('timetables.destroy', $timetable->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No timetables found.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection