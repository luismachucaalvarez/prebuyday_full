<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert([
            ['nombre'=>'Gerente'],
            ['nombre'=>'Marketing'],
            ['nombre'=>'Otro'],
        ]);
    }
}
