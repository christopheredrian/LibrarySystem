<?php

namespace App\Http\Controllers;

use App\Entry;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            return view('admin.dashboard', [
                'entries' => Entry::orderBy('id','desc')->get()
            ]);
        } else {
            $user = User::find(Auth::user()->id);
            $student_msg = "";
            if ($user->status === "in") {
                // find student entry
                $endTime = Carbon::now()->toTimeString();
//                DB::table('entries')
//                    ->where('user_id', '=', $user->id)
//                    ->orderBy('date', 'desc')
//                    ->first()
//                    ->update(['endTime' => $endTime]);
                $entry = Entry::all()->where('endTime', null)->where('user_id', $user->id)->first();
                $entry->endTime = $endTime;
                $entry->save();
                // check if in or out
                $user->status = "out";
                $user->save();
                $student_msg = "Student Signed out!";


            } else {
                // create new entry
                $entry = new Entry;
                $currentDate = Carbon::now();

                // set new entry with data
                $entry->user_id = $user->id;
                $entry->date = $currentDate->toDateString();
                $entry->startTime = $currentDate->toTimeString();
                $entry->endTime = null;
                $entry->save();

                $user->status = "in";
                $user->save();
                $student_msg = "Student Signed in!";


            }

            Auth::logout();
            return view('auth.login', ['student_msg' => $student_msg]);

        }

    }

}
