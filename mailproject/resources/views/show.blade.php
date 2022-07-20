@extends('layouts.app')

@section('content')
<div class="wrapper msg-details">
  <h1>Messages from {{ $msg->name }}</h1>
  <p class="type"> - {{ $msg->message }}</p>
  <form action="/msg/{{ $msg->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn">Delete message</button>

  </form>
</div>
<a href="/msg" class="back"><- Back to all messages</a>
@endsection