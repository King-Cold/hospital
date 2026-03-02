@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('pacientes.index') }}">Pacientes</a>
</li>
<li class="breadcrumb-item active">Crear</li>
@endsection

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <h4 class="mb-4 fw-semibold">Registrar Paciente</h4>

            <form method="POST" action="{{ route('pacientes.store') }}" novalidate>
                @csrf

                {{-- 🔹 DATOS GENERALES --}}
                <h6 class="text-muted mb-3">Datos Generales</h6>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" 
       name="nombre" 
       class="form-control @error('nombre') is-invalid @enderror"
       required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">NSS</label>
                        <input type="text"
                               name="nss"
                               class="form-control"
                               placeholder="Número de seguro social"
                               value="{{ old('nss') }}">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Diagnóstico</label>
                        <input type="text"
                               name="diagnostico"
                               class="form-control"
                               placeholder="Diagnóstico del paciente"
                               value="{{ old('diagnostico') }}">
                    </div>
                </div>

                <hr class="my-4">

                {{-- 🔹 INFORMACIÓN MÉDICA --}}
                <h6 class="text-muted mb-3">Información Médica</h6>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Afiliación</label>
                        <input type="text"
                               name="afiliacion"
                               class="form-control"
                               value="{{ old('afiliacion') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Consultorio</label>
                        <input type="text"
                               name="consultorio"
                               class="form-control"
                               value="{{ old('consultorio') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Turno</label>
                        <select name="turno" class="form-select">
                            <option value="">Seleccione</option>
                            <option value="Matutino" {{ old('turno')=='Matutino'?'selected':'' }}>
                                Matutino
                            </option>
                            <option value="Vespertino" {{ old('turno')=='Vespertino'?'selected':'' }}>
                                Vespertino
                            </option>
                        </select>
                    </div>
                </div>

                <hr class="my-4">

                {{-- 🔹 VIGENCIA --}}
                <h6 class="text-muted mb-3">Vigencia</h6>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Fecha Inicio</label>
                        <input type="date"
                               name="fecha_inicio"
                               class="form-control"
                               value="{{ old('fecha_inicio') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Fecha Fin</label>
                        <input type="date"
                               name="fecha_fin"
                               class="form-control"
                               value="{{ old('fecha_fin') }}">
                    </div>
                </div>

                {{-- 🔹 BOTONES --}}
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('pacientes.index') }}" class="btn btn-light border">
                        Cancelar
                    </a>
                    <button class="btn btn-primary px-4">
                        Guardar Paciente
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection