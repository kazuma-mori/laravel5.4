<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ContactTypesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(ProjectCategoriesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ProjectImagesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(NewsImagesTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(RecruitsTableSeeder::class);
    }
}
