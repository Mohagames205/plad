<?php

namespace Database\Seeders;

use Faker\Provider\DateTime;
use Faker\Provider\nl_BE\Address;
use Faker\Provider\nl_BE\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CodeSeeder extends Seeder
{

    public int $counter = 0;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if($this->counter > 15) {
            return;
        }

        $volunteers = [];
        $numberOfVolunteers = mt_rand(2, 5);

        for ($i = 0; $i < $numberOfVolunteers; $i++) {
            $volunteers[] = Person::firstNameMale();
        }

        DB::table('collection_events')->insert([
            'code' => mt_rand(100000, 999999),
            'location' => Address::state(),
            'start_time' => DateTime::dateTimeBetween('-1 years', '+1 years'),
            'end_time' => DateTime::dateTimeBetween('+1 years', '+2 years'),
            'volunteers' => json_encode($volunteers),
            'bandage_count' => mt_rand(100, 500),
            'change_received' => mt_rand(60, 200),
            'payconiq_uids' => json_encode(array_map(function () {
                return rand(20, 40);
            }, array_fill(0, 3, null))),
            'status' => strval(mt_rand(0, 1)),
        ]);

        $this->counter++;
        $this->run();

    }
}
