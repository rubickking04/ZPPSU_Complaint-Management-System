<?php

namespace App\Http\Controllers\User;

use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InformationRequest;

class PersonalInformationController extends Controller
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
    public function store(InformationRequest $request)
    {
        // Validate the request and assign it to a variable
        $validatedData = $request->validated();
        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = Auth::user()->id;
        // Create the Information record using the validated data
        $info = Information::create($validatedData);
        return back()->with('success', 'Information added successfully.');
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
    public function update(InformationRequest $request, string $id)
    {
        // Validate the request data
    $validatedData = $request->validated();
    // Find the Information record by ID
    $info = Information::find($id);
    // Update the fields with the validated data
    $info->update([
        'student_id' => $request->input('student_id'),
        'department' => $request->input('department'),
        'section' => $request->input('section'),
        'year_level' => $request->input('year_level'),
        'address' => $request->input('address'),
        'phone_number' => $request->input('phone_number'),
    ]);
        return back()->with('success', 'Information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
