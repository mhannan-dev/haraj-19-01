<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->integer('advertiser_id')->unsigned()->comment('PK on Advertiser table');
            $table->integer('category_id')->unsigned()->comment('PK on Category table');
            $table->integer('type_id')->unsigned()->comment('PK on Types table');
            $table->integer('city_id')->unsigned()->comment('PK on City table')->default(0);
            $table->integer('sub_category_id')->nullable(0);
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->decimal('price', 24,2);
            $table->string('image')->default('def.png');
            $table->text('description');
            $table->string('condition');
            $table->string('authenticity')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->string('edition')->nullable();
            $table->string('features')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('year_of_manufacture')->nullable();
            $table->string('meta_tags');
            $table->string('meta_title')->nullable();
            $table->json('details_informations')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 == Pending, 1 == Published, 2 == Sold');
            $table->tinyInteger('is_price_negotiable')->default(0)->comment('0 == No, 1 == Yes');
            $table->tinyInteger('is_featured')->default(0)->comment('0 == No, 1 == Yes');
            $table->dateTime('feature_expire_date')->nullable();
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
        Schema::dropIfExists('advertisements');
    }
}
