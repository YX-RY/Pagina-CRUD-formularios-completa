@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Empleados</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-dark">
            <i class="bi bi-plus-circle"></i> Nuevo Empleado
        </a>
    </div>
    <a href="{{ route('welcome') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Regresar
    </a>
    <br>
    <br>
    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre Completo</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Foto</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->employee_code }}</td>
                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone ?? '-' }}</td>
                    <td>{{ $employee->address ?? '-' }}</td>

                    <td>
                        @if($employee->photo)
                            <img src="{{ asset('storage/' . $employee->photo) }}" 
                                 alt="Foto" class="rounded-circle" width="50" height="50">
                        @else
                            <span class="text-muted">Sin foto</span>
                        @endif
                    </td>

                    <td class="text-center">

                        <a href="{{ route('employees.show', $employee) }}" 
                           class="btn btn-sm btn-info text-white">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('employees.edit', $employee) }}" 
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('employees.destroy', $employee) }}" 
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('¿Seguro que deseas eliminar este empleado?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No hay empleados registrados.</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection
