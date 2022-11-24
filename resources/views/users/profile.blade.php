@extends('layouts.login')

@section('content')

<div id='container'>
    <img src="/images/{{ $user->images }}" alt="">
    <p>Name</p>
        <div class="main_name">{{ $user->username }}さん</div>
    <p>Bio</p>
        <div class="bio">{{ $user->bio }}</div>
    <table>
    @foreach ($userTweets as $userTweet)
        <tr>
            <td>
                <img src="/images/{{ $userTweet->images }}" alt="">
            </td>
            <td>{{ $userTweet->username }}</td>
            <td>{{ $userTweet->posts }}</td>
            <td>{{ $userTweet->created_at }}</td>
        </tr>
    @endforeach
    </table>

    <form action="" method="post">
        <input type="submit" value="更新する">
    </form>
</div>

@endsection

