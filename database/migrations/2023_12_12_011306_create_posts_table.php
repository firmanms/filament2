<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('team_id')->unsigned();
            $table->BigInteger('categories_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->date('published');
            $table->string('image')->nullable();            
            $table->boolean('status');
            $table->timestamps();
        });
        Schema::table('posts', function($table) {
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
