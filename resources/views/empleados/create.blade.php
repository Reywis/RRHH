@extends('layouts.vertical', ['title' => 'Agregar Empleado'])

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
                    <h3><i class="bi bi-person-plus-fill"></i> Agregar Nuevo Empleado</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('empleados.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-key-fill"></i> Clave Empleado</label>
                                <input type="text" name="clave_empleado" class="form-control" placeholder="Ej: EMP001" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-person-fill"></i> Nombre Completo</label>
                                <input type="text" name="nombre_completo" class="form-control" placeholder="Nombre y Apellido" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-geo-alt-fill"></i> Ubicación</label>
                                <input type="text" name="ubicacion" class="form-control" placeholder="Ej: Oficina Central" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-person-badge-fill"></i> Código</label>
                                <input type="text" name="codigo_puesto" class="form-control" placeholder="Ej: A001" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-briefcase-fill"></i> Puesto</label>
                                <input type="text" name="puesto" class="form-control" placeholder="Ej: Analista" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-calendar-event-fill"></i> Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-credit-card-2-front-fill"></i> DNI</label>
                                <input type="text" name="dni" class="form-control" placeholder="Ej: 123456789" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-calendar-check-fill"></i> Fecha de Inicio</label>
                                <input type="date" name="fecha_inicio" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-phone-fill"></i> Número de Celular</label>
                                <input type="text" name="telefono" class="form-control" placeholder="Ej: 987654321">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-envelope-fill"></i> Correo Electrónico</label>
                                <input type="email" name="correo" class="form-control" placeholder="Ej: correo@example.com">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-mortarboard-fill"></i> Nivel Educativo</label>
                                <input type="text" name="nivel_educativo" class="form-control" placeholder="Ej: Universitario">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-tools"></i> Profesión</label>
                                <input type="text" name="profesion" class="form-control" placeholder="Ej: Ingeniero">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-house-door-fill"></i> Dirección</label>
                                <textarea name="direccion" class="form-control" placeholder="Ej: Calle 123, Ciudad"></textarea>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-check-circle"></i> Guardar
                            </button>
                            <a href="{{ route('empleados.index') }}" class="btn btn-secondary btn-lg">
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
