@extends('layouts.login')

@section('content')

<div id='container'>
    <img src="/images/{{ $user->images }}" alt="">
    <p>Name</p>
        <div class="main_name">{{ $user->username }}さん</div>
    <p>Bio</p>
        <div class="bio">{{ $user->bio }}</div>

    @if ($following->contains($user->id))
        <td>
            <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="フォローはずす">
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
</div>

@endsection

