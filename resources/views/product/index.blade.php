@extends('product.layout')
@section('head')
<div class="card text-center" style="margin-bottom: 20px">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link  active " aria-current="true" href="{{ route('products.index') }}" style="color: black"> PRODUCTS </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('trashedProducts') }}" style="color: black">TRUSH </a>
      </li>
      
    </ul>
  </div>
  <div class="card-body  ">
    <h5 class="card-title">You Can See All The Products Here</h5>
    <p></p>
  </div>

  <a href="{{ route('products.create') }}" class=" btn btn-primary container"  style="float: right ; max-width:6cm ; disply:flex  " >Add Product</a>

</div>


@endsection
@section('content')

<div class="container" style="justify-content: right" >
  @if ($massage = Session::get('sucsess'))

  <div class="alert alert-success" role="alert">
    {{ $massage }}
  </div>
      
  @endif

  @php
    $i = 0;
  @endphp

    <div class="container">
      <table class="table">
        <thead class="table-dark " >
          <tr  >
            <td>Id</td>
            <td>Name</td>
            <td>Price</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
           @foreach ($products as $product )
            <tr  >
              <td>{{ ++$i}} </td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->price }} <span style="color:green">IQD</span> </td>
              <td class=" d-flex p-2" >
             
                <a href="{{ route('products.edit',$product->id) }}" style="margin-right: 50px" class="btn btn-success">Edit</a>
                <a href="{{ route('products.show',$product->id) }}" style="margin-right: 50px" class="btn btn-primary">Show</a>
                <a href="{{ route('trash',$product->id) }}" style="margin-right: 50px" class="btn btn-warning">Trash</a>
                <form  action="{{ route('products.destroy',$product->id) }}" method="post">
                  @method('DELETE')
                  @csrf
                    <button type="submit"  class=" btn btn-danger" >DELET</button>
                </form>

                {{-- <form  action="{{ route('products.softDelete',$product->id) }}" method="post">
                  @method('DELETE')
                  @csrf
                    <button type="submit"  class=" btn btn-danger" > SOFT DELET</button>
                </form> --}}
              
           
           </td>
             
            </tr>
            
          @endforeach 
        </tbody>
      </table>
    </div>
     {!! $products->links('pagination::bootstrap-5')!!}
</div>
@endsection

