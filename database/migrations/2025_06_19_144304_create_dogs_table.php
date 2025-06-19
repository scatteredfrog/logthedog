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
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name', 100);
            $table->string('breed', 100)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('color', 50)->nullable();
            $table->string('microchip_number', 50)->nullable();
            $table->string('photo')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_neutered')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dogs');
    }
};
