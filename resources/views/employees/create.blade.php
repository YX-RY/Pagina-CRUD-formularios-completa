@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Registrar Nuevo Empleado</h2>

    <a href="{{ route('employees.index') }}" class="btn btn-secondary mb-3">
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

    {{-- Formulario --}}
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" id="employeeForm">
        @csrf

        <div class="row">
            {{-- FOTO --}}
            <div class="col-md-4 text-center mb-3">
                <label for="photo" class="form-label">Foto</label>
                <div class="mb-2">
                    <img id="photoPreview"
                         src="{{ asset('images/default-avatar.png') }}"
                         class="rounded-circle border"
                         width="150"
                         height="150"
                         alt="Foto Preview">
                </div>

                <input class="form-control"
                       type="file"
                       name="photo"
                       id="photo"
                       accept="image/*"
                       onchange="previewImage(event)">
            </div>

            {{-- CAMPOS --}}
            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="employee_code" class="form-label">Código</label>
                        <input type="text"
                               name="employee_code"
                               class="form-control"
                               value="{{ old('employee_code') }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">Nombre</label>
                        <input type="text"
                               name="first_name"
                               class="form-control"
                               value="{{ old('first_name') }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">Apellido</label>
                        <input type="text"
                               name="last_name"
                               class="form-control"
                               value="{{ old('last_name') }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text"
                               name="phone"
                               class="form-control"
                               value="{{ old('phone') }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text"
                               name="address"
                               class="form-control"
                               value="{{ old('address') }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3">
                    <i class="bi bi-save"></i> Guardar Empleado
                </button>

            </div>
        </div>
    </form>
</div>

{{-- SCRIPT: Previsualizar Imagen --}}
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('photoPreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection

