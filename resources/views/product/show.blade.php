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
 
</div>
@endsection


@section('content')
<div class="card container " style="width: 40%" >
    <h5 class="card-header"> Name : {{ $product->name  }}</h5>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text">About it : {{ $product->details }}</p>
      <p style="color: red" class="card-text" > Price: {!! $product->price . ' <span style="color:green">IQD</span>' !!}</p>
      <a href="{{ route('products.index') }}" class="btn btn-primary "  >Go BACK</a>
    </div>
  </div>
@endsection