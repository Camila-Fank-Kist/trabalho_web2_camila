<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AvaliacaoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            DB::table('avaliacao')->insert([
                'sabor_id'=>$faker->numberBetween($min = 1, $max = 10),
                'filial_id'=>$faker->numberBetween($min = 1, $max = 10),
                'nota_id'=>$faker->numberBetween($min = 1, $max = 10),
                'descricao'=>$faker->sentence($nbWords = 4, $variableNbWords = true),
            ]);
        }
    }
}
