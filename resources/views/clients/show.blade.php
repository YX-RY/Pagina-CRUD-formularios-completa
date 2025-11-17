@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalles del Cliente</h2>

    <div class="card mt-3">
        <div class="card-body">

            <p><strong>ID:</strong> {{ $client->id }}</p>
            <p><strong>Nombres:</strong> {{ $client->first_name }}</p>
            <p><strong>Apellidos:</strong> {{ $client->last_name }}</p>
            <p><strong>Email:</strong> {{ $client->email }}</p>
            <p><strong>Teléfono:</strong> {{ $client->phone }}</p>
            <p><strong>Dirección:</strong> {{ $client->address }}</p>

            <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>

            <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <form action="{{ route('clients.destroy', $client) }}"
                  method="POST"
                  class="d-inline"
                  onsubmit="return confirm('¿Estás seguro de eliminar este cliente?')">

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