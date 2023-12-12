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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('team_id')->unsigned()->nullable();
            $table->BigInteger('parent_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('url');
            $table->string('order');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('menus', function($table) {
            $table->foreign('parent_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
