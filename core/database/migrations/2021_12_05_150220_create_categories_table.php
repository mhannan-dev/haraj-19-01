<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->string('title');
            $table->string('slug');
            $table->string('icon', 1000)->nullable();
            $table->string('bg_color')->default('#a3ce71');
            $table->string('category_type')->nullable();
            $table->string('image')->nullable();
            $table->string('wheels')->nullable();
            $table->tinyInteger('status')->comment('1=Active and 0=Inactive')->default('1')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
