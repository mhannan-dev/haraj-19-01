<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateAdvertisersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('mobile_no', 14)->nullable();
            $table->string('designation')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('avatar')->nullable();
            $table->string('password')->nullable();
            $table->string('provider_id', 255)->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('registration_code')->unique();
            $table->string('about', 1000)->nullable();
            $table->string('remember_token')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 == Not varified, 1 == Verified');
            $table->tinyInteger('show_mobile_no')->default(1)->comment('0 == No, 1 == Yes');
            $table->softDeletes();
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
        Schema::dropIfExists('advertisers');
    }
}
