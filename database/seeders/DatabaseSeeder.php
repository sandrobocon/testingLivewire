<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         User::factory()
             ->create([
                 'email' => 'dev@email.com',
             ]);

        Transaction::factory()->count(250)->create();
    }
}
