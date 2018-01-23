@extends('layouts.app')
@section('content')

    <div class="container">
        @if(isset($details))
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center" style="color: rgb(99, 107, 111); font-size: 22px;">Articles written by the user {{ucfirst(Session::get('user_name'))}} </h3>
                    </div>
                    <div class="panel-body" style="padding: 15px;">
                        @foreach($details as $article)
                            @if(strtolower($article->user->name) == strtolower(Session::get('user_name')))
                                @if($article->public == 1)
                                    <h3 style="font-size: 20px; display: inline;"><b>{{$article->title}}</b></h3> <br/>
                                    <h5 style="margin-top: 4px;">By <b>{{$article->user->name}}</b> |
                                        {{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%B %d, %Y')}}, {{\Carbon\Carbon::parse($article->created_at)->format('H:i')}}  |
                                        Category: {{$article->category->name}}
                                    </h5>                                    <p>{!! \Illuminate\Support\Str::words($article->text, 80, '....')  !!}</p>
                                    <p class="text-center"><a class="btn btn-primary" href="/articles/{{$article->id}}" role="button">Read More &raquo;</a>
                                    <hr/>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        @if(!isset($details))
            <h3 class="text-center" style="color: rgb(99, 107, 111); font-size: 30px; margin-top: 230px;"> The user "{{Session::get('user_name')}}" doesn't exists !</h3>
        @endif
    </div>

@endsection