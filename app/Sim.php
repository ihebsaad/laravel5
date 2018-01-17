<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sim extends Model
{
    //
    protected $table = 'sims';

    protected $fillable = [
        'sim', 'pin','enabled'
    ];
}
