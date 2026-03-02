@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('pacientes.index') }}">Pacientes</a>
</li>
<li class="breadcrumb-item active">
    Editar Paciente
</li>
@endsection

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <h4 class="mb-4 fw-semibold">
                Editar Paciente
            </h4>

            <form action="{{ route('pacientes.update', $paciente) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- 🔹 DATOS GENERALES --}}
                <h6 class="text-muted mb-3">Datos Generales</h6>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text"
                               name="nombre"
                               class="form-control"
                               value="{{ old('nombre', $paciente->nombre) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">NSS</label>
                        <input type="text"
                               name="nss"
                               class="form-control"
                               value="{{ old('nss', $paciente->nss) }}">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Diagnóstico</label>
                        <input type="text"
                               name="diagnostico"
                               class="form-control"
                               value="{{ old('diagnostico', $paciente->diagnostico) }}">
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
                               value="{{ old('afiliacion', $paciente->afiliacion) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Consultorio</label>
                        <input type="text"
                               name="consultorio"
                               class="form-control"
                               value="{{ old('consultorio', $paciente->consultorio) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Turno</label>
                        <select name="turno" class="form-select">
                            <option value="">Seleccione</option>
                            <option value="Matutino"
                                {{ old('turno', $paciente->turno)=='Matutino'?'selected':'' }}>
                                Matutino
                            </option>
                            <option value="Vespertino"
                                {{ old('turno', $paciente->turno)=='Vespertino'?'selected':'' }}>
                                Vespertino
                            </option>
                        </select>
                    </div>
                </div>

                <hr class="my-4">

                {{-- 🔹 VIGENCIA --}}
                <h6 class="text-muted mb-3">Vigencia</h6>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Fecha Inicio</label>
                        <input type="date"
                               name="fecha_inicio"
                               class="form-control"
                               value="{{ old('fecha_inicio', $paciente->fecha_inicio) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Fecha Fin</label>
                        <input type="date"
                               name="fecha_fin"
                               class="form-control"
                               value="{{ old('fecha_fin', $paciente->fecha_fin) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Estatus</label>
                        <select name="estatus" class="form-select">
                            <option value="Activo"
                                {{ old('estatus', $paciente->estatus)=='Activo'?'selected':'' }}>
                                Activo
                            </option>
                            <option value="Inactivo"
                                {{ old('estatus', $paciente->estatus)=='Inactivo'?'selected':'' }}>
                                Inactivo
                            </option>
                        </select>
                    </div>
                </div>

                {{-- 🔹 BOTONES --}}
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('pacientes.index') }}"
                       class="btn btn-light border">
                        Cancelar
                    </a>

                    <button class="btn btn-primary px-4">
                        Actualizar Paciente
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection