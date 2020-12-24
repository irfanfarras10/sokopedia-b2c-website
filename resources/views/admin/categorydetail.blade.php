@extends('admin.templateadmin')
@section('title','showcategory - admin')

@section('content')
<div class="admin">
    <h2 class="text-blade">Category</h2>
</div>
 <div class="container">
    @foreach ($product as $a)
    <ul class="list-group">
        
    
        <a href="/categorydetail/{{$a->name}}" class="text-dark text-center">{{$a->name}}</a>
        
    </ul>
    @endforeach
    
    
    
</div> 
<div class="product"">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Product Id</th>
            <th scope="col">Product Image</th>
            <th scope="col">Product Name</th>
           
            <th scope="col">Product Price</th>
            <th scope="col">Product Description</th>
            

          </tr>
        </thead>
        <tbody>
            @foreach ($product as $i)
          <tr>
            
            <th scope="row">{{$i->id}}</th>
            <td>
                <img  style="width: 100px; height: 120px;" src="{{asset('storage/'.$i->image) }}" alt="">
            
            </td>
            
            <td>{{$i->name}}</td>
            
            <td>{{$i->price}}</td>
            <td>{{$i->description}}</td>
            
            

            
            
            
          </tr>
          @endforeach
        </tbody>
      </table>


@endsection