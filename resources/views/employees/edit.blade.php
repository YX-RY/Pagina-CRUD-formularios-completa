@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Empleado</h2>

    <div class="card mt-3">
        <div class="card-body">

            <form action="{{ route('employees.update', $employee) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Código de Empleado</label>
                    <input type="text" name="employee_code" class="form-control"
                           value="{{ $employee->employee_code }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nombres</label>
                        <input type="text" name="first_name" class="form-control"
                               value="{{ $employee->first_name }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text" name="last_name" class="form-control"
                               value="{{ $employee->last_name }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ $employee->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ $employee->phone }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <input type="text" name="address" class="form-control"
                           value="{{ $employee->address }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Actual</label><br>

                    @if($employee->photo)
                        <img src="{{ asset('storage/' . $employee->photo) }}"
                             alt="Foto" width="100" class="rounded">
                    @else
                        <p class="text-muted">No tiene foto</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Cambiar Foto</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Actualizar
                </button>

                <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>

            </form>

        </div>
    </div>

</div>
@endsection
