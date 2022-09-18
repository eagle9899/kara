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
        Schema::create('page_about_faqs', function (Blueprint $table) {
            $table->id();
            $table->string('about_title')->nullable();
            $table->text('about_detail')->nullable();
            $table->text('about_top_status', 6)->nullable();
            $table->text('about_status', 6)->nullable();
            $table->string('faq_title')->nullable();
            $table->text('faq_detail')->nullable();
            $table->text('faq_status')->nullable();
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
        Schema::dropIfExists('page_about_faqs');
    }
};
