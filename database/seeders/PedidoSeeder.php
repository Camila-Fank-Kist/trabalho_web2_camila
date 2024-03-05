<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PedidoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            DB::table('pedido')->insert([
                'sabor_id'=>$faker->numberBetween($min = 1, $max = 10),
                'quantidade'=>$faker->numberBetween($min = 1, $max = 10),
                'filial_id'=>$faker->numberBetween($min = 1, $max = 10),
                'retirada_id'=>$faker->numberBetween($min = 1, $max = 5),
                'pagamento_id'=>$faker->numberBetween($min = 1, $max = 5),
                'observacao'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
            ]);
        }
    }
}
