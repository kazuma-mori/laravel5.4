<?php

use Illuminate\Database\Seeder;
use App\Models\ProjectCategory;

class ProjectCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            $projectCategories[] = [
                'id'         => $i,
                'name'       => 'カテゴリ'. $i,
                'name_en'    => 'category'. $i,
                'name_ch'    => '类别'. $i,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        foreach ($projectCategories as $projectCategory) {
            $ProjectCategory = ProjectCategory::create($projectCategory);
            $ProjectCategory->save();

        }
    }
}
