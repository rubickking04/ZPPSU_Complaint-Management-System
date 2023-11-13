<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string'
        ]);
        $reply = Reply::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'user_id' => $request->input('user_id'),
            'message_id' => $request->input('message_id'),
            'body' => $request->input('body'),
        ]);
        return back()->with('success', 'Reply sent successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
