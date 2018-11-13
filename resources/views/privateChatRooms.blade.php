@extends('layouts.app')

@section('content')

           <private-chat-Rooms :userroomids="{{ json_encode(Auth::user()->rooms->pluck('id')) }}" ></private-chat-Rooms>

@endsection
