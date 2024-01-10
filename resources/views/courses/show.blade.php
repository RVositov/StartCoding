@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $course->name }}</h2>
        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Точно хотите удалить?')">Delete</button>
        </form>
    </div>
@endsection
