<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSpotsTable
 */
class CreateSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('started_hour_at');
            $table->string('started_minute_at');
            $table->string('finished_hour_at');
            $table->string('finished_minute_at');
            $table->unsignedInteger('spot_category_id')->nullable();
            $table->unsignedInteger('day')->nullable();
            $table->unsignedInteger('post_id');
            $table->string('icon');
            $table->timestamps();

            $table->foreign('spot_category_id')->references('id')->on('spots_categories');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spots');
    }
}
