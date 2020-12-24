@extends('layouts.main')

@section('content')
<div class="container my-2 py-4">
    <div class="wrapper px-4">
        <div class="row px-5">
            @foreach($products as $product)
                {{-- Products Cards --}}
                <div class="col-sm-12 col-md-6 col-lg-4 px-4 mb-3">
                    <div class="card box-shadow">
                        <img class="card-img-top"
                            src="{{ asset('/storage/' . $product->image) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title text-primary">
                                {{ \Illuminate\Support\Str::limit($product->name, 10, $end='...') }}
                            </h3>
                            <p class="card-text text-muted">
                                {{ 'IDR.' . $product->price }}
                            </p>
                            <a href="{{ url('/product/'.$product->id) }}" class="btn btn-success text-white">Product Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Pagination --}}
<div class="row justify-content-center">
    {{ $products->withQueryString()->links() }}
</div>
@endsection

