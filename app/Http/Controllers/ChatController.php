<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ChatController extends Controller
{
    public function index(){
        $chats = DB::table('chats')->get();
        return view('chat-list', compact('chats'));
    }

    public function create(){
        $chat = Chat::create([
            'name' => Input::get('name'),
        ]);
        $chat->save();
        flash("Chat created successfully!");
        return redirect('/chats');
    }
}
