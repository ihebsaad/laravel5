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
        /*Schema::create('SIM_PLANS', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('plan_id')->unsigned();
                $table->integer('sim_id')->unsigned();
                $table->foreign('sim_id')->references('id')->on('sims')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

                $table->foreign('plan_id')->references('id')->on('plans')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            });*/
			 Schema::create('SIM_PLANS', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('planCode')->unsigned();
                $table->integer('SIM')->unsigned();
                
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
