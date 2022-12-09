<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            ['titre' => 'article de base',
            'texte' => "ceci n'est rien d'autre qu'un article de base, un simple article de base",
            'user_id' => 1], 
            ['titre' => 'article Premium',
            'texte' => "ceci est article premium, rédigé par une personne lettré, entièrement à la main avec un jolie stylo",
            'user_id' => 1], 
         ]);
    }
}
