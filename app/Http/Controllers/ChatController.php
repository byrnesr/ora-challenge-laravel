<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Chat;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $chats = DB::table('chats')
            ->leftJoin('messages', 'chats.last_message', '=', 'messages.id')
            ->leftJoin('users', 'messages.user_id', '=', 'users.id')
            ->select('chats.*', 'messages.body', DB::raw('users.name as user_name'), 'messages.created_at')
            ->get();

        return view('chat.chat-list', compact('chats'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(){
        $chat = Chat::create([
            'name' => Input::get('name'),
        ]);
        $chat->save();
        flash("Chat created successfully!");
        return redirect('/chats');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        try {
            $chat = Chat::findOrFail($id);
        }catch(ModelNotFoundException $e){
            flash("The chat with ID: ". $id ." was not found.");
            return redirect("chats");
        }
        $messages = DB::table('messages')
            ->join('users', 'messages.user_id', '=', 'users.id')
            ->select('messages.*', 'users.name')
            ->where('chat_id', $id)->get();
        return view('chat.chat-page', compact('id', 'chat', 'messages'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function newMessage($id){
        $message = Message::create([
            'body' => Input::get('body'),
            'chat_id' => $id,
            'user_id' => Auth::user()->id,
        ]);
        $chat = Chat::find($id);
        $message->save();
        $chat->last_message = $message->id;
        $chat->save();
        return redirect('/chat/'.$id);
    }
}
