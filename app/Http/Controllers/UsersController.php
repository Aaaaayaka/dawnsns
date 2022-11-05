<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = DB::table ('users')
        ->where('id', Auth::id())
        ->first();
        return view('users.profile',compact('user'));
    }
    public function search(){
        $users = DB::table('users')
        ->leftjoin('follows','users.id','follows.follower')
        ->select('users.*','follows.follow','follows.follower')
        ->groupBy('users.id')
        ->get();
        //dd($users);
        return view('users.search',compact('users'));
    }
    public function follow(Int $user)
    {
        DB::table('follows')
        ->insert([
            'follow' => $user,
            'follower' => Auth::id(),
            'created_at' => now()
        ]);
            return back();
    }
    public function unfollow(Int $user)
    {

        DB::table('follows')
        ->where('follow', $user)
        ->where('follower',Auth::id())
        ->delete();
            return back();
    }
}