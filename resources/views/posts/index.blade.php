@extends('layouts.login')

@section('content')
     <h1><a><img src="images/dawn.png" class=image_circle></a></h1>
        <!-- <p class="pull-right"><a class="btn btn-success" href="post/create-form"><img src="images/post.png"></a></p> -->
        <div id='container'>
                <h2 class='page-header'></h2>
                    {!! Form::open(['url' => 'post/create', 'class' => 'form-input']) !!}
                        <div class="form-group">
                            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
                        </div>
                        <input type="image" src="images/post.png" class=image_post alt="投稿ボタン">
                    {!! Form::close() !!}

        <table class='table table-hover'>

            @foreach ($tweets as $tweet)
                <tr>
                    <td>
                        <img src="/images/{{ $tweet->images }}" alt="" class=image_circle>
                    </td>
                    <td>{{ $tweet->username }}</td>
                    <td>{{ $tweet->posts }}</td>
                    @if (Auth::user()->id == $tweet->user_id)
                    <td><a class="btn-primary" href="/post/{{ $tweet->id }}/update" data-target="{{ $tweet->id }}">
                        <img src="images/edit.png"></a>
                    </td>
                    @endif
                    @if (Auth::user()->id == $tweet->user_id)
                    <td><a class="btn btn-danger" href="/post/{{ $tweet->id }}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
                        <img src="images/trash.png" class=trash-image>
                        <img src="images/trash_h.png" class=trash-hidden></a>
                    </td>
                    @endif
                    <td>{{ $tweet->created_at }}</td>
                </tr>
                <div class="modal" id="{{ $tweet->id }}">
                        {!! Form::open(['url' => '/post/update']) !!}
                        {!! Form::hidden('id', $tweet->id) !!}
                        {!! Form::input('text', 'up_tweet', $tweet->posts, ['required', 'class' => 'form-control']) !!}
                        {{Form::submit('送信')}}
                        {!! Form::close() !!}
                </div>
            @endforeach


        </table>
        </div>
@endsection



