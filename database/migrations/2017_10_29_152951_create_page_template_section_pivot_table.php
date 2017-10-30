<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTemplateSectionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_template_section', function (Blueprint $table) {
            $table->integer('page_id')->unsigned()->index();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->integer('template_section_id')->unsigned()->index();
            $table->foreign('template_section_id')->references('id')->on('template_sections')->onDelete('cascade');
            $table->primary(['page_id', 'template_section_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('page_template_section');
    }
}
