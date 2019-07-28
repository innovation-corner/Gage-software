<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // pass jwt token to view.
        $jwt_user_token = JWTAuth::customClaims(['exp' => now()->addMinutes(1)->timestamp])->fromUser(Auth::user());
        return view('home')->with(compact('jwt_user_token'));
    }
}
