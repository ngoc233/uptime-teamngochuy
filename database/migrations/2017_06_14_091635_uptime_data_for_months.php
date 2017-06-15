<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UptimeDataForMonths extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('uptime_data_for_months', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uptime_data_id')->unsigned();
            $table->foreign('uptime_data_id')->references('id')->on('uptime_datas')->onDelete('cascade');
            $table->string('month');            
            $table->float('ratio',4,2);
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
