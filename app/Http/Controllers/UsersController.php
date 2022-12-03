<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

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

    public function profileUpdate(Request $request)
    {
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $image = $request->input('image');
        //dd($image);

        DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'username' => $username,
                'mail' => $mail,
        ]);

        // もし$passwordに値があったら
        if($request->password){
        DB::table('users')
        ->where('id', Auth::id())
        ->update([
           'password' => $password,
        ]);
        }

        // もし$bioに値があったら
        if($request->bio){
        DB::table('users')
        ->where('id', Auth::id())
        ->update([
            'bio' => $bio,
        ]);
        }

        // もし$imageに値があったら
        if($request->image){
        DB::table('users')
        ->where('id', Auth::id())
        ->update([
            'image' =>$image,
        ]);
        }
        return redirect('/top');
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

    public function show(User $user)
    {
        $user = User::find($user->id);
        $userTweets = DB::table ('posts')
            ->where('user_id', $user->id)
            ->join('users','users.id','=','posts.user_id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->latest()
            ->get();
        return view('users.profile',[
            'user_name' => $user->name,
            'userTweets' => $userTweets,
            'user'=> $user
            ]);
    }
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = User::query();
        if(!empty($keyword)) {
            $query->where('username', 'LIKE', "%{$keyword}%");
        }
        $users = $query->get();
        return view('users.search', compact('users', 'keyword'));
    }
}