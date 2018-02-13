<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liens', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('url');
            $table->integer('id_prospect')->nullable($value = true);
            $table->boolean('campagne_recrutement')->default($value = 0);
            $table->date('valide_at')->nullable($value = true);
            $table->dateTime('deleted_at')->nullable($value = true);
            $table->integer('user_id')->nullable($value = true);
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
        Schema::dropIfExists('liens');
    }
}
