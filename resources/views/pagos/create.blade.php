@extends('layouts.vertical', ['title' => 'Registrar Pago'])

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
                    <h3><i class="bi bi-cash-coin"></i> Registrar Pago</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pagos.store') }}" method="POST">
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
                            <label class="form-label fw-bold"><i class="bi bi-cash-stack"></i> Sueldo</label>
                            <input type="number" step="0.01" name="sueldo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-cash-coin"></i> Bonificaciones</label>
                            <input type="number" step="0.01" name="bonificaciones" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-credit-card-2-front-fill"></i> Deducciones</label>
                            <input type="number" step="0.01" name="deducciones" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-calendar-check-fill"></i> Fecha de Pago</label>
                            <input type="date" name="fecha_pago" class="form-control" required>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-check-circle"></i> Registrar
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
