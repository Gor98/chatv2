<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function openChat(){
        return view('openChat');
    }

    public function addMessage(Request $request){

        dd($request->all());

    }

}
