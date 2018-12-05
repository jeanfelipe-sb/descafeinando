<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->string('name');
            $table->string('email');
            $table->boolean('approved')->default(false);
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')
                    ->references('id')->on('posts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('comentarios');
    }

}
