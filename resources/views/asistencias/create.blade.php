@extends('layouts.vertical', ['title' => 'Registrar Asistencia'])

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
                    <h3><i class="bi bi-check-circle-fill"></i> Registrar Asistencia</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('asistencias.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-person-fill"></i> Empleado</label>
                                <select name="empleado_id" class="form-control" required>
                                    <option value="" disabled selected>Selecciona un Empleado</option>
                                    @foreach ($empleados as $empleado)
                                        <option value="{{ $empleado->id }}">{{ $empleado->nombre_completo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-calendar-event-fill"></i> Fecha</label>
                                <input type="date" name="fecha" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-check-circle"></i> Tipo de Asistencia</label>
                                <select name="tipo" class="form-control" required>
                                    <option value="" disabled selected>Selecciona el tipo de asistencia</option>
                                    <option value="Presente">Presente</option>
                                    <option value="Entrada">Entrada</option>
                                    <option value="Salida">Salida</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-pencil-fill"></i> Detalle</label>
                                <input type="text" name="detalle" class="form-control" placeholder="Ej: Llegó tarde por tráfico (opcional)">
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-check-circle"></i> Guardar
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
