<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('precio');
            $table->text('descripcion');
            $table->string('ubicacion')->nullable();
            $table->string('moneda')->nullable();
            $table->integer('puntuacion')->nullable();
            $table->string('estado')->nullable();
            $table->integer('status')->nullable();
            $table->integer('vista')->nullable();

            $table->foreignId('user_id')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('categoria_id')
            ->constrained('categorias')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('subcategoria_id')
            ->nullable()
            ->constrained('subcategorias')
            ->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('anuncios');
    }
}
