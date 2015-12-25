<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();
//        $this->call(BaseData::class);
//        $this->call(CmsOptionsSeeder::class);

        DB::table('cms_options')->insert([

            [ 'name' => 'Название сайта', 'value' => ' CMS DP-CookBook' ],
            [ 'name' => 'metakey', 'value' => '' ],
            [ 'name' => 'metadesc', 'value' => '' ],

        ]);

        Model::reguard();

    }
}
