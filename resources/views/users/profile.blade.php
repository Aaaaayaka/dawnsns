@extends('layouts.login')

@section('content')

<div id='container'>
    <img src="/images/{{ Auth::user()->images }}" alt="">
    <p>UserName</p>
    <p>MailAddress</p>
    <p>Password</p>
    <p>new Password</p>
    <p>Bio</p>
    <p>Icon Image</p>
    <form action="" method="post">
        <input type="submit" value="更新する">
    </form>
</div>

@endsection