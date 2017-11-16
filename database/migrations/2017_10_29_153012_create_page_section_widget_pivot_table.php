<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageSectionWidgetPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_section_widgets', function (Blueprint $table) {
            $table->integer('page_id')->unsigned()->index();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->integer('template_section_id')->unsigned()->index();
            $table->foreign('template_section_id')->references('id')->on('template_sections')->onDelete('cascade');
            $table->integer('widget_id')->unsigned()->index();
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
            $table->primary(['page_id', 'template_section_id', 'widget_id'], 'page_section_widget_primary_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('page_section_widgets');
    }
}
