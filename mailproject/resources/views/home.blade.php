@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div class="row chat-row">
        <div class="col-md-3">
        <livewire:chat /> 
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
            socket.on('connection', function() {
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
