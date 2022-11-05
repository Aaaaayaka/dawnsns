@extends('layouts.login')
@section('content')
    <div id='container'>
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