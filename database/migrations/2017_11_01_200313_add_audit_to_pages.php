<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuditToPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->default(1);
            $table->integer('updated_by')->unsigned();
            $table->foreign('updated_by')->references('id')->on('users')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('updated_by');
        });
    }
}
