<?php

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            $news[] = [
                'id'         => $i,
                'title'      => 'テスト'. $i,
                'title_en'   => 'test'. $i,
                'title_ch'   => '测试'. $i,
                'body'       => 'テスト'. $i,
                'body_en'    => 'test'. $i,
                'body_ch'    => '测试'. $i,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        foreach ($news as $value) {
            $News = News::create($value);
            $News->save();

        }
    }
}
