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

                    
                    <br/>
                    <div class="message">
                    
                        <a href="/msg"><i class="fa-solid fa-messages"></i>View all messages</a>
                    </div>
                    <br/>
                    <div class="friend">
                       
                        <a href="/friend"> <i class="fa-solid fa-user-group"></i>View all friends</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
