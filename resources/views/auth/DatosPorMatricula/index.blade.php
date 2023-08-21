@extends('adminlte::page')
@section('title', 'Lista de datos de matriculas')
@section('content_header')
    <h3>Lista de datos de matriculas</h3>
@stop
@section('content')

    @if (session('info'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '{{ session('info') }}',
                    icon: 'success'
                });
            });
        </script>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> Mostrar la tabla</h5>
                <br>

                <table id="example2" class="table table-bordered table-hover dt-responsive nowrap">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Documento</th>
                            <th>Email</th>
                            <th>Última actualización</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($datosPorMatriculas as $datosPorMatriculas)
                            <tr>
                                <td>{{ $datosPorMatriculas->id }}</td>
                                <td>{{ $datosPorMatriculas->nombre }}</td>
                                <td>{{ $datosPorMatriculas->apellido }}</td>
                                <td>{{ $datosPorMatriculas->documento_de_identidad }}</td>
                                <td>{{ $datosPorMatriculas->email }}</td>

                                <td>{{ $datosPorMatriculas->updated_at->diffForHumans() }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('datos-de-matricula.show', $datosPorMatriculas) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('datos-de-matricula.edit', $datosPorMatriculas) }}"
                                            class="btn btn-success btn-sm mx-2"> <i class="fas fa-edit"></i></a>
                                        <form action="{{ route('datos-de-matricula.destroy', $datosPorMatriculas) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-button">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@stop
@section('plugins.Select2', true)
@section('plugins.Sweetalert2', true)
@section('css')
    {{-- Aquí tu CSS personalizado --}}
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $("#example2").DataTable({
                "responsive": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
        });
    </script>
@stop
