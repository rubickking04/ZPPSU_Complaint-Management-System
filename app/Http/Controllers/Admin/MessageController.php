<?php

namespace App\Http\Controllers\Admin;

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
        $message = Message::with('reciever')->latest()->paginate(5);
        // dd($message);
        return view('admin.message',compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:50',
        ]);
        $message = Message::create([
            'admin_id' => Auth::user()->id,
            'user_id' => $request->input('user_id'),
            'body' => $request->input('body'),
        ]);
        return back()->with('success', 'Message sent successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::find($id);
        $user_id = $message->reciever->id;
        $message_id = $message->id;
        $reciever = $message->reciever->name;
        $body = $message->body;
        // $reply = Reply::where('admin_id', Auth::guard('admin')->admin()->id)->get();
        $reply = Reply::where('message_id', $message->id)->get();
        return view('admin.view_message',compact('reciever','body', 'user_id', 'message_id', 'reply'));
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
