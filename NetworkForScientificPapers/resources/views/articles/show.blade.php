@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default" style="padding: 22px;">
                <h3 style="display: inline; font-size: 22px;"><b>{{$article->title}}</b></h3> <br/>
                <h5 class="pull-left" style="margin-top: 4px;">By <b>{{$article->user->name}}</b> |
                    {{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%B %d, %Y')}}
                    , {{\Carbon\Carbon::parse($article->created_at)->format('H:i')}} |
                    Category: {{$article->category->name}}
                </h5>
                <ol class="list-unstyled list-inline pull-right">
                    @if($article->user_id == Auth::user()->id)
                        <li><a href="{{$article->id}}/edit"><i class="fa fa-font" aria-hidden="true"></i> <b>Edit
                                    article</b></a></li>
                    @endif
                    @if($article->user_id == Auth::user()->id || Auth::user()->role_id == 1)
                        <li><a href="#"
                               onclick="var result = confirm('Are you sure you want to delete this article?');
                                    if (result)
                                        {
                                            event.preventDefault();
                                            document.getElementById('delete-form').submit();
                                        }">
                                <i class="fa fa-trash" aria-hidden="true"></i> <b>Delete Article</b>
                            </a>
                            <form id="delete-form" action="{{ route('articles.destroy', [$article->id]) }}"
                                  method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="delete"/>
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ol>
                <br/> <br/>
                <p style="font-size: 15px;">{{$article->text}}</p>
                <br/>
                @include('partials.comments')
                <form method="POST" action="{{route('comments.store')}}" style="margin: 0;">
                    {{ csrf_field() }}
                    <input type="hidden" name="commentable_type" value="App\Article"/>
                    <input type="hidden" name="commentable_id" value="{{$article->id}}"/>
                    <div class="form-group">
                        <label for="comment-body">Leave Your Comment Here</label>
                        <textarea placeholder="Enter your comment"
                                  style="resize: vertical"
                                  id="comment-body"
                                  name="body"
                                  rows="3"
                                  spellcheck="false"
                                  class="form-control autosize-target text-left">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Comment"/>
                    </div>
                </form>
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