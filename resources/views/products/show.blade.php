@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2>Detalles del Producto</h2>

    <div class="card mt-3">
        <div class="card-body">

            <p><strong>ID:</strong> {{ $product->id }}</p>
            <p><strong>Nombre:</strong> {{ $product->name }}</p>
            <p><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Descripción:</strong> {{ $product->description }}</p>

            <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">
                <i class="bi bi-arrow-left"></i> Volver
            </a>

            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning mt-3">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

        </div>
    </div>

</div>
@endsection

