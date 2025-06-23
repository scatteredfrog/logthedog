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
        Schema::table('dogs', function (Blueprint $table) {
            $table->tinyInteger('gender')->nullable()->after('name');
            $table->boolean('is_neutered')->after('gender')->change();
            $table->string('breed')->after('gender')->change();
            $table->string('color')->after('breed')->change();
            $table->string('marks')->nullable()->after('color');
            $table->unsignedTinyInteger('weight')->nullable()->after('marks');
            $table->unsignedTinyInteger('length')->nullable()->after('weight');
            $table->unsignedTinyInteger('height')->nullable()->after('length');
            $table->unsignedTinyInteger('age')->nullable()->after('height');
            $table->date('birth_date')->after('age')->change();
            $table->date('gotcha_date')->nullable()->after('birth_date');
            $table->string('microchip_number', 50)->nullable()->after('birth_date')->change();;
            $table->string('chip_company')->nullable()->after('microchip_number');
            $table->renameColumn('notes', 'misc')->after('chip_company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dogs', function (Blueprint $table) {
            //
        });
    }
};
