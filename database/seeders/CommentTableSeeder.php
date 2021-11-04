<?php

namespace Database\Seeders;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Comment;
        $c->time_posted = '20:49:42';
        $c->comment_text = "Hello There";
        $c->save();
    }
}
