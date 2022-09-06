@extends('product.layout')
@section('head')
<div class="card text-center" style="margin-bottom: 20px">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('products.index') }}" style="color: black"> PRODUCTS </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('trashedProducts') }}"    style="color: black">TRUSH </a>
      </li>
      
    </ul>
  </div>
  <div class="card-body  ">
    <h5 class="card-title">You Can See All The Products It Was Trashed Here</h5>
    <p></p>
  </div>
 

</div>


@endsection
@section('content')

<div class="container" style="width: 70%" >
  @if ($massage = Session::get('sucsess'))

  <div class="alert alert-success" role="alert">
    {{ $massage }}
  </div>
      
  @endif

  @php $i=0; @endphp

    <table class="table"  ">
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
            <tr style="width:100%"  class="container">
              <td>{{ ++$i}} </td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->price }} <span style="color:green">IQD</span> </td>
              <td class=" d-flex p-2 " style="max-width: 90px" >
             
                <a href="{{ route('restoreeProducts',$product->id) }}" style="margin-right: 50px" class="btn btn-success">Restore</a>
                <a href="{{ route('force.delet',$product->id) }}" style="margin-right: 50px" class="btn btn-danger">Delete</a>

                

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
     {!! $products->links('pagination::bootstrap-5')!!}
</div>
@endsection

