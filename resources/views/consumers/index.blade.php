@extends('layouts.newapp')

@section('title')
    Consumers
@endsection

@section('content')
    <p>
        The Consumers of CSC348
    </p>
    
    @if (session('message'))

        <p><b>
            {{ session('message') }}
        </p></b>
        
    @endif
    <p>
        Click a consumer's name for information and related comments
    <ul>
        @foreach ($consumers as $consumer)
            <li>
                <a href="{{ route('consumers.show', [$consumer]) }}">
                    {{ $consumer->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('consumers.create') }}">
        Create new consumer
    </a>
@endsection