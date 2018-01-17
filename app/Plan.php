<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
    protected $table = 'plans';
    public $timestamps = false;

    protected $fillable = [
        'code'
    ];
}
