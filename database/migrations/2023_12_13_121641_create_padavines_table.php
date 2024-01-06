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
        Schema::create('padavines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('vremenska_stanica_id');
            $table->integer('prognoza_id');
            $table->date('datum');
            $table->integer('kolicina_padavina');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('padavines');
    }
};
