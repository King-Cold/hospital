<div class="sidebar p-3">

    <h4 class="text-white mb-4">
        <i class="fa-solid fa-hospital me-2"></i>
        Medicare
    </h4>

    <ul class="nav flex-column">

        <!-- Pacientes -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('pacientes.*') ? 'active' : '' }}"
               href="{{ route('pacientes.index') }}">
                <i class="fa-solid fa-user-doctor me-2"></i>
                Pacientes
            </a>
        </li>

        <!-- Medicamentos -->
       <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('medicamentos.*') ? 'active' : '' }}"
       href="{{ route('medicamentos.index') }}">
        <i class="fa-solid fa-pills me-2"></i>
        Medicamentos
    </a>
</li>

        <!-- Reportes -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reportes.*') ? 'active' : '' }}"
               href="#">
                <i class="fa-solid fa-chart-line me-2"></i>
                Reportes
            </a>
        </li>

    </ul>

</div>