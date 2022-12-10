@extends('layouts.login')

@section('content')
    <div id='container'>
        <h1 class=home-image><img src="images/dawn.png" alt="" class=image_circle></h1>
            {!! Form::open(['url' => 'post/create']) !!}
                {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
                <input type="image" src="images/post.png" class=image_post alt="投稿ボタン">
            {!! Form::close() !!}
    </div>
    <table class='table table-hover'>

        @foreach ($tweets as $tweet)
            <tr class="line">
                <td>
                    <div id="icon">
                    <img src="/images/{{ $tweet->images }}" alt="" class=image_circle>
                    </div>
                </td>
                <td class="username">{{ $tweet->username }}</td>
                <td class="tweet">{{ $tweet->posts }}</td>
                @if (Auth::user()->id == $tweet->user_id)
                <td><a class="btn btn-primary" href="/post/{{ $tweet->id }}/update" data-target="{{ $tweet->id }}">
                    <img src="images/edit.png"></a>
                </td>
                <td><a class="btn btn-danger" href="/post/{{ $tweet->id }}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
                    <img src="images/trash_h.png" class="trash-hidden">
                    <img src="images/trash.png" class="trash-image">
                    </a>
                </td>
                @endif
                <td class="date">{{ $tweet->created_at }}</td>
            </tr>
            <div class="modal" id="{{ $tweet->id }}">
                    {!! Form::open(['url' => '/post/update']) !!}
                    {!! Form::hidden('id', $tweet->id) !!}
                    {!! Form::input('text', 'up_tweet', $tweet->posts, ['required', 'class' => 'form-control']) !!}
                    {{Form::submit('送信', ['class' => 'submit'])}}
                    {!! Form::close() !!}
            </div>
        @endforeach
    </table>
@endsection



