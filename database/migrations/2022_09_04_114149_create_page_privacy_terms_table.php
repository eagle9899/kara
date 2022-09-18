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
        Schema::create('page_privacy_terms', function (Blueprint $table) {
            $table->id();
            $table->text('privacy_title')->nullable();
            $table->text('privacy_detail')->nullable();
            $table->text('privacy_status')->nullable();
            $table->text('terms_title')->nullable();
            $table->text('terms_detail')->nullable();
            $table->text('terms_status')->nullable();
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
        Schema::dropIfExists('page_privacy_terms');
    }
};
