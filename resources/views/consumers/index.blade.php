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
                {{ $consumer->name}}
            </li>
        @endforeach
    </ul>
@endsection