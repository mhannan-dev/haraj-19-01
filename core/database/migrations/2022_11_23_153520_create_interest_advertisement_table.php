<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_interest_advertisement', function (Blueprint $table) {
            $table->id();
            $table->string('mac_address');
            $table->string('ip_address')->nullable();
            $table->integer('interest_advertisement_id')->unsigned()->unique()->comment('Visitor interest advertisement');
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
        Schema::dropIfExists('advertisement_interest_advertisement');
    }
}
