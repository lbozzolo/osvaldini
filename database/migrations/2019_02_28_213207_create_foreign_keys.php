<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function(Blueprint $table){
            $table->foreign('laboratorio_id')
                ->references('id')
                ->on('laboratorios')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });

        Schema::table('categorias_productos', function(Blueprint $table){
            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}