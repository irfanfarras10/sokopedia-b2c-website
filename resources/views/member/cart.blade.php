@extends('layouts.main')

@section('content')
<div class="container py-2">
    @if(session()->get('carts') == 0)
        <h3 class="text-center py-5">No Data</h3>
    @else
    <form action="{{ url('/cart/checkout') }}" method="post">
        @csrf
        <input type="hidden" name="cart" value="{{ $items->products }}">
        @foreach($items->products as $product)
            <div class="card my-2" style="width: 30rem;">
                <div class="card-body pl-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="{{ asset('/storage/' . $product->image) }}"
                                class="cart-product-image">
                        </div>
                        <div class="col-sm-8">
                            <h5 class="font-weight-bold">
                                {{ \Illuminate\Support\Str::limit($product->name, 40, $end='...') }}
                            </h5>
                            <p class="pb-1">Product Price: IDR. {{ $product->price }}</p>
                            <p><small>Quantity: {{ $product->pivot->quantity }}</small></p>
                            <a href="{{ url('/cart/remove/' . $product->id) }}"
                                class="btn btn-danger mr-1">Delete</a>
                            <button type="button" class="btn btn-success edit" data-id="{{ $product->id }}"
                                data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                                data-quantity="{{ $product->pivot->quantity }}">Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <input type="submit" value="Checkout" class="btn btn-danger">
    </form>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="productId">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" class="form-control" readonly name="name" id="productName">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Price</label>
                            <input type="text" class="form-control" readonly name="price" id="productPrice">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quantity</label>
                            <input type="number" class="form-control" name="quantity" placeholder="Quantity"
                                id="quantity">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Save changes" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
    $(document).ready(function () {
        $('.edit').on("click", function () {
            $('#editModal').modal('show');
            var id = $(this).attr('data-id')
            var name = $(this).attr('data-name');
            var price = $(this).attr('data-price');
            var quantity = $(this).attr('data-quantity');
            $('#productName').val(name);
            $('#productPrice').val(price);
            $('#quantity').val(quantity);
            $('#productId').val(id);
        })
    })

</script>

@endsection
