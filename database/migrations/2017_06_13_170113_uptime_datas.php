<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UptimeDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uptime_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uptime_id')->unsigned();
            $table->foreign('uptime_id')->references('id')->on('uptimes')->onDelete('cascade');
            //uptime
            $table->integer('response_time');
            $table->string('status');
            $table->string('check_failure_reason');
            $table->integer('check_times_failed');
            $table->string('certificate_status');
            $table->date('certificate_expiration_date');
            $table->string('certificate_issuer');
            // GA
            $table->string('title');
            $table->string('description');
            $table->integer('view');
            $table->string('menu');
            $table->integer('ccu');
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
        //
    }
}
