<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sim extends Model
{
    //
    protected $table = 'SIM_PLANS';

    protected $fillable = [
        'plan_id', 'sim_id'
    ];
}
