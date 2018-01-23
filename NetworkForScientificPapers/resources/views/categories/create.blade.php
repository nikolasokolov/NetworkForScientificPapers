@extends('layouts.app')
@section('content')

    <div class="row" style="background-color: white; padding: 10px;">
        <h2 class="text-center">Create New Category</h2>
        <div class="col-md-12">
            <form method="POST" action="{{route('categories.store')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="category-name">Name <span class="required" style="color: red">*</span></label>
                    <input placeholder="Enter name"
                           id="category-name"
                           required
                           name="name"
                           spellcheck="false"
                           class="form-control"
                    />
                </div>
                <div class="form-group">
                    <label for="category-description">Description <span class="required" style="color: red">*</span></label>
                    <textarea placeholder="Enter description"
                              style="resize: vertical"
                              id="category-description"
                              name="description"
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
        <hr>
    </div>

@endsection