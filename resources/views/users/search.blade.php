@extends('layouts.login')

@section('content')

<div id='container'>
        {!! Form::open(['url' => 'post/create']) !!}
            <div class="form-group">
                    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
            </div>
            <input type="image" src="images/post.png" alt="ユーザー名">
        {!! Form::close() !!}
        <table>
        @foreach ($users as $user)
            <tr>
                <td>
                    <img src="/images/{{ $user->images }}" alt="">
                </td>
                <td>{{ $user->username }}</td>
                @if ($following->contains($user->id))
                <td>
                    <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="フォロー外す">
                    </form>
                </td>
                @else
                <td>
                    <form action="{{ route('follow', ['user' => $user->id]) }}" method="post">
                        @csrf
                        <input type="submit" value="フォローする">
                    </form>
                </td>
                @endif
                <!-- <td><a class="btn btn-primary" href="/search/{{ $user->id }}/users-form">フォローする</a></td> -->
                <!-- <td><a class="btn btn-primary" href="/search/{{ $user->id }}/users-form">フォローしない</a></td> -->
            </tr>
        @endforeach
        </table>
</div>

@endsection