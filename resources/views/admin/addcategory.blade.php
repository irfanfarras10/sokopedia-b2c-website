@extends('admin.templateadmin')

@section('title','addcategory admin')

@section('content')<div class="container">
    
<h2 class="text-success ">Add Category</h2>
</div>

<form action="{{('/admin/add-category')}}" method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <label for="inputName">Category name</label>
        <input name="categoryname" type="text" class="form-control"  aria-describedby="emailHelp">
    </div>
    <input type="submit" class="btn btn-success mt-3" value="Add Category">
        
        <!-- <a class="btn btn-primary mt-3" href="">Register</a> -->
    
</form>
@if($errors->any())
    {{$errors->first()}}
@endif


@endsection
