<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IncomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                'amount' => 10000,
                'date' => '2022-12-31',
                'comment' => 'サンプル1',
                'type_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'amount' => 50000,
                'date' => '2023-01-01',
                'comment' => 'サンプル2',
                'type_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'amount' => 100000,
                'date' => '2023-02-01',
                'comment' => 'サンプル3',
                'type_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        //
        foreach ($params as $param) {
            DB::table('incomes')->insert($param);
        }
        // 
    }
}
