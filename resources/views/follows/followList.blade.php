@extends('layouts.login')
@section('content')
    <div id='container'>
        <p class=heading>Follow list</p>
        <div class="icon-list">
            @foreach ($follows as $follow)
                <a href="/profile/{{ $follow->id }}"><img src="/images/{{ $follow->images }}" alt="フォローリスト" class="image_circle"></a>
            @endforeach
        </div>
        <table class='table table-hover'>
            @foreach ($tweets as $tweet)
                <tr class="line">
                    <td>
                    <div id="icon">
                    <a href="/profile/{{ $tweet->id }}"><img src="/images/{{ $tweet->images }}" alt="フォローアイコン" class="image_circle"></a>
                    </div>
                    </td>
                    <td class="username">{{ $tweet->username }}</td>
                    <td class="tweet">{{ $tweet->posts }}</td>
                    <td class="date">{{ $tweet->created_at }}</td>
                </tr>
                <div class="modal" id="{{ $tweet->id}}">
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