@extends('admin.templateadmin')

@section('title','add product - admin')

@section('content')
<div class="container">
    <h2 class="text-success ">Add Product</h2>
</div>




<form action="{{('/admin/add-product')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
      <label for="inputName">Product Name</label>
      <input name="productname" type="text" class="form-control" id="productnameTxt" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="">Category</label><br>
        <select name="categoryid"  class="form-control-select" id="categoryTxt" required>
            <option class="select-option" value="" disabled selected>Select Category</option>
            @foreach ($category as $i)
                <option class="select-option" value="{{$i->id}}">{{$i->name}}</option>
            @endforeach
        </select>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <input name="description" type="text" class="form-control" id="descriptionTxt">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Price</label>
        <input name="price" type="text" class="form-control" id="priceTxt">
    </div>
    <div class="input-group mb-3">
        {{-- <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div> --}}
        <label for="">Upload gambar</label>
        <input name="gambar" type="file" class="form-control-file" name="">
        <small>Upload file</small>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@if($errors->any())
  {{$errors->first()}}
@endif

@endsection