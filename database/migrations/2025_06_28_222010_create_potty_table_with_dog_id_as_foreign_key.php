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
        Schema::create('pottys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dog_id')->index();
            $table->foreign('dog_id')->references('id')->on('dogs')->onDelete('cascade');
            $table->dateTime('potty_time');
            $table->tinyInteger('potty_type');
            $table->tinyInteger('accident')->default(0);
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potty_table_with_dog_id_as_foreign_key');
    }
};
