<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Yönetici',
                'short_title' => 'admin'
            ],
            [
                'name' => 'Editör',
                'short_title' => 'editor'
            ],
            [
                'name' => 'Yazar',
                'short_title' => 'writer'
            ],
            [
                'name' => 'Abone',
                'short_title' => 'subscriber'
            ]
        ]);
    }
}
