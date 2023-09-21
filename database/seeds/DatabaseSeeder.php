<?php

// use RoleSeeder;
// use MasterSeeder;
// use CateogrySeeder;
// use UniversitySeeder;
// use ConceptStateSeeder;
// use DiplomaStateSeeder;
// use CertificateStateSeeder;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleSeeder::class);
        $this->call(CateogrySeeder::class);
        $this->call(MasterSeeder::class);
        $this->call(ConceptStateSeeder::class);
        $this->call(DiplomaStateSeeder::class);
        $this->call(CertificateStateSeeder::class);
        $this->call(UniversitySeeder::class);
        $this->call(CountrySeed::class);
        $this->call(UserSeeder::class);
        // Inserta registros de prueba
        for ($i = 0; $i < 50; $i++) {


           DB::table('datos_por_matricula')->insert([
    'nombre' => 'Nombre' . $i,
    'apellido' => 'Apellido' . $i,
    'documento_de_identidad' => rand(10000000, 30000000),
    'email' => 'email' . $i . '@example.com',
    'id_master' => 3,
    'id_universities' => rand(1, 2),
    'situacion_financiera' => rand(1, 100),
    'estado_matricula' => rand(1, 100),
    'modalidad_de_estudio' => 'Modalidad' . $i,
    'estado_formacion' => 'Estado' . $i,
    'edicion_master' => 'Edición' . $i,
    'fecha_inicio' => now(),
    'fecha_fin' => now(),
    'numero_oportunidad' => rand(1, 10),
    'codigoUnicoEstudiante' => rand(111, 999),  // Remove the extra space
    'nombreOportunidad' => 'nombreOportunidad ' . $i,  // Remove the extra space
    'created_at' => now(),
    'updated_at' => now(),
]);

        }
    }
}
