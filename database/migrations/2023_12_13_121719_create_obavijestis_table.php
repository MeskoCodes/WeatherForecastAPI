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
        Schema::create('obavijestis', function (Blueprint $table) {
            $table->id();
            $table->integer('vremenska_stanica_id');
            $table->string('tip_obavijesti');
            $table->string('sadrzaj');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obavijestis');
    }
};
