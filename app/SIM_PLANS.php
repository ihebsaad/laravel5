<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SIM_PLANS extends Model
{
    //
    protected $table = 'SIM_PLANS';

    protected $fillable = [
        'planCode', 'SIM'
    ];
}
