@extends('layouts.vertical', ['title' => 'Editar Pago'])
@section('title', 'Editar Pago')

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
                    <h3><i class="bi bi-pencil-square"></i> Editar Pago</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pagos.update', $pago->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-person-fill"></i> Empleado</label>
                            <input type="text" class="form-control" value="{{ $pago->empleado->nombre_completo }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-cash-stack"></i> Sueldo</label>
                            <input type="number" step="0.01" name="sueldo" class="form-control" value="{{ $pago->sueldo }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-clipboard-minus"></i> Bonificaciones</label>
                            <input type="number" step="0.01" name="bonificaciones" class="form-control" value="{{ $pago->bonificaciones }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-clipboard-plus"></i> Deducciones</label>
                            <input type="number" step="0.01" name="deducciones" class="form-control" value="{{ $pago->deducciones }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-calendar-check-fill"></i> Fecha de Pago</label>
                            <input type="date" name="fecha_pago" class="form-control" value="{{ $pago->fecha_pago }}" required>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-warning btn-lg">
                                <i class="bi bi-pencil-square"></i> Actualizar
                            </button>
                            <a href="{{ route('pagos.index') }}" class="btn btn-secondary btn-lg">
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
