@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <h2 class="text-center mt-3"><strong>All Products</strong></h2>
            <div class="text-left">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    Add Product
                </button>

            </div>
            <section style="padding-top: 60px">
                <div class="container">
                    <div class="row">
                        <table class="table" id="products_table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price Per Unit</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @if ($product->picture)
                                                <img width="100" height="100"
                                                    src="{{ asset('images/products/' . $product->picture) }}"
                                                    alt="">
                                            @endif
                                        </td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price_per_unit }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm sell-product-btn"
                                                data-bs-toggle="modal" data-bs-target="#sellProductModal"
                                                data-product-id="{{ $product->id }}"
                                                data-product-quantity="{{ $product->quantity }}">
                                                Sale Product
                                            </button>
                                        </td>
                                        {{-- <td><a href="{{ route('product.salePage', $product->id) }}"
                                                class="btn btn-sm btn-danger">Sale Item</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('admin.product.modals.add')
    @include('admin.product.modals.addSale')
@endsection
@push('scripts')
    <script src="{{ asset('js/custom/product.js') }}"></script>
@endpush
