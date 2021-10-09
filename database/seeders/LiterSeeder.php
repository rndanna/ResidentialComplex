<?php

namespace Database\Seeders;

use App\Models\Liter;
use Illuminate\Database\Seeder;

class LiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Liter::factory()->count(20)->create();
    }
}
