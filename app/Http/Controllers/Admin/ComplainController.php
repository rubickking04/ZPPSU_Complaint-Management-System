<?php

namespace App\Http\Controllers\Admin;

use App\Models\Complain;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ApproveMail;
use Illuminate\Support\Facades\Mail;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complain = Complain::with('user.profile_info')->withTrashed()->latest()->paginate(5);
        // dd($complain);
        return view('admin.complain', compact('complain'));
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
     * Softly Removed the specified resource from storage.
     */
    public function soft_delete(string $id)
    {
        $complain = Complain::find($id);
        if ($complain) {
            $email = $complain->user->email;
            Mail::to($email)->send(new ApproveMail($complain));
            $complain->delete();
            return back()->with('success', 'Approved successfully.');
        } else {
            return back()->with('error', 'complain not found.');
        }
    }

    /**
     * Forcely Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $complain = Complain::withTrashed()->find($id);
        if ($complain) {
            $complain->forceDelete();
            return back()->with('success', 'Complaint Deleted successfully.');
        } else {
            return back()->with('error', 'complain not found.');
        }
    }
}
