@extends('layouts.login')

@section('content')
     <h1><a><img src="images/dawn.png"></a></h1>
        <!-- <p class="pull-right"><a class="btn btn-success" href="post/create-form"><img src="images/post.png"></a></p> -->
        <div id='container'>
                <h2 class='page-header'></h2>
                    {!! Form::open(['url' => 'post/create']) !!}
                        <div class="form-group">
                            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
                        </div>
                        <!-- <button type="submit" class="btn btn-success pull-right"><img src="images/post.png"></button> -->
                        <!-- <a type="submit" class="btn btn-success pull-right"><img src="images/post.png"></a> -->
                        <input type="image" src="images/post.png" alt="投稿ボタン">
                    {!! Form::close() !!}

        <table class='table table-hover'>

            @foreach ($tweets as $tweet)
            <tr>
                <td>
                    <img src="/images/{{ $tweet->images }}" alt="">
                </td>
                <td>{{ $tweet->username }}</td>
                <td>{{ $tweet->posts }}</td>

                <body>
                    <a data-target="edit">編集</a>
                    <script>
                        const result = $('a').data('target');

                {!! Form::open(['url' => '/post/update']) !!}
                <td> <!-- <div class="form-group"> -->
                    {!! Form::hidden('id', $tweet->id) !!}</td>
                    <td>{!! Form::input('text', 'up_tweet', $tweet->posts, ['required', 'class' => 'form-control']) !!}</td>
                <!-- </div> -->

                <td><a href="" class="modalopen" data-target="modal01">
                        <img class="edit-img" src="images/edit.png" alt="edit"></a></td>
                    <div class="modal-main js-modal" id="modal01">
                        <div class="modal-inner">
                            <div class="inner-content">
                                <p class="inner-text"></p>
                                <a class="btn btn-primary" href="/post/{{ $tweet->id }}/update">更新する</a>
                            </div>
                        </div>
                    </div>

                {!! Form::close() !!}
                        console.log( result );
                    </script>
                </body>
                <td><a class="btn btn-primary" href="/post/{{ $tweet->id }}/update"><img src="images/edit.png"></a></td>
                <td><a class="btn btn-danger" href="/post/{{ $tweet->id }}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"><img src="images/trash.png"></a></td>
                <td>{{ $tweet->created_at }}</td>

            </tr>

            @endforeach



            <!-- 投稿編集機能作り中　この後JS -->
            <!-- <form method="POST" action="http://localhost:8000/post/update" charset="UTF-8"> -->
                <!-- <input name="_token" type="hidden" value="xxx"> -->
                <!-- <input name="" type="submit" value=""> -->
            <!-- </form> -->

        </table>
        </div>
@endsection
