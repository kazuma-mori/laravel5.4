<?php

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            $contacts[] = [
                'id'              => $i,
                'contact_type_id' => rand(1,10),
                'body'            => 'テスト'. $i,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ];
        }

        foreach ($contacts as $contact) {
            $Contact= Contact::create($contact);
            $Contact->save();

        }
    }
}
