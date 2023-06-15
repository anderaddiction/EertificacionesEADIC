<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'code' => getRandomString(),
            'name' => $name = 'Administrador',
            'display_name' => 'Administrador',
            'note' => 'N/A',
            'slug' => generateUrl($name)
        ]);

        Role::create([
            'code' => getRandomString(),
            'name' => $name = 'Alumno',
            'display_name' => 'Alumno',
            'note' => 'N/A',
            'slug' => generateUrl($name)
        ]);

        Role::create([
            'code' => getRandomString(),
            'name' => $name = 'Profesor',
            'display_name' => 'Profesor',
            'note' => 'N/A',
            'slug' => generateUrl($name)
        ]);
    }
}
