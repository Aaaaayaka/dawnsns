@extends('layouts.login')

@section('content')

<div id='container'>
        <form action="{{ url('/search')}}" method="post">
            <input type="text" name="keyword" value="{{ $keyword }}" placeholder="ユーザー名" class="search-bar">
            {{ csrf_field()}}
            {{method_field('get')}}
            <input type="image" src="images/search.png" alt="ユーザー名">
        </form>

        <table class="table">
        @foreach ($users as $user)
            <tr>
                <td>
                    <img src="/images/{{ $user->images }}" alt="" class="image_circle icon-list">
                </td>
                <td class="search-name">{{ $user->username }}</td>
                @if ($following->contains($user->id))
                <td>
                    <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="フォローをはずす" class="search-btn1">
                    </form>
                </td>
                @else
                <td>
                    <form action="{{ route('follow', ['user' => $user->id]) }}" method="post">
                        @csrf
                        <input type="submit" value="フォローする" class="search-btn2">
                    </form>
                </td>
                @endif
            </tr>
        @endforeach
        </table>
</div>

@endsection