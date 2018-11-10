<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Requests\OpenChatMessage;
use App\Http\Requests\PrivateChatMessage;
use App\Contracts\MessageContract;
use App\Events\OpenChat;


class ChatController extends Controller
{
    public function openChat(){
        return view('openChat');
    }

    public function privateChat(){
        return view('privateChat');
    }

    public function privateChatRooms(){
        return view('privateChatRooms');
    }


    public function addOpenChatMessage(OpenChatMessage $request){

        try{
            event(new OpenChat( $request->get('text')) );
        }
        catch (\Exception $e){
            report($e);

            return Response($e->getMessage(),$e->getCode());
        }


        return Response(200);
    }

    public function addPrivateChatMessage(PrivateChatMessage $request){

        dd($request->all());

        return Response(200);
    }

}
