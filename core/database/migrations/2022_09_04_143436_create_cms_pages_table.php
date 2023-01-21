<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCMSPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_pages', function (Blueprint $table) {
            $table->id();
			$table->string('title')->unique();
			$table->string('slug');
			$table->string('meta_title')->nullable();
			$table->string('meta_tags')->nullable();
			$table->mediumText('meta_description')->nullable();
			$table->mediumText('description');
			$table->tinyInteger('status')->default(1)->comment('0 = Inactive 1 = Active');
			$table->tinyInteger('is_helpful')->nullable()->comment('0 = Not helpful 1 = Helpful');
            $table->tinyInteger('position');
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
        Schema::dropIfExists('cms_pages');
    }
}
