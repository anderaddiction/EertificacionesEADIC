<?php

use App\Concept;
use Illuminate\Database\Seeder;

class ConceptStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'Inicio del trámite (pago realizado y creado el ticket con justificante de pago). El tiempo promedio para que el diploma llegue a la oficina EADIC es de 12 meses, desde que el estudiante recibe el correo de Cierre de Edición de Máster por parte de Secretaría Académica.',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El trámite no ha iniciado porque el estudiante no ha realizado el pago y no ha creado el ticket en la plataforma "Soporte EADIC"',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El diploma de la universidad está en la oficina EADIC, pero con errores. Se está gestionando la subsanación ',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El estudiante solo solicitó el envío del diploma y se está a la espera de la confirmación de dirección. El tiempo promedio de llegada, desde que sale de la oficina EADIC hasta la dirección del estudiante, es de 8 días hábiles. ',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El diploma de la universidad se encuentra en la oficina EADIC y próximamente iniciará el proceso de apostilla de la Haya',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'Se inicia el proceso de apostilla. El diploma se encuentra en Notaría para legitimar la firma del mismo. Tiempo promedio Aprox.de espera: 30 días hábiles',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'Para finalizar el proceso de apostilla, el diploma se encuentra en el Colegio Notarial de Madrid para poner el sello de la Haya en el diploma de la universidad. Tiempo promedio Aprox. de espera: 7 días hábiles',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El diploma de la universidad está apostillado en la oficina EADIC. Se está a la espera de la confirmación de dirección. El tiempo promedio de llegada, desde que sale de la oficina EADIC hasta la dirección del estudiante, es de 8 días hábiles. ',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El diploma fue enviado a la dirección confirmado por el estudiante. El tiempo promedio de llegada, desde que sale de la oficina EADIC hasta la dirección del estudiante, es de 8 días hábiles. ',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El diploma fue extraviado durante el envío y se está en proceso de recuperación.',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El estudiante no solicita certificado de notas de la universidad (1)',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'Certificado de notas solicitado por el estudiante. Pendiente solicitarlo a la universidad',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El certificado de notas fue solicitado a la universidad. A la espera de que llegue a la oficina EADIC. El tiempo promedio de espera es de 30 días hábiles',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El certificado de notas llegó a la oficina EADIC, pero con errores. Se está gestionando la corrección con la universidad',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El estudiante solo solicitó el envío del certificado de notas y se está a la espera de la confirmación de dirección. El tiempo promedio de llegada, desde que sale de la oficina EADIC hasta la dirección del estudiante, es de 8 días hábiles. ',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El certificado de notas se encuentra en la oficina EADIC y próximamente se iniciará el proceso de apostilla de la Haya',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'Se inicia el proceso de apostilla. El certificado de notas se encuentra en Notaría para legitimar la firma del mismo. Tiempo promedio Aprox. de espera: 30 días hábiles',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'Para finalizar el proceso de apostilla, el certificado de notas se encuentra en el Colegio Notarial de Madrid para poner el sello de la Haya en el diploma de la universidad. Tiempo promedio Aprox. de espera: 7 días hábiles',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El certificado de notas está apostillado en la oficina EADIC. Se está a la espera de la confirmación de dirección. El tiempo promedio de llegada, desde que sale de la oficina EADIC hasta la dirección del estudiante, es de 8 días hábiles. ',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El certificado de notas fue enviado a la dirección de envío confirmado por el estudiante. El tiempo promedio de llegada, desde que sale de la oficina EADIC hasta la dirección del estudiante, es de 8 días hábiles.',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Concept::create([
            'code' => getRandomString(),
            'name' => $name = 'El certificado de notas fue extraviado durante el envío y se está en proceso de recuperación.',
            'note' => 'N/A',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);
    }
}
