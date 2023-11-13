<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Complain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complain = Complain::withTrashed()->where('user_id', Auth::user()->id)->latest()->paginate(5);
        return view('user.complain',compact('complain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'incident_place' => 'required|string|max:2000',
            'incident_date' => 'required|date',
            'incident_event' => 'required|string|max:2000',
            'incident_attempted' => 'required|string|max:2000',
            'description' => 'required|string|max:2000',
            'complain_attempts' => 'required|string|max:2000',
            'solution' => 'required|string|max:2000',
            'file' => 'required',
            'detail' => 'required',
        ]);
        $complain = Complain::create([
            'user_id' => Auth::user()->id,
            'incident_place' => $request->input('incident_place'),
            'incident_date' => $request->input('incident_date'),
            'incident_event' => $request->input('incident_event'),
            'incident_attempted' => $request->input('incident_attempted'),
            'description' => $request->input('description'),
            'complain_attempts' => $request->input('complain_attempts'),
            'solution' => $request->input('solution'),
            'file' =>$request->input('file'),
            'detail' => $request->input('detail'),
        ]);
        return redirect()->route('user.complain');
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

    /**
     * Remove the specified resource from storage.
     */
    public function complain(Request $request)
    {
        return view('user.complains');
    }

    /**
     * Display the specified resource.
     */
    public function tmpUpload(Request $request)
    {
        if (request()->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            request()->file('file')->storeAs('files/tmp/', $filename, 'public');
            return $filename;
        }
        return '';
    }
}
