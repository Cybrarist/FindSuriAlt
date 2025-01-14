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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            $table->string('name')->nullable();
            $table->string('name_second_lang')->nullable();

            $table->date('born_on')->nullable();
            $table->foreignIdFor(\App\Models\City::class, 'born_in')->nullable();

            $table->string('missing_at')->nullable();
            $table->foreignIdFor(\App\Models\City::class, 'missing_in')->nullable();

            $table->string('status')->default(\App\Enums\StatusEnum::Missing->value);
            $table->text('contact')->nullable();

            $table->text('images')->nullable();
            $table->text('videos')->nullable();

            $table->foreignIdFor(\App\Models\User::class);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
