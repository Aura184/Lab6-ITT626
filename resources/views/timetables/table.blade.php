@extends('adminlte::page')

@section('title', 'Timetables')

@section('content_header')
    <h1>Timetable List</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Timetable List</h3>

        <div class="card-tools">
            <a href="{{ route('timetables.create') }}" class="btn btn-success btn-sm">
                Add Timetable
            </a>
        </div>
    </div>

    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Day</th>
                    <th>Subject</th>
                    <th>Hall</th>
                    <th>Time From</th>
                    <th>Time To</th>
                    <th width="220px">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($timetables as $timetable)
                    <tr>
                        <td>{{ $timetable->id }}</td>
                        <td>{{ $timetable->day->day_name ?? '' }}</td>
                        <td>{{ $timetable->subject->subject_name ?? '' }}</td>
                        <td>{{ $timetable->hall->lecture_hall_name ?? '' }}</td>
                        <td>{{ $timetable->time_from }}</td>
                        <td>{{ $timetable->time_to }}</td>

                        <td>
                            <a href="{{ route('timetables.show', $timetable->id) }}"
                               class="btn btn-info btn-sm">
                                Show
                            </a>

                            <a href="{{ route('timetables.edit', $timetable->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('timetables.destroy', $timetable->id) }}"
                                  method="POST"
                                  style="display:inline-block">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this timetable?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            No timetables found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@stop