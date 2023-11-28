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
        Schema::create('sizes', function (Blueprint $table) {
            $table->bigIncrements('size_id')->comment('ID de la tabla')->nullable(false);
            $table->string('size')->comment('Talla de la prenda')->nullable(false);
            $table->char('sw_state', 1)->nullable(false)->comment('1 => Activo, 0 => Inactivo')->default('1')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
