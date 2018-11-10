<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Requests\OpenChatMessage;
use App\Contracts\MessageContract;
use App\Events\OpenChat;


class ChatController extends Controller
{
    public function openChat(){
        return view('openChat');
    }

    public function privateChat(){

    }

    public function addOpenChatMessage(OpenChatMessage $request){

        event(new OpenChat( $request->get('text')) );

        return Response(200);
    }

    public function addPrivateChatMessage(Request $request){

        dd($request->all());

    }

}
