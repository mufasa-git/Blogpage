<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\User;
use App\Analyze;
class Article extends Model
{
    //
    protected $fillable = ['title', 'content', 'image'];
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function analyzes()
    {
        return $this->hasMany('App\Analyze');
    }
}
