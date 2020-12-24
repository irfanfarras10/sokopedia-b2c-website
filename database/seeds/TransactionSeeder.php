<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Jakarta');
        DB::table('transactions')->insert([
            [
                'user_id' => 2,
                'date' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => 3,
                'date' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
