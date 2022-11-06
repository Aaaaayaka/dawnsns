<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $user = DB::table ('users')
            ->where('id', Auth::id())
            ->first();
            // dd($user);
        $tweets = DB::table ('posts')
            ->join('users','users.id','=','posts.user_id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->get();
            // ddd($tweets);
        $follows = DB::table ('follows')
            ->join('users','users.id','=','follows.user_id')
            ->select('follows.id','users.follow_id','users.images')
            // ->where('id','follow')
            // ->first();
            ->get();
            dd($user);
        return view('follows.followList',['user'=>$user,'tweets'=>$tweets,'follows'=>$follows]);
    }
    public function followerList(){
        $user = DB::table ('users')
        ->where('id', Auth::id())
        ->first();
        $tweets = DB::table ('posts')
            ->join('users','users.id','=','posts.user_id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->get();
        return view('follows.followerList',['user'=>$user,'tweets'=>$tweets]);
    }
}
