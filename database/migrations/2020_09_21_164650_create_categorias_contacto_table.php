<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_contacto', function (Blueprint $table) {
            $table->integer('contacto_id')->unsigned();

            $table->integer('categoria_id')->unsigned();

            $table->foreign('contacto_id')->references('id')->on('contactos')

                ->onDelete('cascade');

            $table->foreign('categoria_id')->references('id')->on('categorias')

                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_contacto');
    }
}
