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
            ->where('id,follow')
            ->first();
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
