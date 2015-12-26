<?php

use Illuminate\Database\Seeder;

class NewCmsOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cms_options')->insert([

            [ 'name' => 'Название сайта', 'value' => ' CMS DP-CookBook' ],
            [ 'name' => 'metakey', 'value' => '' ],
            [ 'name' => 'metadesc', 'value' => '' ],

        ]);

    }
}
