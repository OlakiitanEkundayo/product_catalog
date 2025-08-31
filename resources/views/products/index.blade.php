@extends('layouts.app')

@section('content')

<main class="container">
    <section>
        <div class="titlebar">
            <h1>Products</h1>
            <a href="{{ route('products.create') }}" class="btn-link">Add Product</a>
        </div>

        @if ($message = Session::get('success'))

        @endif
        <div class="table">
            <div class="table-filter">
                <div>
                    <ul class="table-filter-list">
                        <li>
                            <p class="table-filter-link link-active">All</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="table-search">
                <div>
                    <button class="search-select">
                       Search Product
                    </button>
                    <span class="search-select-arrow">
                        <i class="fas fa-caret-down"></i>
                    </span>
                </div>
                <div class="relative">
                    <input class="search-input" type="text" name="search" placeholder="Search product..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="table-product-head">
                <p>Image</p>
                <p>Name</p>
                <p>Description</p>
                <p>Quantity</p>
                <p>Price</p>
                <p>Actions</p>
            </div>

            <!-- Loop through actual products -->
            @forelse($products as $product)
                <div class="table-product-body">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="50"/>
                    <p>{{ $product->name }}</p>
                    <p>{{ $product->description ?? 'N/A' }}</p>
                    <p>{{ $product->quantity }}</p>
                    <p>${{ number_format($product->price, 2) }}</p>
                    <div>
                        <button class="btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            @empty
                <div class="table-product-body">
                    <p colspan="6">No products found.</p>
                </div>
            @endforelse

            <div class="table-paginate">
                <div class="pagination">
                    <a href="#" disabled>&laquo;</a>
                    <a class="active-page">1</a>
                    <a>2</a>
                    <a>3</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
