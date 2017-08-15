<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            $projects[] = [
                'id'         => $i,
                'name'       => 'テスト'. $i,
                'name_en'    => 'test'. $i,
                'name_ch'    => '测试'. $i,
                'body'       => 'テスト'. $i,
                'body_en'    => 'test'. $i,
                'body_ch'    => '测试'. $i,
                'access'     => 'テスト'. $i,
                'access_en'  => 'test'. $i,
                'access_ch'  => '测试'. $i,
                'tel'        => '000-1111-2222',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        foreach ($projects as $project) {
            $Project = Project::create($project);
            $Project->save();

        }
    }
}
