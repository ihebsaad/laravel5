<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sim extends Model
{
    //
    protected $table = 'SIMs';

    protected $fillable = [
        'sim', 'pin','enabled'
    ];
}
