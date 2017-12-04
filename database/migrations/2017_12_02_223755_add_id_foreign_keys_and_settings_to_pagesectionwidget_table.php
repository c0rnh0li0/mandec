<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdForeignKeysAndSettingsToPagesectionwidgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_section_widgets', function (Blueprint $table) {
            $table->increments('id');
            $table->text('settings');

            //$table->integer('page_id')->unsigned()->index();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            //$table->integer('template_section_id')->unsigned()->index();
            $table->foreign('template_section_id')->references('id')->on('template_sections')->onDelete('cascade');
            //$table->integer('widget_id')->unsigned()->index();
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_section_widgets', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('settings');

            $table->dropForeign('page_section_widgets_page_id_foreign');
            $table->dropForeign('page_section_widgets_template_section_id_foreign');
            $table->dropForeign('page_section_widgets_widget_id_foreign');
        });
    }
}
