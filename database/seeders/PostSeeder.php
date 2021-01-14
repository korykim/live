<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Posts')->insert([
            'title' => Str::random(10),
            'body' => Str::random(10),
        ]);
    }
}
