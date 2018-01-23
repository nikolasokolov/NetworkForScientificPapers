@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center" style="color: rgb(99, 107, 111);"><b>My Articles</b></h4>
                </div>
                <div class="panel-body">
                    <ul class="list-group" style="padding: 3px;">
                        @foreach($articles as $article)
                            @if($article->user->id == Auth::user()->id)
                                <h3 style="font-size: 19.5px; display: inline"><b>{{$article->title}}</b></h3> <br/>
                                <h5 style="margin-top: 4px;">
                                    {{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%B %d, %Y')}}
                                    , {{\Carbon\Carbon::parse($article->created_at)->format('H:i')}} |
                                    Category: {{$article->category->name}}
                                </h5>                                <p
                                        style="font-size: 15px;">{!! \Illuminate\Support\Str::words($article->text, 70, '....')  !!}</p>
                                <p class="text-center"><a class="btn btn-primary" href="/articles/{{$article->id}}"
                                                          role="button">Read More &raquo;</a></p>
                                <hr/>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default text-center" style="margin-top: 1px;">
                <div class="panel-body">
                    <p class="text-center"><a class="btn btn-success" role="button" href="/articles/create">Write New
                            Article</a></p>
                    <hr style="margin-top: 0;"/>
                    <form action="/search/article" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" placeholder="Search articles">
                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                        </div>
                    </form>
                    <hr/>
                    <ul class="list-group">
                        <h4 style="color: rgba(42,78,182,0.84); margin-top: 0px;"><b>Categories</b></h4>
                        @foreach($categories as $category)
                            <li class="list-group-item"><a style="color: rgba(42,78,182,0.84);"
                                                           href="/categories/{{$category->id}}"><b>{{$category->name}}</b></a>
                            </li>
                        @endforeach
                        <br/>
                        @if(Auth::user()->role_id == 1)
                            <a class="btn btn-default" role="button" href="/categories/create">Create New</a>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
