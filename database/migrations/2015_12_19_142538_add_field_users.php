<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('about')->nullable();
            $table->string('social_fb')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_gplus')->nullable();
            $table->string('social_vk')->nullable();
            $table->string('avatar')->nullable();
            $table->string('skype')->nullable();
            $table->string('public_email')->nullable();
            $table->string('site')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('about');
            $table->dropColumn('social_fb');
            $table->dropColumn('social_twitter');
            $table->dropColumn('social_gplus');
            $table->dropColumn('social_vk');
            $table->dropColumn('avatar');
            $table->dropColumn('skype');
            $table->dropColumn('public_email');
            $table->dropColumn('site');
        });
    }
}
