<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeanRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bean_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action_en', 31)->comment('操作en');
            $table->string('action_ch', 31)->comment('操作ch');
            $table->integer('rate')->unsigned()->nullable()->default(0)->comment('操作兑换积分');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bean_rates');
    }
}
