@extends('layouts.login')

@section('content')

<div id='container'>
    <img src="/images/{{ $user->images }}" alt="">

    {!! Form::open(['url' => '/profileEdit/update']) !!}

    <p>UserName</p>
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',$user->username,['class' => 'input']) }}

    <p>MailAddress</p>
    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',$user->mail,['class' => 'input']) }}

    <p>Password</p>
    {{ Form::label('パスワード') }}
    {{ Form::input('password', 'password', $user->password, ['class' => 'input']) }}

    <p>new Password</p>
    {{ Form::label('新パスワード') }}
    {{ Form::input('password', 'new-password', null, ['class' => 'input']) }}

    <p>Bio</p>
    {{ Form::label('自己紹介') }}
    {{ Form::text('bio',$user->bio,['class' => 'input']) }}

    <p>Icon Image</p>
    {{ Form::label('アイコン') }}
    {{ Form::text('icon',$user->image,['class' => 'input']) }}

    {{ Form::submit('更新', ['class'=>'update_btn']) }}

    {!! Form::close() !!}
</div>

@endsection