@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item active">Pacientes</li>
@endsection

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0 fw-semibold">Lista de Pacientes</h4>

            <a href="{{ route('pacientes.create') }}" 
               class="btn btn-primary px-3">
                Nuevo Paciente
            </a>
        </div>

        <div class="table-responsive">
            <table id="tablaPacientes" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>NSS</th>
                        <th>Afiliación</th>
                        <th>Consultorio</th>
                        <th>Turno</th>
                        <th>Diagnóstico</th>
                        <th>Vigencia</th>
                        <th>Estatus</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $paciente)
                    <tr>
                        <td>{{ $paciente->nombre }}</td>
                        <td>{{ $paciente->nss }}</td>
                        <td>{{ $paciente->afiliacion }}</td>
                        <td>{{ $paciente->consultorio }}</td>
                        <td>{{ $paciente->turno }}</td>
                        <td>{{ $paciente->diagnostico }}</td>
                        <td>
                            {{ $paciente->fecha_inicio }} 
                            <br>
                            <small class="text-muted">
                                hasta {{ $paciente->fecha_fin }}
                            </small>
                        </td>

                        <td>
                            @if($paciente->estatus == 'Activo')
                                <span class="badge bg-success">Activo</span>
                            @elseif($paciente->estatus == 'Vencido')
                                <span class="badge bg-danger">Vencido</span>
                            @else
                                <span class="badge bg-secondary">Inactivo</span>
                            @endif
                        </td>

                      <td class="text-center">
    <div class="d-flex justify-content-center gap-2">

        <!-- Editar -->
        <a href="{{ route('pacientes.edit', $paciente->id) }}" 
           class="btn btn-sm btn-outline-primary rounded-circle shadow-sm"
           data-bs-toggle="tooltip"
           title="Editar">
            <i class="fa-solid fa-pen"></i>
        </a>

        <!-- Eliminar -->
        <form action="{{ route('pacientes.destroy', $paciente->id) }}" 
              method="POST"
              class="form-eliminar">
            @csrf
            @method('DELETE')

            <button type="submit"
                class="btn btn-sm btn-outline-danger rounded-circle shadow-sm"
                data-bs-toggle="tooltip"
                title="Eliminar">
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
document.addEventListener("DOMContentLoaded", function () {

    // 🔹 Inicializar DataTables
    $('#tablaPacientes').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json"
        },
        pageLength: 10,
        responsive: true,
        order: [[0, 'asc']]
    });

    // 🔹 Confirmación SweetAlert
    document.querySelectorAll('.form-eliminar').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Eliminar paciente?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

});
</script>
@endpush