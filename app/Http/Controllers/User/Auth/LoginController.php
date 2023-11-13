<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.auth.login');
    }

    /**
     * Logs in the Authenticated User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' =>  'required'
        ]);
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return redirect()->route('user.home');
        }
        return $this->sendMyFailedLoginResponse($request);
    }

    /**
     * Checks the password of a user and sends a failed login response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendMyFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        // Load user from database
        $user = \App\Models\User::where($this->username(), $request->{$this->username()})->first();
        if ($user && !Hash::check($request->password, $user->password)) {
            $errors = ['password' => 'The password is incorrect.'];
        }
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        return redirect()->back()->withInput($request->only($this->username(), 'remember'))->withErrors($errors);
    }
}
