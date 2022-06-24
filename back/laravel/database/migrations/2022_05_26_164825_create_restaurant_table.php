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
            $table->string('idTipo');
            $table->string('tamno');
            $table->float('precio');
            $table->integer('rating')->nullable()->default(0);
            $table->timestamps();

        });

        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->string('idProducto');
            $table->string('idUsuario');
            $table->float('costoTotal');
            $table->timestamps();

        });


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
