<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('settings_view');
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
        Schema::table('widget_types', function (Blueprint $table) {
            $table->drop();
        });
    }
}
