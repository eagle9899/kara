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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('show_post')->nullable();
            $table->tinyInteger('show_most_views')->nullable();
            $table->tinyInteger('show_similar')->nullable();
            $table->string('logo', 20)->nullable();
            $table->string('favicon', 20)->nullable(); 
            $table->string('theme_1', 100)->nullable(); 
            $table->string('theme_2', 100)->nullable(); 
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
        Schema::dropIfExists('settings');
    }
};
