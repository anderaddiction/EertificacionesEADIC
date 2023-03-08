<?php

use App\Master;
use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Diseño, Construcción y Mantenimiento de Carreteras (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MCARRE',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster Internacional en Tráfico, Transportes y Seguridad Vial (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MTTSEG',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Aeropuertos: Diseño, Construcción y Mantenimiento (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MAEROP',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Diseño, Construcción y Explotación de Puertos, Costas y Obras Marítimas Especiales (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MPUERT',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Infraestructuras Ferroviarias (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MIFFCC',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Construcción, Mantenimiento y Explotación de Metros, Tranvías y Ferrocarriles Urbanos (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MTRANV',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);


        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Planificación, Construcción y Explotación de Infraestructuras Ambientalmente Sostenibles (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MASOST',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Conservación de Carreteras (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MCONSER',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Cálculo de Estructuras de Obras Civiles (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MESTRU',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Geotecnia y Cimentaciones (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MGEOCI',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Diseño, Cálculo y Reparación de Estructuras de Edificación (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MESTED',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Patología, Rehabilitación de Estructuras y Eficiencia y Ahorro Energético en Edificación (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MREHEE',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Ingeniería de Materiales de Construcción (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MIMCON',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Diseño, Construcción y Explotación de Obras Hidráulicas (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MOOHH',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Ingeniería del Agua: Tratamiento, Depuración y Gestión de Residuos (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MIAGUA',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster Internacional en Ingeniería y Gestión Ambiental (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MIAMBI',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);


        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster Internacional en BIM Management en Infraestructuras e Ingeniería Civil (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MBIMCI+',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'International Master’s Degree in BIM Management for Infrastructures and Civil Engineering ',
            'note' => 'N/A',
            'master_code' => 'MBIMCII',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster Internacional en BIM Management (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MBIMMA+',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'International Master’s Degree in BIM Management ',
            'note' => 'N/A',
            'master_code' => 'MBIMMAI',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster BIM en Diseño y Construcción de Vías, Carreteras y Autopistas (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MBIMCR',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Diseño de Interiores y Gestión BIM de Proyectos de Arquitectura e Interiorismo (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MBIMDIA',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster BIM & Data Management (optimización, automatización y gestión de datos BIM) (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MBIMDA',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster Internacional BIM Management especializado en ejecución y gestión de contratos en fase de construcción (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MBIMCO',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster BIM Management especializado en Proyectos Estructurales (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MBIMST',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster BIM en diseño y construcción de Túneles (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MBIMCT',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);


        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Financiación y Gestión de Infraestructuras (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MFINGE',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster MBA en Dirección de Empresas y Gerencia de Proyectos de Ingeniería y Construcción (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MBADEC',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster MBA en Gestión de Empresas Agropecuarias y Dirección de Agronegocios (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MBAGRO',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster MBA en Minería, Dirección y Gestión de Empresas Mineras (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MBAMIN',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster Internacional en Project Management (Formación Permanente) (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MINPRO',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Logística y Transporte (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MTRLOG',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Gestión Integrada de la Calidad, la Seguridad y el Medio Ambiente (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MGICSM',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster Internacional en Seguridad y Salud en el Trabajo y Prevención de Riesgos (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MSEGST',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Metodologías Ágiles (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MMAGIL',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Gestión de Riesgos y Compliance (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MGESRI',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);


        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Petróleo y Gas: Prospección, Transformación y Gestión (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MPEYGA',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Energías Renovables y Eficiencia Energética (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MERYEE',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Minería: Planificación y Gestión de Minas y Operaciones Mineras (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MOPMIN',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Marketing Digital (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MMADIG',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Big Data y Business Intelligence (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MBIGDA',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Seguridad de la Información y Continuidad de Negocio (Ciberseguridad) (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MSEGIN',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Diseño y Construcción de Instalaciones y Plantas Industriales (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MPLAIN',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Electrónica Industrial, Automatización y Control (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MELECT',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Ingeniería Eléctrica Aplicada (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MELECA',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Gerencia e Ingeniería del Mantenimiento Industrial (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MMAIND',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);


        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Ingeniería Industrial (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MINGIN',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Ingeniería Química (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MINQUI',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Ingeniería Mecánica especializado en Diseño, Logística y Gerencia (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MINMEC',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);

        Master::create([
            'code' => getRandomString(),
            'name' => $name = 'Máster en Ingeniería Biomédica (Título propio)',
            'note' => 'N/A',
            'master_code' => 'MINBIO',
            'slug' => generateUrl($name),
            'status' => 1,
        ]);
    }
}
