<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingrediente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
        });

        Schema::create('tipo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->double('precio');
            $table->string('link');
            $table->int('rating')->default('0');
        });

        Schema::create('tipos_ingrediente', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('_id')->on('tipo');
            $table->string('ingrediente_id');

        });

        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_id');
            $table->string('tamno');
            $table->double('precio');
            $table->foreign('tipo_id')->references('_id')->on('tipos');
        });

        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->array('idProducto');
            // $table->foreign('idProducto')->references('_id')->on('producto');
        });

        // Schema::busqueda('busqueda', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('ingredientes');
        //     $table->string('tamano');
        //     $table->int('rating');
        // });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingrediente');
    }
}
