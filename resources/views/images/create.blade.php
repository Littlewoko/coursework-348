@extends('layouts.newapp')

@section('title')
    Create An Image
@endsection

@section('content')
<form action="{{ route('images.create') }}" method="post" enctype="multipart/form-data">

        @csrf
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
        <input type="file" name="file" required>
    </div>
    <div class="form-group">
        <input type="text" name="consumer_id" required>
    </div>
    <button type="submit">Submit</button>
</form>
@endsection