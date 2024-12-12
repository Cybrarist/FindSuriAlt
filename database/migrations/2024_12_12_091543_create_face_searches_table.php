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
        Schema::create('face_searches', function (Blueprint $table) {

            $table->id();
            $table->timestamps();

            $table->string('email')->unique();
            $table->string('image');
            //todo add number of tries
            $table->unsignedTinyInteger('count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('face_searches');
    }
};