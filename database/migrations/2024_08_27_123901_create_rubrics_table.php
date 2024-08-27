<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubricsTable extends Migration
{
    public function up()
    {
        Schema::create('rubrics', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ajoutez cette ligne si elle manque
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rubrics');
    }
}
