@extends('layouts.login')

@section('content')

<div id='container'>
    <div class="profile-icon">
        <img src="/images/{{ $user->images }}" alt="" class="image_circle">
    </div>

    {!! Form::open(['url' => '/profileEdit/update']) !!}

    <p class="profile-font">UserName</p>
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',$user->username,['class' => 'input']) }}
    <br>
    <p class="profile-font">MailAddress</p>
    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',$user->mail,['class' => 'input']) }}
    <br>
    <p class="profile-font">Password</p>
    {{ Form::label('パスワード') }}
    {{ Form::input('password', 'password', $user->password, ['class' => 'input']) }}
    <br>
    <p class="profile-font">new Password</p>
    {{ Form::label('新パスワード') }}
    {{ Form::input('password', 'new-password', null, ['class' => 'input']) }}
    <br>
    <p class="profile-font">Bio</p>
    {{ Form::label('自己紹介') }}
    {{ Form::text('bio',$user->bio,['class' => 'input', 'id' => 'bio']) }}
    <br>
    <p class="profile-font">Icon Image</p>
    {{ Form::label('アイコン') }}
    {{ Form::text('icon',$user->image,['class' => 'input', 'id' => 'icon-image']) }}
    <br>
    {{ Form::submit('更新', ['class'=>'update_btn']) }}

    {!! Form::close() !!}
</div>

@endsection