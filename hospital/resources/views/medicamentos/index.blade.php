@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item active">Medicamentos</li>
@endsection

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0 fw-semibold">Lista de Medicamentos</h4>

            <a href="{{ route('medicamentos.create') }}" 
               class="btn btn-primary px-3">
                Nuevo Medicamento
            </a>
        </div>

        <div class="table-responsive">
            <table id="tablaMedicamentos" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Unidad</th>
                        <th>Precio</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicamentos as $medicamento)
                    <tr>
                        <td>{{ $medicamento->clave }}</td>
                        <td>{{ $medicamento->nombre }}</td>
                        <td>{{ $medicamento->unidad_medida }}</td>
                        <td>${{ number_format($medicamento->precio_unitario, 2) }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">

                                <a href="{{ route('medicamentos.edit', $medicamento->id) }}"
                                   class="btn btn-sm btn-outline-primary rounded-circle shadow-sm">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <form action="{{ route('medicamentos.destroy', $medicamento->id) }}"
                                      method="POST"
                                      class="form-eliminar">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-sm btn-outline-danger rounded-circle shadow-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection


@push('scripts')
<script>
$(document).ready(function () {
    $('#tablaMedicamentos').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json"
        },
        pageLength: 10
    });
});
</script>
@endpush