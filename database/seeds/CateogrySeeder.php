<?php

use App\Category;
use Illuminate\Database\Seeder;

class CateogrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'code' => getRandomString(),
            'name' => $name = 'No ha solicitado trámite',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Category::create([
            'code' => getRandomString(),
            'name' => $name = 'Diploma + Envio',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Category::create([
            'code' => getRandomString(),
            'name' => $name = 'Diploma + Apostilla + Envio',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Category::create([
            'code' => getRandomString(),
            'name' => $name = 'Diploma + Certificado + Envio',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Category::create([
            'code' => getRandomString(),
            'name' => $name = 'Diploma + Certificado + Apostilla + Envio',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Category::create([
            'code' => getRandomString(),
            'name' => $name = 'Certificado + Envio',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Category::create([
            'code' => getRandomString(),
            'name' => $name = 'Certificado + Apostilla + Envio',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);
    }
}
