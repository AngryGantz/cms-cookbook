<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePostTableMakenuulablefields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('note')->nullable()->change();
            $table->string('img')->nullable()->change();
            $table->string('timecook')->nullable()->change();
            $table->string('calory')->nullable()->change();
            $table->string('metakey')->nullable()->change();
            $table->string('metadesc')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('note')->change();
            $table->string('img')->change();
            $table->string('timecook')->change();
            $table->string('calory')->change();
            $table->string('metakey')->change();
            $table->string('metadesc')->change();
        });
    }
}
