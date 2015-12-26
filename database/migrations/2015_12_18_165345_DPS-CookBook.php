<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DPSCookBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('markers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('longname')->nullable();;
            $table->string('ico')->nullable();
            $table->string('metakey')->nullable();
            $table->string('metadesk')->nullable();
            $table->timestamps();
            $table->unique('name');
        });

        Schema::create('marker_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('longname')->nullable();
            $table->string('ico')->nullable();
            $table->string('metakey')->nullable();
            $table->string('metadesk')->nullable();
            $table->timestamps();
        });

        Schema::create('marker_marker_group', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marker_id');
            $table->integer('marker_group_id');
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('user_id');
            $table->text('note')->nullable();
            $table->text('text');
            $table->string('img')->nullable();
            $table->string('timecook')->nullable();
            $table->string('calory')->nullable();
            $table->string('metakey')->nullable();
            $table->string('metadesc')->nullable();
            $table->integer('postStatus_id')->nullable();
            $table->timestamps();
        });

        Schema::create('marker_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marker_id');
            $table->integer('post_id');
            $table->timestamps();
        });

        Schema::create('steps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->string('img');
            $table->text('text');
            $table->timestamps();
        });

        Schema::create('ingridients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->string('name');
            $table->string('img')->nullable();
            $table->string('quantity')->nullable();
            $table->timestamps();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('menuitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('target')->nullable();
            $table->integer('parent_id')->default('0')->nullable();
            $table->integer('type_id');
            $table->integer('menu_id');
            $table->integer('markerGroup_id')->nullable();
            $table->integer('marker_id')->nullable();
            $table->timestamps();
        });

        Schema::create('menuitem_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('post_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
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
        Schema::drop('markers');
        Schema::drop('marker_groups');
        Schema::drop('marker_marker_group');
        Schema::drop('posts');
        Schema::drop('marker_post');
        Schema::drop('steps');
        Schema::drop('ingridients');
        Schema::drop('menus');
        Schema::drop('menuitems');
        Schema::drop('menuitem_types');
        Schema::drop('post_statuses');
    }
}
