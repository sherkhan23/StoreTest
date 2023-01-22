<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_parameters', function (Blueprint $table) {
            $table->id('post_parameters_id');

            $table->bigInteger('post_id')->unsigned()->nullable();
            $table->foreign('post_id')
                ->references('post_id')
                ->on('posts')
                ->onDelete('cascade');

            $table->double('weight')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();

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
        Schema::dropIfExists('post_parameters');
    }
};
