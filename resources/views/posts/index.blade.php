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

        <table class='table table-hover'>

            @foreach ($tweets as $tweet)
                <tr>
                    <td>
                        <img src="/images/{{ $tweet->images }}" alt="">
                    </td>
                    <td>{{ $tweet->username }}</td>
                    <td>{{ $tweet->posts }}</td>
                    <td><a class="btn-primary" href="/post/{{ $tweet->id }}/update" data-target="{{ $tweet->id }}"><img src="images/edit.png"></a></td>
                    <td><a class="btn btn-danger" href="/post/{{ $tweet->id }}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"><img src="images/trash.png"></a></td>
                    <td>{{ $tweet->created_at }}</td>
                </tr>
                <div class="modal" id="{{ $tweet->id }}">
                        {!! Form::open(['url' => '/post/update']) !!}
                        {!! Form::hidden('id', $tweet->id) !!}
                        {!! Form::input('text', 'up_tweet', $tweet->posts, ['required', 'class' => 'form-control']) !!}
                        {{Form::submit('送信', ['class'=>'btn btn-primary btn-block'])}}
                        {!! Form::close() !!}
                </div>
            @endforeach


        </table>
        </div>
@endsection
