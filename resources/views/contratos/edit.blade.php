@extends('layouts.vertical', ['title' => 'Editar Contrato'])

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
                    <h3><i class="bi bi-pencil-square"></i> Editar Contrato</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('contratos.update', $contrato->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-person-fill"></i> Empleado</label>
                                <input type="text" class="form-control" value="{{ $contrato->empleado->nombre_completo }}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-file-earmark-text-fill"></i> Tipo de Contrato</label>
                                <select name="tipo_contrato" class="form-control" required>
                                    <option value="Permanente" {{ $contrato->tipo_contrato == 'Permanente' ? 'selected' : '' }}>Permanente</option>
                                    <option value="Temporal" {{ $contrato->tipo_contrato == 'Temporal' ? 'selected' : '' }}>Temporal</option>
                                    <option value="Indefinido" {{ $contrato->tipo_contrato == 'Indefinido' ? 'selected' : '' }}>Indefinido</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-calendar-event-fill"></i> Fecha de Inicio</label>
                                <input type="date" name="fecha_inicio" class="form-control" value="{{ $contrato->fecha_inicio }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-calendar-x-fill"></i> Fecha de Fin</label>
                                <input type="date" name="fecha_fin" class="form-control" value="{{ $contrato->fecha_fin }}">
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-pencil-square"></i> Actualizar
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
