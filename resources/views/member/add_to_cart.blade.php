@extends('layouts.main')

@section('content')
<div class="container my-1">
    <div class="row">
        <div class="col-sm-6 py-5 px-5 text-center">
            <img src="{{ asset('/storage/' . $product->image) }}" class="product-image" alt="product-image">
        </div>
        <div class="col-sm-6 py-5 px-5 right-panel">
            <h4 class="font-weight-bold">{{ $product->name }}</h4>
            <hr />
            <span class="h4">Price : </span><span class="h2 text-price font-weight-bold">IDR. {{ $product->price }}</span>
            <hr />
            <h4>Description : {{ $product->description }}</h4>
            <br />
            <form method="post">
                {{csrf_field()}}
                <span>Quantity :</span><input type="number" name="quantity" min="1" id="quantity-box">
                <br />
                <input type="submit" type="button" class="btn btn-success" value="Add To Cart">
            </form>
        </div>
    </div>
</div>
@endsection
