<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\User;

class MessageController extends Controller
{
    public function addMessage(Request $request){
        
        $chat=new Chat();
        $chat->username=auth()->user()->username;
        $chat->msg=$request->msg;
        $chat->save();

        return redirect()->route("chatroom");

    }

    public function chatPage(){
        $allChat=Chat::all();
        $pictures=User::select("username","picture")->get()->toArray();
        $picArray=array();
        foreach($pictures as $item){
            $picArray[$item["username"]]=$item["picture"];
        }
        //find a better way
        $data=[
            "chat"=>$allChat,
            "pictures"=>$picArray,
        ];
        return view("chatroom")->with($data);
    }
}
