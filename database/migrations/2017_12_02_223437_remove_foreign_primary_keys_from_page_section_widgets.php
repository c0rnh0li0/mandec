<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveForeignPrimaryKeysFromPageSectionWidgets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_section_widgets', function (Blueprint $table) {
            $table->dropForeign('page_section_widgets_page_id_foreign');
            $table->dropForeign('page_section_widgets_template_section_id_foreign');
            $table->dropForeign('page_section_widgets_widget_id_foreign');
            $table->dropPrimary();
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
            //
        });
    }
}
