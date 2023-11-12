@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <h2 class="text-center mt-3"><strong>Sales History</strong></h2>
            <div class="text-left">
            </div>
            <section style="padding-top: 60px">
                <div class="container">
                    <div class="row">
                        <table class="table" id="products_table">
                            <thead>
                                <tr>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->customer_name }}</td>
                                        <td>{{ $sale->product->name }}</td>
                                        <td>{{ $sale->quantity }}</td>
                                        <td>{{ $sale->date }}</td>
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
@endsection
@push('scripts')
    <script src="{{ asset('js/custom/product.js') }}"></script>
@endpush
