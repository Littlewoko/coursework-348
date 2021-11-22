@extends('layouts.newapp')

@section('title')
    {{ $consumer->name }}
@endsection

@section('content')
    <ul>
        <li>ID: {{ $consumer->id }}</li>
        <li>Name: {{ $consumer->name }}</li>
        <li>
            D.O.B: 
            {{ $consumer->date_of_birth ?? 'Unknown'}}
        </li>
    </ul>
@endsection
