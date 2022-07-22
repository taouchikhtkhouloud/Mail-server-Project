@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <h1 class="title m-b-md">
            Create New Message 
</h1>
<form action="/msg" method="POST">
    @csrf
    <label for="name">to:</label>
    <input type="text" name="name" id="name" required>
    <label for="message">Your message:</label>
    <input type="text" name="message" id="name" required>
    <input class="btn" type="submit" value="Send Message">
</form>
    </div>
</div>
@endsection