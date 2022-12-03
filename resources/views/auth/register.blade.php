@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<br>
<h2>新規ユーザー登録</h2>
<div class=box>
<p>UserName</p>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
<br>
<p>MailAddress</p>
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<br>
<p>Password</p>
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}
<br>
<p>Password confirm</p>
{{ Form::label('パスワード確認') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}
<br>
<br>
{{ Form::submit('REGISTER',['class' => 'submit']) }}
</div>
<p><a href="/login" class=register>ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
