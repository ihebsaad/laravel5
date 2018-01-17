<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        {
            Schema::create('sim_plans', function(Blueprint $table) {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()

{
Schema::table('sim_plans', function(Blueprint $table) {
    $table->dropForeign('sim_plans_sim_id_foreign');
    $table->dropForeign('sim_plans_plan_id_foreign');
});

Schema::drop('sim_plans');
}
}
