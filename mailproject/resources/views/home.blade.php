@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('You are logged in!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div class="row chat-row">
        <div class="col-md-3">
            <div class="users">
                <i class="far fa-user"></i>
                <h5>Friends</h5>
            </div>
                <ul class="list-group list-chat-item">
                    @if($users->count())
                        @foreach($users as $user)
                        <li class="chat-user-list">
                                <a href="{{ route('message.conversation', $user->id) }}">
                                    <div class="chat-image">
                                            {!! makeImageFromName($user->name) !!}
               

                                     
        
                                    </div>

                                    <div class="chat-name font-weight-bold">
                                        {{ $user->name }}
                                        <i class="fa fa-circle user-status-icon user-icon-{{ $user->id }}" title="away"></i>

                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(function (){
            let user_id = "{{ auth()->user()->id }}";
            let ip_address = '127.0.0.1';
            let socket_port = '8005';
            let socket = io(ip_address + ':' + socket_port);
            socket.on('connect', function() {
                alert("here");
               socket.emit('user_connected', user_id);
            });
            socket.on('updateUserStatus', (data) => {
                let $userStatusIcon = $('.user-status-icon');
                $userStatusIcon.removeClass('text-success');
                $userStatusIcon.attr('title', 'Away');
                $.each(data, function (key, val) {
                   if (val !== null && val !== 0) {
                      let $userIcon = $(".user-icon-"+key);
                      $userIcon.addClass('text-success');
                      $userIcon.attr('title','Online');
                   }
                });
            });
        });
    </script>
@endpush