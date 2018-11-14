@extends('layouts.app')

@section('content')

           <private-chat  redirect_rooms="{{route('privateChatRooms')}}" :room_id="{{$room_id}}" :user="{{$user}}"></private-chat>
@endsection
