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
        $rules = [
            'id' => 'nullable',
            'nombre' => 'required',
            'apellido' => 'required',
            'documento_de_identidad' => 'nullable',
            'email' => 'required|email',
            'id_master' => 'nullable',
            'id_universities' => 'nullable',
            'situacion_financiera' => 'nullable',
            'estado_matricula' => 'nullable',
            'modalidad_de_estudio' => 'nullable',
            'estado_formacion' => 'nullable',
            'edicion_master' => 'nullable',
            'fecha_inicio' => 'nullable',
            'fecha_fin' => 'nullable',
            'numero_oportunidad' => 'nullable',
            'codigoUnicoEstudiante' => 'nullable|unique:datos_por_matricula,codigoUnicoEstudiante',
            'nombreOportunidad' => 'nullable',
        ];

        $customMessages = [
            'email.unique' => 'El correo electrónico ya ha sido registrado.',
            'codigoUnicoEstudiante.unique' => 'El código único del estudiante ya ha sido registrado.',
        ];

        $validator = Validator::make($row, $rules, $customMessages);

        if ($validator->fails()) {
            $errorMessages = $validator->errors()->all();

            $errorString = implode('<br>', $errorMessages);

            \Log::error('Errores de validación en fila: ' . $errorString);
            throw new \Exception('Errores de validación en fila: ' . $errorString);
        }

        return new DatosPorMatricula([
            'id' => $row['id'] ?? null,
            'nombre' => $row['nombre'] ?? null,
            'apellido' => $row['apellido'] ?? null,
            'documento_de_identidad' => $row['documento_de_identidad'] ?? null,
            'email' => $row['email'] ?? null,
            'id_master' => $row['id_master'] ?? null,
            'id_universities' => $row['id_universities'] ?? null,
            'situacion_financiera' => $row['situacion_financiera'] ?? null,
            'estado_matricula' => $row['estado_matricula'] ?? null,
            'modalidad_de_estudio' => $row['modalidad_de_estudio'] ?? null,
            'estado_formacion' => $row['estado_formacion'] ?? null,
            'edicion_master' => $row['edicion_master'] ?? null,
            'fecha_inicio' => $row['fecha_inicio'] ?? null,
            'fecha_fin' => $row['fecha_fin'] ?? null,
            'numero_oportunidad' => $row['numero_oportunidad'] ?? null,
            'codigoUnicoEstudiante' => $row['codigoUnicoEstudiante'] ?? null,
            'nombreOportunidad' => $row['nombreOportunidad'] ?? null,
        ]);
    }
}
