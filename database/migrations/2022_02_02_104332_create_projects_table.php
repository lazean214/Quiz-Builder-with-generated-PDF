<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('budget');
            $table->string('area');
            $table->string('purpose');
            $table->string('completion');
            $table->string('name');
            $table->longtext('content');
            $table->string('handover');
            $table->string('price');
            $table->string('size');
            $table->string('image');
            $table->longtext('gallery');
            $table->string('language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
