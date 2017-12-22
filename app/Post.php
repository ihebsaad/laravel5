<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
use Carbon\Carbon;

class Post extends Model
{
    use DatePresenter;

    protected $fillable = ['titre','contenu','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

}