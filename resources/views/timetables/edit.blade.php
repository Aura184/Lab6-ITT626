@extends('adminlte.template')

@section('content')

<div class="row px-2 mb-4" style="justify-content: space-between">
    <div class="">
        <h4 class="font-weight-bold">Edit Timetable</h4>
    </div>
    <div class="">
        <form action="{{ route('timetables.destroy', $timetable->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">
                <i class="fas fa-trash-alt mr-2"></i> Delete
            </button>
        </form>
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
    <form method="POST" action="{{ route('timetables.update', $timetable->id) }}">
        @csrf
        @method('PUT')
        
        {{-- Your input dropdowns and time fields populated with $timetable values go here --}}
        
    </form>
</div>

@endsection