@extends('product.layout')

@section('head')
<div class="card text-center" style="margin-bottom: 20px">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link   " aria-current="true" href="{{ route('products.index') }}" style="color: black"> PRODUCTS </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="" style="color: black">TRUSH </a>
      </li>
      
    </ul>
  </div>
  <div class="card-body  ">
    <h5 class="card-title">You Can Add A New Product Here</h5>
    <p></p>
    
  </div>
</div>
@endsection





@section('content')


@section('content')

<div class="container " >
  
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
        
    <div class="container">
        
        <form action="{{route('products.update', $product->id) }}" method="POST" >
          
            @csrf
            @method('PUT')
            
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input name="name" value="{{  $product->name }}" class="form-control" id="exampleFormControlInput1" placeholder="name of product">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                    <input name="price" value="{{  $product->price }}" class="form-control" id="exampleFormControlInput1" placeholder="price of product">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Details</label>
                    <textarea name="details"  class="form-control" id="exampleFormControlTextarea1" rows="3"> {{ $product->details }} </textarea>
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">SAVE</button>
                  </div>
            </div>
        
            </form>
    
    </div>
   
     
@endsection