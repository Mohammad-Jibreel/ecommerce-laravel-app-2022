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
              <th>date of creation</th>
              <th>current status</th>
            <th>total cost</th>
            <th>Number of items in order</th>
<th>action</th>


            </tr>
          </thead>
          @php
              $i=0;
          @endphp
          <tbody>
             <tr>
            @foreach ($orders as $order)
              <div class="row">
          <tr class="offerRow{{$order->id}}">
          <td>{{$order->id}}</td>
          <td>{{$order->created_at}}</td>
          <td>{{ $order->status }}</td>
          <td>{{$order->total_order_cost}}</td>
          <td>{{ $order->quantity }}</td>


 <td> <a href="{{route('order.show',$order->id)}}" class="btn btn-primary">show details</a></td>




            </tr>
            @endforeach
              </div>



          </tbody>
        </table>
        @else
        <div class="alert alert-primary mt-2 text-center ">no data found</div>
        @endif
        @endsection
