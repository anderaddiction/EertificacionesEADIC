<?php

use App\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        University::create([
            'code' => getRandomString(),
            'name' => $name = 'UDIMA',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        University::create([
            'code' => getRandomString(),
            'name' => $name = 'UCAM',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);
    }
}
