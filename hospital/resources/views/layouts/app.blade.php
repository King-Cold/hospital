<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hospital System</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

* {
    font-family: 'Poppins', sans-serif;
}

body {
    overflow-x: hidden;
    background-color: #f4f7fe;
}

/* ================= SIDEBAR ================= */

.sidebar {
    width: 260px;
    min-height: 100vh;
    background: linear-gradient(180deg, #1e3a8a, #2563eb);
    position: fixed;
}

.sidebar .nav-link {
    color: #dbeafe;
    border-radius: 8px;
    margin-bottom: 5px;
    transition: 0.3s ease;
}

.sidebar .nav-link:hover,
.sidebar .nav-link.active {
    background-color: rgba(255,255,255,0.15);
    color: #fff;
}

.sidebar .nav-link i {
    width: 20px;
}

/* ================= MAIN ================= */

.main-content {
    margin-left: 260px;
}

.topbar {
    background-color: #2563eb;
    color: white;
    height: 60px;
    display: flex;
    align-items: center;
    padding-left: 20px;
}

/* ================= CARDS ================= */

.card {
    border-radius: 16px;
    border: none;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

/* ================= BREADCRUMB ================= */

.breadcrumb {
    background: transparent;
}

.breadcrumb-item a {
    text-decoration: none;
    color: #2563eb;
    font-weight: 500;
}

.breadcrumb-item.active {
    color: #6b7280;
    font-weight: 600;
}

/* ================= DATATABLE ================= */

.dataTables_wrapper {
    padding: 1rem 0;
}

/* Encabezado */
table.dataTable thead th {
    background: #f8fafc;
    color: #475569;
    font-weight: 600;
    border-bottom: 1px solid #e2e8f0 !important;
}

/* Quitar borde inferior general */
table.dataTable.no-footer {
    border-bottom: none !important;
}

/* Hover filas */
table.dataTable tbody tr {
    transition: 0.2s ease;
    border-bottom: 1px solid #e2e8f0 !important;
}

table.dataTable tbody tr:hover {
    background-color: #f1f5f9;
}

/* Buscador */
.dataTables_filter input {
    border-radius: 10px;
    border: 1px solid #d1d5db;
    padding: 6px 12px;
}

/* Select registros */
.dataTables_length select {
    border-radius: 8px;
    border: 1px solid #d1d5db;
    padding: 4px 8px;
}

/* Paginación */
.dataTables_paginate .paginate_button {
    border-radius: 8px !important;
    border: none !important;
    padding: 6px 12px !important;
    margin: 0 3px;
    background: #e5e7eb !important;
    color: #374151 !important;
    transition: 0.2s ease;
}

.dataTables_paginate .paginate_button:hover {
    background: #2563eb !important;
    color: white !important;
}

.dataTables_paginate .paginate_button.current {
    background: #2563eb !important;
    color: white !important;
    box-shadow: 0 4px 10px rgba(37,99,235,0.3);
}

/* ================= ICONOS ORDENAMIENTO ================= */

/* Quitar iconos por defecto */
table.dataTable thead .sorting:before,
table.dataTable thead .sorting:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc:after {
    display: none !important;
}

/* Icono neutro */
th.sorting::after {
    content: "\f0dc";
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    margin-left: 8px;
    color: #cbd5e1;
    font-size: 13px;
}

/* Ascendente */
th.sorting_asc::after {
    content: "\f0de";
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    margin-left: 8px;
    color: #2563eb;
}

/* Descendente */
th.sorting_desc::after {
    content: "\f0dd";
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    margin-left: 8px;
    color: #2563eb;
}

</style>
</head>

<body>

@include('partials.sidebar')

<div class="main-content">

    @include('partials.navbar')

    <div class="container-fluid p-4">

        <!-- Breadcrumb -->
        <nav>
            <ol class="breadcrumb">
                @yield('breadcrumb')
            </ol>
        </nav>

        @yield('content')

    </div>
</div>

@if(session('success'))
<script>
Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'success',
    title: "{{ session('success') }}",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true
})
</script>
@endif
@if ($errors->any())
<script>
Swal.fire({
    icon: 'error',
    title: 'Error en el formulario',
    html: `{!! implode('<br>', $errors->all()) !!}`,
    confirmButtonColor: '#2563eb'
});
</script>
@endif
<!-- 🔥 jQuery (OBLIGATORIO para DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- 🔥 DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

@stack('scripts')
</body>
</html>