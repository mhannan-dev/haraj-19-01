<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auths', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->tinyInteger('is_user')->default(0)->comment('1 == Admin, 0 == User');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auths', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('is_user');
        });
    }
}
