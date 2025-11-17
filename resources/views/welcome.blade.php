@extends('layouts.app')

@section('content')

<div class="contenedor-tarjetas">

    <h2 class="titulo-dashboard">Panel Principal</h2>

    <div class="tarjetas-wrapper">

        {{-- Tarjeta Empleados --}}
        <div class="card-custom">
            <i class="bi bi-person-badge-fill"></i> 
            <h4>Empleados</h4>
            <p>Administrar empleados registrados</p>
            <a href="{{ route('employees.index') }}" class="btn-custom">
                <i class="bi bi-arrow-right-circle"></i> Ir a Empleados
            </a>
        </div>

        {{-- Tarjeta Clientes --}}
        <div class="card-custom">
            <i class="bi bi-people-fill"></i>
            <h4>Clientes</h4>
            <p>Gestionar información de clientes</p>
            <a href="{{ route('clients.index') }}" class="btn-custom">
                <i class="bi bi-arrow-right-circle"></i> Ir a Clientes
            </a>
        </div>

        {{-- Tarjeta Productos --}}
        <div class="card-custom">
            <i class="bi bi-basket-fill"></i>
            <h4>Productos</h4>
            <p>Control de inventario y productos</p>
            <a href="{{ route('products.index') }}" class="btn-custom">
                <i class="bi bi-arrow-right-circle"></i> Ir a Productos
            </a>
        </div>

        {{-- Tarjeta Estudiantes --}}
        <div class="card-custom">
            <i class="bi bi-person-lines-fill"></i>
            <h4>Estudiantes</h4>
            <p>Control académico y personal de estudiantes</p>
            <a href="{{ route('students.index') }}" class="btn-custom">
                <i class="bi bi-arrow-right-circle"></i> Ir a Estudiantes
            </a>
        </div>

    </div>

</div>

@endsection

