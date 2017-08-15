<?php

use Illuminate\Database\Seeder;
use App\Models\ContactType;

class ContactTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            $contactTypes[] = [
                'id'         => $i,
                'name'       => '種類'. $i,
                'name_en'    => 'type'. $i,
                'name_ch'    => '样'. $i,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        foreach ($contactTypes as $contactType) {
            $ContactType = ContactType::create($contactType);
            $ContactType->save();

        }
    }
}
