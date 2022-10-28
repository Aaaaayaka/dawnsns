@extends('layouts.login')
@section('content')
     <h1><a><img src="images/dawn.png"></a></h1>
        <!-- <p class="pull-right"><a class="btn btn-success" href="post/create-form"><img src="images/post.png"></a></p> -->
        <div id='container'>
                <h2 class='page-header'></h2>
                    {!! Form::open(['url' => 'post/create']) !!}
                        <div class="form-group">
                            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
                        </div>
                        <!-- <button type="submit" class="btn btn-success pull-right"><img src="images/post.png"></button> -->
                        <!-- <a type="submit" class="btn btn-success pull-right"><img src="images/post.png"></a> -->
                        <input type="image" src="images/post.png" alt="投稿ボタン">
                    {!! Form::close() !!}


                    <!-- ここにツイートを表示する（index.blade) -->

        </div>
@section('content')
@endsection