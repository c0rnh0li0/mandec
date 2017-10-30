<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('template_id')->unsigned();
            $table->foreign('template_id')->references('id')->on('templates');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->default(1);
            $table->integer('updated_by')->unsigned();
            $table->foreign('updated_by')->references('id')->on('users')->default(1);
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
        Schema::drop('template_sections');
    }
}
