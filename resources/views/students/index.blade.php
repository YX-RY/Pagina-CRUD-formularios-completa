@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Estudiantes</h2>
        <a href="{{ route('students.create') }}" class="btn btn-dark">
            <i class="bi bi-plus-circle"></i> Nuevo Estudiante
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
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Carrera</th>
                    <th>Año</th>
                    <th>Foto</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->student_code }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone ?? '-' }}</td>
                    <td>{{ $student->career }}</td>
                    <td>{{ $student->enrollment_year }}</td>
                    <td>
                        <img src="{{ $student->photo_url }}" alt="Foto" width="50" height="50" class="rounded-circle">
                    </td>
                    <td class="text-center">
                        <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-info text-white">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este estudiante?')">
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
                    <td colspan="9" class="text-center">No hay estudiantes registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
