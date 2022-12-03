@extends('layouts.login')
@section('content')
    <div id='container'>
        <p>Follow list</p>
            @foreach ($follows as $follow)
                <a href="/profile/{{ $follow->id }}"><img src="/images/{{ $follow->images }}" alt="フォローリスト"></a>
            @endforeach

        <table class='table table-hover'>
            @foreach ($tweets as $tweet)
                <tr>
                    <td>
                    <a href="/profile/{{ $tweet->id }}"><img src="/images/{{ $tweet->images }}" alt="フォローアイコン"></a>
                    </td>
                    <td>{{ $tweet->username }}</td>
                    <td>{{ $tweet->posts }}</td>
                    <td>{{ $tweet->created_at }}</td>
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