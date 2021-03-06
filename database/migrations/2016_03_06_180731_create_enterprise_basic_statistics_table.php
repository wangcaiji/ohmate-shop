<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterpriseBasicStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprise_basic_statistics', function (Blueprint $table) {
            $table->increments('id');

            $table->date('date')->comment('日期');

            $table->integer('focus_count')->unsigned()->default(0)->comment('关注用户数');
            $table->integer('register_count')->unsigned()->default(0)->comment('注册用户数');
            $table->integer('doctor_count')->unsigned()->default(0)->comment('医师数');

            $table->decimal('bean_count', 15, 4)->unsigned()->default(0)->comment('迈豆输出量');
            $table->decimal('income_count', 15, 4)->unsigned()->default(0)->comment('营业额/无运费');

            $table->integer('article_count')->unsigned()->default(0)->comment('文章阅读量');
            $table->integer('order_count')->unsigned()->default(0)->comment('订单量');
            $table->integer('commodity_count')->unsigned()->default(0)->comment('卖出商品量');
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
        Schema::drop('enterprise_basic_statistics');
    }
}
