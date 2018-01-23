@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="row" style="background-color: white; padding: 30px;">
            <h3 class="text-center">Edit Article</h3>
            <div class="col-md-12">
                <form method="POST" action="{{route('articles.update', [$article->id])}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put"/>
                    <div class="form-group">
                        <label for="category-name">Title <span class="required">*</span></label>
                        <input placeholder="Enter Title"
                               id="article-title"
                               required
                               name="title"
                               spellcheck="false"
                               class="form-control"
                               value="{{$article->title}}"
                        />
                    </div>
                    <div class="form-group">
                        <label for="article-public">Article Privacy <span class="required" style="color: red">*</span>
                            <small>Public articles are visible for everyone. Private articles are only visible for
                                you.
                            </small>
                        </label>
                        <input placeholder="1 - Public / 0 - Private"
                               id="article-public"
                               required
                               name="public"
                               spellcheck="false"
                               class="form-control"
                               value="{{$article->public}}"
                        />
                    </div>
                    <div class="form-group">
                        <label for="article-text">Text</label>
                        <textarea placeholder="Enter your text"
                                  style="resize: vertical"
                                  id="article-text"
                                  name="text"
                                  rows="6"
                                  spellcheck="false"
                                  class="form-control autosize-target text-left">
                                {{$article->text}}
                            </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Edit"/>
                        <a class="btn btn-primary" style="margin-left: 60px;" role="button" href="/articles/{{$article->id}}">Back</a>
                    </div>

                </form>
            </div>
        </div>
        <hr>
    </div>

@endsection