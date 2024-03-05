<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SaborSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            DB::table('sabor')->insert([
                'imagem'=> $faker->image( $dir = 'public/storage/imagem/sabor',640,480, null, true),
                //'nome'=>$faker->randomElement($array = array ('Marguerita','Marinara','Four stagioni','Bianca','Bismarck','Boscaiola','Diavola','Mare e monti','Napolitana')),
                'nome'=>$faker->word,
                'ingredientes'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
                //'ingredientes'=>$faker->shuffle(array('molho de tomate', 'queijo', 'orégano', 'manjericão', 'azeite')),
                'precoBRL'=>$faker->numberBetween($min = 25, $max = 50),
            ]);
        /*
            DB::table('sabor')
            ->where('imagem',"like",'%public/storage/%')
            ->update(['imagem' => strtolower(str_replace('public/storage/', '' , $faker->sentence($nbWords = 4, $variableNbWords = true)))]);
        */
        }
    }
}
