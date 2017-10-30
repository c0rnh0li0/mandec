<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateSectionWidgetPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_section_widget', function (Blueprint $table) {
            $table->integer('template_section_id')->unsigned()->index();
            $table->foreign('template_section_id')->references('id')->on('template_sections')->onDelete('cascade');
            $table->integer('widget_id')->unsigned()->index();
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
            $table->primary(['template_section_id', 'widget_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('template_section_widget');
    }
}
