@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2>Detalles del Empleado</h2>

    <div class="card mt-3">
        <div class="card-body">

            <p><strong>ID:</strong> {{ $employee->id }}</p>
            <p><strong>Código:</strong> {{ $employee->employee_code }}</p>
            <p><strong>Nombre:</strong> {{ $employee->first_name }} {{ $employee->last_name }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Teléfono:</strong> {{ $employee->phone ?? '-' }}</p>
            <p><strong>Dirección:</strong> {{ $employee->address ?? '-' }}</p>

            <p><strong>Foto:</strong></p>
            @if($employee->photo)
                <img src="{{ asset('storage/' . $employee->photo) }}"
                     alt="Foto"
                     class="rounded"
                     width="150">
            @else
                <p class="text-muted">Sin foto</p>
            @endif

            <hr>

            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>

            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <form action="{{ route('employees.destroy', $employee) }}" 
                  method="POST"
                  class="d-inline"
                  onsubmit="return confirm('¿Seguro que deseas eliminar este empleado?')">

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash"></i> Eliminar
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
