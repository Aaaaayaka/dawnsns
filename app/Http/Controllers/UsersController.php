<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(Int $user){
        $user = DB::table ('users')
        ->where('id', $user, 'users.name')
        ->first();
        $userTweets = DB::table ('posts')
        ->join('users','users.id','=','posts.user_id')
        ->select('posts.user_id', 'posts.posts', 'posts.created_at', 'users.id', 'users.username', 'users.images')
        ->get();
        return view('users.profile',compact('user', 'userTweets'));
    }

    public function profileEdit(){
        $user = Auth::user();
        return view('users.profileEdit',compact('user'));
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