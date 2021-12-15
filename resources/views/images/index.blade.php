@extends('layouts.newapp')

@section('title')
    Images
@endsection

@section('content')
<p>
        The Images of CSC348
    </p>
    
    @if (session('message'))

        <p><b>
            {{ session('message') }}
        </p></b>
        
    @endif

    <ul>
        @foreach ($images as $image)
            <li>
                {{ $image->name }}
                <img src="{{ asset('storage/app/public/images/'.$image->file_path) }}" />
            </li>
        @endforeach
    </ul>
    <a href="{{ route('images.create') }}">
        Create new Image
    </a>
@endsection