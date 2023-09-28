<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use App\DatosPorMatricula;

class DatosPorMatriculaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Define las reglas de validación para cada campo
        $rules = [
            'id' => 'nullable',
            'nombre' => 'required',
            'apellido' => 'required',
            'documento_de_identidad' => 'nullable',
            'email' => 'required|email|unique:datos_por_matricula,email',
            'id_master' => 'nullable',
            'id_universities' => 'nullable',
            'situacion_financiera' => 'nullable',
            'estado_matricula' => 'nullable',
            'modalidad_de_estudio' => 'nullable',
            'estado_formacion' => 'nullable',
            'edicion_master' => 'nullable',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'numero_oportunidad' => 'nullable',
            'codigoUnicoEstudiante' => 'nullable|unique:datos_por_matricula,codigoUnicoEstudiante',
            'nombreOportunidad' => 'nullable',
        ];

        // Define los mensajes de error personalizados
        $customMessages = [
            'email.unique' => 'El correo electrónico ya ha sido registrado.',
            'codigoUnicoEstudiante.unique' => 'El código único del estudiante ya ha sido registrado.',
        ];

        // Realiza la validación de la fila
        $validator = Validator::make($row, $rules, $customMessages);

        // Si la validación falla, puedes registrar los errores o manejarlos según tus necesidades
        if ($validator->fails()) {
            // Obtiene todos los mensajes de error
            $errorMessages = $validator->errors()->all();

            // Combina todos los mensajes de error en uno solo
            $errorString = implode('<br>', $errorMessages);

            // Por ejemplo, puedes registrar los errores en un archivo de registro
            \Log::error('Errores de validación en fila: ' . $errorString);
            // O puedes lanzar una excepción o retornar un mensaje de error personalizado
            throw new \Exception('Errores de validación en fila: ' . $errorString);
        }

        // Si la validación es exitosa, crea un nuevo modelo DatosPorMatricula con los datos de la fila
        return new DatosPorMatricula([
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'documento_de_identidad' => $row['documento_de_identidad'],
            'email' => $row['email'],
            'id_master' => $row['id_master'],
            'id_universities' => $row['id_universities'],
            'situacion_financiera' => $row['situacion_financiera'],
            'estado_matricula' => $row['estado_matricula'],
            'modalidad_de_estudio' => $row['modalidad_de_estudio'],
            'estado_formacion' => $row['estado_formacion'],
            'edicion_master' => $row['edicion_master'],
            'fecha_inicio' => $row['fecha_inicio'],
            'fecha_fin' => $row['fecha_fin'],
            'numero_oportunidad' => $row['numero_oportunidad'],
            'codigoUnicoEstudiante' => $row['codigoUnicoEstudiante'],
            'nombreOportunidad' => $row['nombreOportunidad'],
        ]);
    }
}
