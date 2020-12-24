@extends('layouts.main')

@section('content')
<div class="container my-4">
    <h3>Detail Transaction</h3>
    @foreach($transactions->products as $product)
        <div class="card my-2" style="width: 30rem;">
            <div class="card-body pl-0">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ asset('/storage/' . $product->image)  }}"
                            class="cart-product-image">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-weight-bold">
                            {{ \Illuminate\Support\Str::limit($product->name, 40, $end='...') }}
                        </h5>
                        <h5 class="py-2">Quantity: {{ $product->pivot->quantity }}</h5>
                        <h5 class="py-2">Price: IDR. {{ $product->price * $product->pivot->quantity }}</h5>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
