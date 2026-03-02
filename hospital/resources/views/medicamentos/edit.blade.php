@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('medicamentos.index') }}">Medicamentos</a>
</li>
<li class="breadcrumb-item active">Editar</li>
@endsection

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-body p-4">

        <h4 class="mb-4 fw-semibold">Editar Medicamento</h4>

        <form action="{{ route('medicamentos.update', $medicamento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Clave</label>
                    <input type="text" name="clave"
                           value="{{ $medicamento->clave }}"
                           class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre"
                           value="{{ $medicamento->nombre }}"
                           class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Unidad de Medida</label>
                    <input type="text" name="unidad_medida"
                           value="{{ $medicamento->unidad_medida }}"
                           class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01"
                           name="precio_unitario"
                           value="{{ $medicamento->precio_unitario }}"
                           class="form-control" required>
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>

                <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </div>

        </form>

    </div>
</div>

@endsection