<?php
use App\User;
use App\Article;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return redirect()->route('categories.index');
});
Auth::routes();
Route::any('/search/article',function(){
    $q = Input::get ( 'q' );
    Session::put('article_name', $q);
    $article = Article::where('title','LIKE','%'.$q.'%')->get();
    if(count($article) > 0)
        return view('articles.search')->withDetails($article)->withQuery ( $q );
    else
        return view ('articles.search')->withMessage('No Details found. Try to search again !');
});
Route::any('/search/user',function(){
    $q = Input::get ('q');
    Session::put('user_name', $q);
    $user = User::where('name', $q)->get(['name']);
    $articles = Article::all();
    if(count($user) > 0)
        return view('users.show')->withDetails($articles)->withQuery($q);
    else
        return view ('users.show')->withMessage('No Details found. Try to search again !');
});
Route::middleware(['auth'])->group(function() {
    Route::get('/articles/create/{category_id}', 'ArticlesController@create');
    Route::resource('articles', 'ArticlesController');
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::resource('comments', 'CommentsController');
    Route::resource('categories', 'CategoriesController');
});







