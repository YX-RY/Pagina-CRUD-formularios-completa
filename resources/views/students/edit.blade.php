@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Estudiante</h2>
    <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left-circle"></i> Volver al listado
    </a>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Errores encontrados:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario de edición --}}
    <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data" id="studentForm">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4 text-center mb-3">
                <label for="photo" class="form-label">Foto Actual</label>
                <div class="mb-2">
                    <img id="photoPreview" src="{{ $student->photo_url }}" class="rounded-circle border" width="150" height="150" alt="Foto actual">
                </div>
                <input class="form-control" type="file" name="photo" id="photo" accept="image/*" onchange="previewImage(event)">
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="student_code" class="form-label">Código</label>
                        <input type="text" name="student_code" class="form-control" value="{{ old('student_code', $student->student_code) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="career" class="form-label">Carrera</label>
                        <input type="text" name="career" class="form-control" value="{{ old('career', $student->career) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">Nombre</label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $student->first_name) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">Apellido</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $student->last_name) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address', $student->address) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="enrollment_year" class="form-label">Año de ingreso</label>
                        <input type="number" name="enrollment_year" class="form-control" value="{{ old('enrollment_year', $student->enrollment_year) }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3">
                    <i class="bi bi-save"></i> Actualizar Estudiante
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

