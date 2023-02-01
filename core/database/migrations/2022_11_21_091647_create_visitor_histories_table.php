<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_histories', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 45)->unique()->index();
            $table->string('mac_address')->unique()->index();
            $table->string('iso_code', 45)->nullable();
            $table->string('country', 45)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('state_name', 45)->nullable();
            $table->string('lat', 45)->nullable();
            $table->string('lon', 45)->nullable();
            $table->string('timezone', 45)->nullable();
            $table->integer('user_ip_view_count')->nullable();
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
        Schema::dropIfExists('visitor_histories');
    }
}
