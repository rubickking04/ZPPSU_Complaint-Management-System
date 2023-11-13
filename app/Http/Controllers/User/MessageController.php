<?php

namespace App\Http\Controllers\User;

use App\Models\Reply;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = Message::where('user_id', Auth::user()->id)->get();
        return view('user.message', compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::find($id);
        $admin_id = $message->sender->id;
        $message_id = $message->id;
        $name = $message->sender->name;
        $body = $message->body;
        // $reply = Reply::where('admin_id', Auth::guard('admin')->user()->id)->get();
        $reply = Reply::where('user_id', Auth::user()->id)->get();
        // $sender = Reply::where('admin_id', $admin_id)->get();
        return view('user.view_message',compact('body', 'admin_id', 'message_id', 'reply', 'name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
