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
        Schema::create('disclaimir_logins', function (Blueprint $table) {
            $table->id();
            $table->string('disclaimir_title')->nullable();
            $table->text('disclaimir_detail')->nullable();
            $table->string('disclaimir_status', 6)->nullable();
            
            $table->string('contact_title')->nullable();
            $table->text('contact_detail')->nullable();
            $table->text('contact_map')->nullable();
            $table->string('contact_status',6)->nullable();

            $table->string('login_title')->nullable();
            $table->text('login_detail')->nullable();
            $table->string('login_status',6)->nullable();
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
        Schema::dropIfExists('disclaimir_logins');
    }
};
