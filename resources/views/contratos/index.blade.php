@extends('layouts.vertical', ['title' => 'Dashboard'])

@section('css')
    @vite(['node_modules/jsvectormap/dist/css/jsvectormap.min.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('title', 'Lista de Contratos')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-header bg-info text-white text-center">
                <h2>Lista de Contratos</h2>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div class="card-body">
                <a href="{{ route('contratos.create') }}" class="btn btn-primary mb-3">Agregar Contrato</a>

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Empleado</th>
                            <th>Tipo</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contratos as $contrato)
                            <tr>
                                <td>{{ $contrato->id }}</td>
                                <td>{{ $contrato->empleado->nombre_completo }}</td>
                                <td>{{ $contrato->tipo_contrato }}</td>
                                <td>{{ $contrato->fecha_inicio }}</td>
                                <td>{{ $contrato->fecha_fin ?? 'Indefinido' }}</td>
                                <td>
                                    <a href="{{ route('contratos.edit', $contrato->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('contratos.destroy', $contrato->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $contrato->id }})">
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
