@extends('dashboard')
@section('content')
<div class="container">
    <div class="alert alert-danger" id="delete" style="display: none">
    deleted successfully
    </div>


      @if  (isset($orders) &&   count($orders)>0)

      <table class="table table-striped table-sm mt-2">
          <thead>
            <tr>
              <th>#</th>
              <th>Product Name</th>
              <th>Product Image</th>
              <th>Price</th>
              <th>Qunatity</th>
               <th>Total</th>



            </tr>
          </thead>
          @php
              $i=0;
          @endphp
          <tbody>
           @foreach($orders as $order)
               @foreach($order->products as $product)


              <div class="row">
          <tr class="offerRow{{$product->id}}">
            <td>{{$product->id}}</td>

          <td>{{$product->name}}</td>
          <td><img src="{{$product->image}}" alt="" width="50px" height="50px"></td>
          <td>{{ $product->price }}</td>
          <th>{{ $product->quantity }}</th>

          <td>{{$order->total_order_cost}}</td>

          <th></th>






            </tr>
            @endforeach
            @endforeach
              </div>



          </tbody>
        </table>
        <div class="text-center">
            <a href="{{route('order.index')}}" class="btn btn-primary">Back</a>

        </div>

        @else
        <div class="alert alert-primary mt-2 text-center ">no data found</div>
        @endif

        @endsection
