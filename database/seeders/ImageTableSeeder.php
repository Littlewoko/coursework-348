<?php

namespace Database\Seeders;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $i = new Image();
        $i->name = "image";
        $i->file_path = "public/images/Felis_silvestris_silvestris_small_gradual_decrease_of_quality.png";
        $i->consumer_id = 1;
        $i->save();
    }
}
