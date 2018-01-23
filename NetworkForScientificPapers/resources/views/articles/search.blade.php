@extends('layouts.app')
@section('content')

    <div class="container">
        @if(isset($details))
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text-center" style="color: rgb(99, 107, 111); font-size: 22px;"> The Search results
                            for
                            your query <b>
                                "{{ $query }}" </b> are:</h4></div>
                    <div class="panel-body" style="padding: 15px;">
                        <ul class="list-group" style="padding: 5px;">
                            @foreach($details as $article)
                                @if($article->public == 1)
                                    <h3 style="font-size: 20px; display: inline"><b>{{$article->title}}</b></h3> <br/>
                                    <h5 style="margin-top: 4px;">By <b>{{$article->user->name}}</b> |
                                        {{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%B %d, %Y')}}
                                        , {{\Carbon\Carbon::parse($article->created_at)->format('H:i')}} |
                                        Category: {{$article->category->name}}
                                    </h5>
                                    <p>{!! \Illuminate\Support\Str::words($article->text, 80, '....')  !!}</p>
                                    <p class="text-center"><a class="btn btn-primary" href="/articles/{{$article->id}}"
                                                              role="button">Read More &raquo;</a></p>
                                    <hr/>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        @if(!isset($details))
            <h3 class="text-center" style="margin-top: 230px; font-size: 30px;"> No articles are found with title
                "{{Session::get('article_name')}}" !</h3> <br/>
        @endif
    </div>
@endsection
