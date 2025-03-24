@extends('layouts.vertical', ['title' => 'Dashboard'])

@section('css')
    @vite(['node_modules/jsvectormap/dist/css/jsvectormap.min.css'])
    <!-- Agrega aquí los enlaces a los archivos CSS de Bootstrap si aún no los has incluido -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('title', 'Lista de Empleados')

@section('content')

    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-header bg-info text-white text-center">
                <h2>Lista de Empleados</h2>
            </div>
            <form action="{{ route('exportar.pagos') }}" method="GET" class="p-4 bg-white shadow-lg rounded-lg w-1/2 mx-auto">
                <h3 class="text-lg font-bold text-gray-700 mb-3">Generar Reporte de Pagos</h3>

                <div class="form-group">
                    <label for="mes" class="block text-sm font-medium text-gray-600">Seleccionar Mes:</label>
                    <select name="mes" id="mes" class="form-control mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400">
                        <option value="">Seleccione un mes</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>

                <button type="submit" class="mt-4 w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300">
                    Descargar Reporte en Excel
                </button>
            </form>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div class="card-body">
                <a href="{{ route('empleados.create') }}" class="btn btn-success mb-3">
                    <i class="bi bi-person-plus"></i> Agregar Empleado
                </a>

                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Puesto</th>
                            <th>Ubicación</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->codigo_puesto }}</td>
                                <td>{{ $empleado->nombre_completo }}</td>
                                <td>{{ $empleado->dni }}</td>
                                <td>{{ $empleado->puesto }}</td>
                                <td>{{ $empleado->ubicacion }}</td>
                                <td>{{ $empleado->telefono ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>
                                    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $empleado->id }})">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
    <!-- Agrega aquí los enlaces a los archivos JS de Bootstrap si aún no los has incluido -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡No podrás revertir esta acción!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminarlo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
