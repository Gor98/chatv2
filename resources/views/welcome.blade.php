@extends('layouts.app')
@section('content')
    <body>
        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">
                            Laravel Echo-Server Chat
                        </h1>
                    </div>
                </div>
                <div class="row justify-content-around">
                    <div class="col-4">
                        <a role="button" href="{{route('openChat')}}" class="btn btn-outline-success btn-lg btn-block" style=" text-align:center; padding:50px;  height: 150px; width: 350px;">Open Chat</a>
                    </div>
                    <div class="col-4">
                        <a role="button" href="{{route('privateChat')}}" class="btn btn-outline-danger btn-lg btn-block" style=" text-align:center; padding:50px;  height: 150px; width: 350px;">Private Chat</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
