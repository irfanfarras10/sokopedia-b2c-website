@extends('admin.templateadmin')
@section('title','show product - admin')

@section('content')

    <div class="admin">
        <h2 class="text-blade">Product</h2>
    </div>

    <div class="product"">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Product Id</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Category</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Description</th>
                <th scope="col">Product Action</th>
    
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $i)
              <tr>
                
                <th scope="row">{{$i->id}}</th>
                <td>
                    <img  style="width: 100px; height: 120px;" src="{{asset('storage/'.$i->image) }}" alt="">
                
                </td>
                
                <td>{{$i->name}}</td>
                <td>{{$i->category->name}}</td>
                <td>{{$i->price}}</td>
                <td>{{$i->description}}</td>
                
                <td>
                  <form action="{{url('/admin/delete')}}" method="POST">
                      {{csrf_field()}}
                      <input type="hidden" name="id" value="{{$i->id}}">
                      <input type="submit" value="delete">
                  </form>
                </td>

                
                
                
              </tr>
              @endforeach
            </tbody>
          </table>
    
    </div>

    
@endsection