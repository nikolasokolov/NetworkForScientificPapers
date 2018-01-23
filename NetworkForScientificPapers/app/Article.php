<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'text',
        'category_id',
        'public',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
