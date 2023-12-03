<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Complain;
use App\Charts\DataChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest()->take(9)->get();
        $total_users = User::get()->count();
        $total_requests = Complain::get()->count();
        $total_approved = Complain::onlyTrashed()->count();
        $chart = new DataChart;
        $chart->labels([
            'Students',
            'Requests',
            'Approved',
        ]);
        $chart->dataset('Systems Data Chart', 'doughnut',[
            $total_users,
            $total_requests,
            $total_approved,
        ])->color(collect(
            [
                'rgba(54, 162, 235)',
                'rgba(255, 159, 64)',
                'rgba(75, 192, 192)',
            ]
        ))->backgroundColor(collect(
            [
                'rgba(54, 162, 235)',
                'rgba(255, 159, 64)',
                'rgba(75, 192, 192)',
            ]
        ));
        return view('admin.home',compact('total_users', 'total_requests', 'total_approved', 'chart','user'));
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
