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
                              
                                    <div class="chat-image">
                                            {!! makeImageFromName($user->name) !!}
                                    </div>

                                    <div class="chat-name font-weight-bold">
                                        {{ $user->name }}
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
