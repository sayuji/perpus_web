<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ulasan_rating', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('buku_id');
            $table->string('ulasan');
            $table->float('rating');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ulasan_rating');
    }
};
