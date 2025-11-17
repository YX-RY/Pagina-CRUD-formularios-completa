@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalles del Estudiante</h2>
    <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left-circle"></i> Volver al listado
    </a>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                {{-- Columna izquierda: foto --}}
                <div class="col-md-4 text-center mb-3">
                    <img src="{{ $student->photo_url }}" 
                         alt="Foto de {{ $student->full_name }}" 
                         class="rounded-circle border" 
                         width="180" height="180">
                    <h4 class="mt-3">{{ $student->full_name }}</h4>
                    <p class="text-muted mb-0">{{ $student->career }}</p>
                    <small class="text-secondary">Código: {{ $student->student_code }}</small>
                </div>

                {{-- Columna derecha: información --}}
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
