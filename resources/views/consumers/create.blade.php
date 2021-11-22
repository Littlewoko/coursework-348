@extends('layouts.newapp')

@section('title')
    Create Consumer
@endsection

@section('content')
    <form method="POST" action="{{ route('consumers.store') }}">
        @csrf
        <p>
            Name: <input type="text" name="name">
        </p>
        <p>
            D.O.B: <input type="text" name="date_of_birth">
        </p>

        <input type="submit" value="submit">

        <a href="{{ route('consumers.index') }}">
            Cancel
        </a>
    </form>
@endsection