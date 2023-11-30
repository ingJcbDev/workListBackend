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
        Schema::create('worklist', function (Blueprint $table) {
            $table->bigIncrements('worklist_id')->comment('ID de la tabla')->nullable(false);
            $table->string('referencia')->comment('Referencia de la prenda')->nullable(false);
            $table->integer('garment_type_id')->comment('Foranea de tipo de prenda')->unsigned()->nullable(false);
            $table->integer('size_id')->comment('Foranea de la talla')->unsigned()->nullable(false);
            $table->integer('color_id')->comment('Foranea del color')->unsigned()->nullable(false);
            $table->date('fecha_elaboracion')->comment('Fecha de elaboracion')->nullable(false);
            $table->integer('cantidad_unidades')->comment('Unidades elaboradas por referencia')->nullable(false);
            $table->text('observation')->comment('observacion si se describe algo');
            $table->timestamps();

            $table->foreign('size_id')
                ->references('size_id')
                ->on('sizes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('color_id')
                ->references('color_id')
                ->on('color')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('garment_type_id')
                ->references('garment_type_id')
                ->on('garment_types')
                ->onDelete('no action')
                ->onUpdate('no action');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worklist');
    }
};
