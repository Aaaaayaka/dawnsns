@extends('layouts.login')

@section('content')

<div id='container'>

            {!! Form::open(['url' => 'post/create']) !!}
                <div class="form-group">
                            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
                </div>
                <input type="image" src="images/post.png" alt="ユーザー名">
            {!! Form::close() !!}
</div>

@endsection