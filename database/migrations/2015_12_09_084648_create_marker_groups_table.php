<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkerGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marker_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('longname')->nullable();
            $table->string('ico')->nullable();
            $table->string('metakey')->nullable();
            $table->string('metadesk')->nullable();
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
        Schema::drop('marker_groups');
    }
}
