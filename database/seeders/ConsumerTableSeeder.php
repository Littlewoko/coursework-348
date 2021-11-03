<?php

namespace Database\Seeders;
use App\Models\Consumer;
use Illuminate\Database\Seeder;

class ConsumerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consumers = Consumer::factory()->count(10)->create();
    }
}
