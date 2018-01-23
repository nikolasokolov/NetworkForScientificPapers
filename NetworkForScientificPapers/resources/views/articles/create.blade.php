@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="row" style="background-color: white; padding: 20px;">
            <div class="col-md-12">
                <h3 class="text-center">Create new Article</h3>
                <form method="POST" action="{{route('articles.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="article-title">Title <span class="required" style="color: red">*</span></label>
                        <input placeholder="Enter title"
                               id="article-title"
                               required
                               name="title"
                               spellcheck="false"
                               class="form-control"
                        />
                    </div>
                    @if($categories == null)
                        <input type="hidden"
                               name="category_id"
                               value="{{$category_id}}"
                        />
                    @endif
                    @if($categories != null)
                        <div class="form-group">
                            <label for="category">Select Category <span class="required"
                                                                        style="color: red">*</span></label>
                            <select name="category_id" class="form-control" id="category">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
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
                        />
                    </div>
                    <div class="form-group">
                        <label for="article-text">Article Text <span class="required" style="color: red">*</span></label>
                        <textarea placeholder="Enter text"
                                  style="resize: vertical"
                                  id="article-text"
                                  name="text"
                                  rows="5"
                                  required
                                  spellcheck="false"
                                  class="form-control autosize-target text-left">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Create"/>
                    </div>
                </form>
            </div>
        </div>
        <hr>
    </div>

@endsection