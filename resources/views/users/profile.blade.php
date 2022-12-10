@extends('layouts.login')

@section('content')

<div id='container'>
    <div class="profile-head">
        <div class="profile">
            <img src="/images/{{ $user->images }}" alt="" class="image_circle">
        </div>
        <span class="profile-text">Name</span>
            <div class="main_name">{{ $user->username }}</div>
        <span class="profile-text">Bio</span>
            <div class="bio">{{ $user->bio }}</div>
    </div>

    @if ($following->contains($user->id))
        <td>
            <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="フォローをはずす" class="profile-btn1">
            </form>
        </td>
    @else
        <td>
            <form action="{{ route('follow', ['user' => $user->id]) }}" method="post">
                @csrf
                <input type="submit" value="フォローする" class="profile-btn2">
            </form>
        </td>
    @endif

    <table class='table table-hover'>
    @foreach ($userTweets as $userTweet)
        <tr>
            <td>
                <div id="icon">
                <img src="/images/{{ $userTweet->images }}" alt="" class=image_circle>
                </div>
            </td>
            <td class="username">{{ $userTweet->username }}</td>
            <td class="tweet">{{ $userTweet->posts }}</td>
            <td class="date">{{ $userTweet->created_at }}</td>
        </tr>
    @endforeach
    </table>
</div>

@endsection

