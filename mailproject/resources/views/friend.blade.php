@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content"> 
        <div class="title m-b-md">
            Messages List

        </div>
        <p class="mssg">{{ session('mssg')}}</p>

        @foreach($msg as $message)
          <div>
            <a href="/msg/{{$message->id}}">

                {{ $message->name}} : {{ $message->message }}
            </a>
          </div>
        @endforeach

    </div>
</div>
@endsection