<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //
    public function index(){
        $user = DB::table ('users')
        ->where('id', Auth::id())
        ->first();
        // dd($user);
        $tweets = DB::table ('posts')
            ->join('users','users.id','=','posts.user_id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->get();
            // ddd($tweets);
        return view('posts.index',['user'=>$user,'tweets'=>$tweets]);
    }
    // public function createForm()
    // {
        // $user = DB::table ('users')
        // ->where('id', Auth::id())
        // ->first();
        // return view('posts.createForm',['user'=>$user]);
    // }

    public function create(Request $request)
    {
        $post = $request->input('newPost');
        DB::table('posts')
        ->insert([
            'posts' => $post,
            'user_id'=> Auth::id(),
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        return redirect('/top');
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_tweet = $request->input('upTweet');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['tweet' => $up_tweet]
            );

        return redirect('/top');
    }
    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

}
