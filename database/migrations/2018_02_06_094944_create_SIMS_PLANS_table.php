<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSIMSPLANSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SIMS_PLANS', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('plan_id')->unsigned();
                $table->integer('sim_id')->unsigned();
                $table->foreign('sim_id')->references('id')->on('sims')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

                $table->foreign('plan_id')->references('id')->on('plans')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
