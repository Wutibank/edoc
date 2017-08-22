<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdocFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edoc_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nameoffile');
            $table->string('size');
            $table->string('category');
            $table->string('path');
            $table->date('expire');
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
        Schema::dropIfExists('edoc_files');
    }
}
