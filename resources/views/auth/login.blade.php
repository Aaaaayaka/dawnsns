@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p class=welcome>DAWNSNSへようこそ</p>
<div class=box>
{{ Form::label('MailAddress') }}
<br>
{{ Form::text('mail',null,['class' => 'input']) }}
<br>
<br>
{{ Form::label('password') }}
<br>
{{ Form::password('password',['class' => 'input']) }}
<br>
<br>
{{ Form::submit('LOGIN',['class' => 'submit']) }}
<br>
</div>
<a href="/register" class=register>新規ユーザーの方はこちら</a>

{!! Form::close() !!}


@endsection