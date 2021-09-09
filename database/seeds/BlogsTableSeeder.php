<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    
    public function run()
    {
        //(''テーブル名')
        DB::table('blogs')->insert([
            'id' => 1,
            'title' => '題名1',
            'content' => '本文1',
            'category' => 'イベント'

        ]);
         DB::table('blogs')->insert([
            'id' => 2,
            'title' => '題名2',
            'content' => '本文2',
            'category' => '旅行'

        ]);
         DB::table('blogs')->insert([
            'id' => 3,
            'title' => '題名3',
            'content' => '本文3',
            'category' => 'グルメ'

        ]);

    }
}
