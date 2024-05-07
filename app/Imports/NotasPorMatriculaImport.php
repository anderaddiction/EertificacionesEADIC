<?php

namespace App\Imports;

use App\notasPorMatricula;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class NotasPorMatriculaImport implements ToModel, WithHeadingRow
{
    /**
     * Define el modelo a partir de una fila del archivo.
     *
     * @param array $row
     * @return notasPorMatricula|null
     */
    public function model(array $row)
    {
        // Validación de los datos de la fila
        $validator = Validator::make($row, [
            'codigoUnicoEstudiante' => 'nullable',
            'asignaturas_1'         => 'nullable',
            'asignaturas_2'         => 'nullable',
            'asignaturas_3'         => 'nullable',
            'asignaturas_4'         => 'nullable',
            'asignaturas_5'         => 'nullable',
            'asignaturas_6'         => 'nullable',
            'asignaturas_7'         => 'nullable',
            'asignaturas_8'         => 'nullable',
            'asignaturas_9'         => 'nullable',
            'modulos_1'             => 'nullable',
            'modulos_2'             => 'nullable',
            'modulos_3'             => 'nullable',
            'modulos_4'             => 'nullable',
            'modulos_5'             => 'nullable',
            'modulos_6'             => 'nullable',
            'modulos_7'             => 'nullable',
            'modulos_8'             => 'nullable',
            'modulos_9'             => 'nullable',
            'estado_1'              => 'nullable',
            'estado_2'              => 'nullable',
            'estado_3'              => 'nullable',
            'estado_4'              => 'nullable',
            'estado_5'              => 'nullable',
            'estado_6'              => 'nullable',
            'estado_7'              => 'nullable',
            'estado_8'              => 'nullable',
            'estado_9'              => 'nullable',
            'bloqueado'             => 'nullable',
        ]);

        if ($validator->fails()) {
            Log::error('Validation error: ' . implode(", ", $validator->errors()->all()));
            return null;  // Return null to skip this row.
        }

        // Crear una nueva instancia del modelo
        return new notasPorMatricula([
            'codigoUnicoEstudiante' => $row['codigounicoestudiante'],
            'asignaturas_1'         => $row['asignaturas_1'],
            'asignaturas_2'         => $row['asignaturas_2'],
            'asignaturas_3'         => $row['asignaturas_3'],
            'asignaturas_4'         => $row['asignaturas_4'],
            'asignaturas_5'         => $row['asignaturas_5'],
            'asignaturas_6'         => $row['asignaturas_6'],
            'asignaturas_7'         => $row['asignaturas_7'],
            'asignaturas_8'         => $row['asignaturas_8'],
            'asignaturas_9'         => $row['asignaturas_9'],
            'modulos_1'             => $row['modulos_1'],
            'modulos_2'             => $row['modulos_2'],
            'modulos_3'             => $row['modulos_3'],
            'modulos_4'             => $row['modulos_4'],
            'modulos_5'             => $row['modulos_5'],
            'modulos_6'             => $row['modulos_6'],
            'modulos_7'             => $row['modulos_7'],
            'modulos_8'             => $row['modulos_8'],
            'modulos_9'             => $row['modulos_9'],
            'estado_1'              => $row['estado_1'],
            'estado_2'              => $row['estado_2'],
            'estado_3'              => $row['estado_3'],
            'estado_4'              => $row['estado_4'],
            'estado_5'              => $row['estado_5'],
            'estado_6'              => $row['estado_6'],
            'estado_7'              => $row['estado_7'],
            'estado_8'              => $row['estado_8'],
            'estado_9'              => $row['estado_9'],
            'bloqueado'             => $row['bloqueado'],
        ]);
    }

    /**
     * Configuraciones adicionales para el archivo CSV.
     *
     * @return array
     */
    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
        ];
    }
}
