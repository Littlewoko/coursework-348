@extends('layouts.newapp')

@section('title')
    Consumers
@endsection

@section('content')
    <p>
        The Consumers of CSC348
    </p>
    
    <ul>
        @foreach ($consumers as $consumer)
            <li>
                <a href="{{ route('consumers.show', ['id' => $consumer->id]) }}">
                    {{ $consumer->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('consumers.create') }}">
        Create new consumer
    </a>
@endsection