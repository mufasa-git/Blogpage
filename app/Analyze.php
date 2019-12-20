<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;
class Analyze extends Model
{
    //
    public function articles()
    {
    	return $this->belongsTo('App\Article');
    }
}
