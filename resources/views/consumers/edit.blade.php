@extends('layouts.newapp')

@section('title')
    Edit {{ $consumer->name }}
@endsection

@section('content')
<form method="Post" action="{{ route('consumers.update', [$consumer]) }}">
        @csrf
        <p>
            Name: <input type="text" name="name"
                value="{{ $consumer-> name }}">
        </p>
        <p>
            
            D.O.B: <input type="text" name="date_of_birth"
                value="{{ $consumer->date_of_birth }}">
            (YYYY-MM-DD)
        </p>

        <input type="submit" value="submit">

        
    </form>
    <a href="{{ route('consumers.show', [$consumer]) }}">
            Cancel
        </a>
@endsection