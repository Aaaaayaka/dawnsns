@extends('layouts.login')

@section('content')

<div id='container'>
        <form action="{{ url('/search')}}" method="post">
            <input type="text" value="{{ $keyword }}" placeholder="ユーザー名">
            {{ csrf_field()}}
            {{method_field('get')}}
            <input type="image" src="images/search.png" alt="ユーザー名">
        </form>

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
                <!-- <td><a class="btn btn-primary" href="/search/{{ $user->id }}/users-form">フォローする</a></td> -->
                <!-- <td><a class="btn btn-primary" href="/search/{{ $user->id }}/users-form">フォローしない</a></td> -->
            </tr>
        @endforeach
        </table>
</div>

@endsection