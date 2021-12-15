@extends('layouts.newapp')

@section('title')
    Create Consumer
@endsection

@section('content')
    <form method="POST" action="{{ route('consumers.store') }}">
        @csrf
        <p>
            Name: <input type="text" name="name"
                value="{{ old('name') }}" required>
        </p>
        <p>
            
            D.O.B: <input type="text" name="date_of_birth"
                value="{{ old('date_of_birth') }}">
            (YYYY-MM-DD)
        </p>

        <input type="submit" value="submit">

        <a href="{{ route('consumers.index') }}">
            Cancel
        </a>
    </form>
@endsection