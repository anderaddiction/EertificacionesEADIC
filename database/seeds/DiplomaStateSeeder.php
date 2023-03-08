<?php

use App\DiplomaState;
use Illuminate\Database\Seeder;

class DiplomaStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiplomaState::create([
            'code' => getRandomString(),
            'name' => $name = 'Con trámite solicitado por estudiante/Diploma pendiente de llegada a EADIC',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 1,
            'status' => 1,
        ]);

        DiplomaState::create([
            'code' => getRandomString(),
            'name' => $name = 'Sin solicitud de trámite de estudiante',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 2,
            'status' => 1,
        ]);

        DiplomaState::create([
            'code' => getRandomString(),
            'name' => $name = 'Diploma en oficina EADIC, con incidencia',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 3,
            'status' => 1,
        ]);

        DiplomaState::create([
            'code' => getRandomString(),
            'name' => $name = 'Diploma (sin apostilla) en oficina EADIC, pendiente de envío',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 4,
            'status' => 1,
        ]);


        DiplomaState::create([
            'code' => getRandomString(),
            'name' => $name = 'Diploma en oficina EADIC, para apostillar',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 5,
            'status' => 1,
        ]);

        DiplomaState::create([
            'code' => getRandomString(),
            'name' => $name = 'Diploma en Notaría',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 6,
            'status' => 1,
        ]);

        DiplomaState::create([
            'code' => getRandomString(),
            'name' => $name = 'Diploma en Colegio Notarial',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 7,
            'status' => 1,
        ]);

        DiplomaState::create([
            'code' => getRandomString(),
            'name' => $name = 'Diploma apostillado en EADIC, pendiente de envío',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 8,
            'status' => 1,
        ]);

        DiplomaState::create([
            'code' => getRandomString(),
            'name' => $name = 'Enviado a estudiante',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 9,
            'status' => 1,
        ]);

        DiplomaState::create([
            'code' => getRandomString(),
            'name' => $name = 'Envío incidentado',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 10,
            'status' => 1,
        ]);
    }
}
