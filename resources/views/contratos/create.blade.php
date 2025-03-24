@extends('layouts.vertical', ['title' => 'Agregar Contrato'])

@section('css')
    @vite(['node_modules/jsvectormap/dist/css/jsvectormap.min.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3><i class="bi bi-file-earmark-text-fill"></i> Agregar Nuevo Contrato</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('contratos.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-person-fill"></i> Empleado</label>
                            <select name="empleado_id" class="form-control" required>
                                @foreach ($empleados as $empleado)
                                    <option value="{{ $empleado->id }}">{{ $empleado->nombre_completo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-file-earmark-ruled-fill"></i> Tipo de Contrato</label>
                            <select name="tipo_contrato" class="form-control" required>
                                <option value="Permanente">Permanente</option>
                                <option value="Temporal">Temporal</option>
                                <option value="Indefinido">Indefinido</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-calendar-event-fill"></i> Fecha de Inicio</label>
                            <input type="date" name="fecha_inicio" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-calendar-check-fill"></i> Fecha de Fin</label>
                            <input type="date" name="fecha_fin" class="form-control">
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-check-circle"></i> Guardar
                            </button>
                            <a href="{{ route('contratos.index') }}" class="btn btn-secondary btn-lg">
                                <i class="bi bi-arrow-left"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
