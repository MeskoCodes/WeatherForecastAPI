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
        Schema::create('kvalitet_vazduhas', function (Blueprint $table) {
            $table->id();
            $table->integer('vremenska_stanica_id');
            $table->double('pm10', 8, 2);
            $table->double('pm2_5', 8, 2);
            $table->double('so2', 8, 2);
            $table->double('co', 8, 2);
            $table->double('o3', 8, 2);
            $table->double('azot_dioksid', 8, 2);
            $table->double('sumpordioksid', 8, 2);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('kvalitet_vazduhas');
    }
};
