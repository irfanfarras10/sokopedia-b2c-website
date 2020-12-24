@extends('admin.templateadmin')
@section('title','show category - admin')

@section('content')
<div class="admin">
    <h2 class="text-blade">Category</h2>
</div>

<div class="container">
    @foreach ($category as $a)
    <ul class="list-group">
        
    
        <a href="/admin/show-category/{{$a->id}}" class="text-dark text-center">{{$a->name}}</a>
        
    </ul>
    @endforeach
    
    
    
</div>
@if($details->count()!=0)
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
            @foreach ($details as $i)
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
</div>
@endif

@endsection

