<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Auth::user()->category;
        if ($category === 'admin') {
            return view('home');
        } else {
            $user = User::find(Auth::user()->id);
            $student_msg = "";
            if ($user->status === "in") {
                // check if in or out
                $user->status = "out";
                $user->save();
                $student_msg = "Student Signed out!";
            } else {
                $user->status = "in";
                $user->save();
                $student_msg = "Student Signed in!";
            }

            Auth::logout();
            return view('auth.login')
                ->with('student_msg', $student_msg);

        }

    }

}
