<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProceduresTable extends Migration
{

    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('category_id');
            $table->string('description')->nullable();

            $table->timestamps();

            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });

        //  Creando la tabla intermedia entre users y procedures
        Schema::create('procedure_user', function (Blueprint $table) {
            $table->unsignedBigInteger('procedure_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('procedure_id')
                ->references('id')
                ->on('procedures')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('procedures');
    }
}
