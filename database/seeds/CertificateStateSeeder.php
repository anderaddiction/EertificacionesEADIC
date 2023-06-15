<?php

use App\CertificateState;
use Illuminate\Database\Seeder;

class CertificateStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CertificateState::create([
            'code' => getRandomString(),
            'name' => $name = 'Sin solicitud de trámite de estudiante',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 11,
            'status' => 1,
        ]);

        CertificateState::create([
            'code' => getRandomString(),
            'name' => $name = 'Pendiente de solicitarlo a la Universidad',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 12,
            'status' => 1,
        ]);

        CertificateState::create([
            'code' => getRandomString(),
            'name' => $name = 'Solicitado a la Universidad',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 13,
            'status' => 1,
        ]);

        CertificateState::create([
            'code' => getRandomString(),
            'name' => $name = 'Cert. de Notas en oficina EADIC, con incidencia',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 14,
            'status' => 1,
        ]);


        CertificateState::create([
            'code' => getRandomString(),
            'name' => $name = 'Cert. de Notas (sin apostilla) en oficina EADIC, pendiente de envío',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 15,
            'status' => 1,
        ]);

        CertificateState::create([
            'code' => getRandomString(),
            'name' => $name = 'Cert. de Notas en oficina EADIC, para apostillar',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 16,
            'status' => 1,
        ]);

        CertificateState::create([
            'code' => getRandomString(),
            'name' => $name = 'Cert. de Notas en Notaría',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 17,
            'status' => 1,
        ]);

        CertificateState::create([
            'code' => getRandomString(),
            'name' => $name = 'Cert. de Notas en Colegio Notarial',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 18,
            'status' => 1,
        ]);

        CertificateState::create([
            'code' => getRandomString(),
            'name' => $name = 'Cert. de Notas apostillado en EADIC, pendiente de envío',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 19,
            'status' => 1,
        ]);

        CertificateState::create([
            'code' => getRandomString(),
            'name' => $name = 'Enviado a estudiante',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 20,
            'status' => 1,
        ]);

        CertificateState::create([
            'code' => getRandomString(),
            'name' => $name = 'Envío incidentado',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'concept_id' => 21,
            'status' => 1,
        ]);
    }
}
