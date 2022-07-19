@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Messages List
        </div>

        @foreach($msg as $message)
          <div>
            {{ $loop->index }} - {{ $message['nom'] }} : {{ $message['message'] }}
            @if($loop->first)
              <span> - first in the loop</span>
            @endif
            @if($loop->last)
              <span> - last in the loop</span>
            @endif
          </div>
        @endforeach

    </div>
</div>
@endsection