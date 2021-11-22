<?php

namespace Database\Seeders;
use App\Models\Consumer;
use App\Models\Comment;
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
        $u = new Consumer;
        $u->name = "Itachi";
        $u->date_of_birth = "1999-06-09";
        $u->save();
        
        $consumers = Consumer::factory()->count(10)
            ->has(Comment::factory()->count(3))
            ->create();
    }
}
