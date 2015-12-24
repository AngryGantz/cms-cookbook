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

        // $this->call(UserTableSeeder::class);

        DB::table('users')->insert([
            'first_name' => 'Администратор',
            'email' => 'admin@localhost.loc',
            'password' => bcrypt('adminadmin'),
        ]);

        DB::table('post_statuses')->insert([
           [ 'name' => 'Неопубликован' ],
           [ 'name' => 'На модерации' ],
           [ 'name' => 'Опубликован' ],
        ]);

        DB::table('menuitem_types')->insert([
            [ 'name' => 'Внутренняя ссылка' ],
            [ 'name' => 'Внешняя ссылка' ],
            [ 'name' => 'Маркер' ],
            [ 'name' => 'Группа маркеров' ],
        ]);


        DB::table('administrators')->insert([

            'username' => 'admin',
        	'password' => bcrypt('adminadmin'),
            'name'     => 'Администратор'
        ]);

        DB::table('marker_groups')->insert([

            [ 'name' => 'Кухня' ],
            [ 'name' => 'Блюдо' ],
            [ 'name' => 'Дневной рацион' ],
        ]);

        Model::reguard();
    }
}
