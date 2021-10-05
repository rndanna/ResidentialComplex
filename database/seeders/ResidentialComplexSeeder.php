<?php

namespace Database\Seeders;

use App\Models\ResidentialComplex;
use Illuminate\Database\Seeder;

class ResidentialComplexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResidentialComplex::factory()->count(20)->create();
    }
}
