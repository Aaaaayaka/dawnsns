@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

<p>UserName</p>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

<p>MailAddress</p>
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

<p>Password</p>
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

<p>Password confirm</p>
{{ Form::label('パスワード確認') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
