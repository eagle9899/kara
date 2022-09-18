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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description'); 
            // rooms
            $table->string('currency', 20)->default('USD');
            $table->integer('rate');
            $table->string('space', 20)->nullable();
            $table->tinyInteger('bedroom')->nullable();
            $table->tinyInteger('rooms')->nullable();
            $table->tinyInteger('bathrooms')->nullable();
            $table->string('garage',20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('city');
            $table->string('publish');
            $table->string('target');
            $table->string('address');
            // meta
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable(); 
            $table->integer('visitors')->default(1);
             
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); 
            $table->unsignedBigInteger('sub_category_id');

            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade'); 

            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 

            $table->unsignedBigInteger('admin_id');
            // $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade'); 
            
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
        Schema::dropIfExists('posts');
    }
};
