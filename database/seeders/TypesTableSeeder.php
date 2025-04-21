<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                'name' => '食費',
                'category' => 1,
            ],
            [
                'name' => '雑費',
                'category' => 1,
            ],
            [
                'name' => '給与',
                'category' => 0,
            ],
            [
            'name' => '給与',
            'category' => 0,
            ],
        ];
        //
        foreach ($params as $param) {
            DB::table('types')->insert($param);
        }
    }
}
