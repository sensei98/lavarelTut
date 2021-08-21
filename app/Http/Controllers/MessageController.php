<?php

namespace App\Http\Controllers;
use App\Models\Message;

use Illuminate\Http\Request;


class MessageController extends Controller
{
    public function create(Request $request){
        $message = new Message();
        $message->title = $request->title;
        $message->content = $request->content;

        $message->save();
        return redirect('/');
    }
    public function view($id){
        $message = Message::findOrFail($id); //throw a 404 error if does not exist
        // echo $message->title;
        return view('message',[
            'message'=> $message
        ]);
    }
}
