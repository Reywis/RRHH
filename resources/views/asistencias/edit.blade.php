@extends('layouts.vertical', ['title' => 'Editar Asistencia'])

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
                <div class="card-header bg-warning text-white text-center">
                    <h3><i class="bi bi-pencil-square"></i> Editar Asistencia</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('asistencias.update', $asistencia->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-person-fill"></i> Empleado</label>
                                <select name="empleado_id" class="form-control" required>
                                    <option value="" disabled>Selecciona un Empleado</option>
                                    @foreach ($empleados as $empleado)
                                        <option value="{{ $empleado->id }}" {{ $empleado->id == $asistencia->empleado_id ? 'selected' : '' }}>
                                            {{ $empleado->nombre_completo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-calendar-event-fill"></i> Fecha</label>
                                <input type="date" name="fecha" class="form-control" value="{{ $asistencia->fecha }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-check-circle"></i> Tipo de Asistencia</label>
                                <select name="tipo" class="form-control" required>
                                    <option value="" disabled>Selecciona el tipo de asistencia</option>
                                    <option value="Presente" {{ $asistencia->tipo == 'Presente' ? 'selected' : '' }}>Presente</option>
                                    <option value="Entrada" {{ $asistencia->tipo == 'Entrada' ? 'selected' : '' }}>Entrada</option>
                                    <option value="Salida" {{ $asistencia->tipo == 'Salida' ? 'selected' : '' }}>Salida</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-pencil-fill"></i> Detalle</label>
                                <input type="text" name="detalle" class="form-control" value="{{ $asistencia->detalle }}" placeholder="Ej: Llegó tarde por tráfico (opcional)">
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-warning btn-lg">
                                <i class="bi bi-pencil-square"></i> Actualizar
                            </button>
                            <a href="{{ route('asistencias.index') }}" class="btn btn-secondary btn-lg">
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
