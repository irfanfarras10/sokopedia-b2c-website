<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions_details')->insert([
            [
                'transaction_id' => 1,
                'product_id' => 1,
                'quantity' => 1
            ],
            [
                'transaction_id' => 1,
                'product_id' => 2,
                'quantity' => 1
            ],
            [
                'transaction_id' => 1,
                'product_id' => 3,
                'quantity' => 1
            ],
            [
                'transaction_id' => 2,
                'product_id' => 1,
                'quantity' => 1
            ],
            [
                'transaction_id' => 2,
                'product_id' => 2,
                'quantity' => 1
            ],
            [
                'transaction_id' => 2,
                'product_id' => 3,
                'quantity' => 1
            ]
       ]);
    }
}
