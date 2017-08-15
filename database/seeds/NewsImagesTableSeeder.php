<?php

use Illuminate\Database\Seeder;
use App\Models\NewsImage;

class NewsImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        for($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= rand(1,5); $j++) {
                $newsImages[] = [
                    'id'         => $id,
                    'news_id' => $i,
                    'path'       => base_path().'/public/img/user.jpg',
                    'order'      => $j,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $id ++;
            }
        }

        foreach ($newsImages as $newsImage) {
            $NewsImage = NewsImage::create($newsImage);
            $NewsImage->save();

        }
    }
}
