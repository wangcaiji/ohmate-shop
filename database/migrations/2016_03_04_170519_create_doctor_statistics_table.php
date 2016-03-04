<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->comment('用户');
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->string('year')->comment('年份');
            $table->integer('friend_count')->unsigned()->default(0)->comment('好友数');
            $table->integer('article_count')->unsigned()->default(0)->comment('阅读数');
            $table->integer('article_bean')->unsigned()->default(0)->comment('迈豆数');

            $table->index('customer_id');
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
        Schema::table('doctor_statistics', function (Blueprint $table) {
            $table->dropForeign('doctor_statistics_customer_id_foreign');
            $table->dropIndex('customer_id');
        });
        Schema::drop('doctor_statistics');

    }
}
