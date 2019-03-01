<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name', '255');
            $table->string('description')->nullable();
            $table->string('principio_activo')->nullable();
            $table->string('presentacion')->nullable();
            $table->string('pdf_file')->nullable();
            $table->string('caracteristicas')->nullable();
            $table->integer('laboratorio_id')->unsigned()->nullable();
            $table->string('code')->nullable();
            $table->integer('price')->nullable();
            $table->integer('highlight')->nullable();

            $table->index('id');
            $table->index('laboratorio_id');

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
        Schema::drop('productos');
    }
}
