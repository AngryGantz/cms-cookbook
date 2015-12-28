<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldShowaddTableMarkerGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marker_groups', function (Blueprint $table) {
            $table->string('showadd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marker_groups', function (Blueprint $table) {
            $table->dropColumn('showadd');
        });
    }
}
