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
                <form action="{{ route('products.index') }}" method="get" accept-charset="UTF-8" role="search">
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
                            <input class="search-input" type="text" name="search" placeholder="Search product..."
                                value="{{ request('search') }}">
                        </div>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="img-product" />
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description ?? 'N/A' }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>
                                    <button class="btn btn-success">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


                <div class="table-paginate">
                {{ $products->links('layouts.pagination') }}

                </div>

            </div>
        </section>
    </main>
@endsection
