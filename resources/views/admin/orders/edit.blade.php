@extends('admin.index')
@section('title')
Edit Order
@stop
@section('content')

<div class="container">
    <div class="alert alert-success mt-2" id="success_msg" style="display:none">
        Updated successfully

      </div>

      <form id="update_order"  method="POST" action="{{route('admin.order.store')}}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">user name</label>
            <input type="text"  disabled class="form-control"  name="name" id="name" value="{{$order->user->name}}" placeholder="please enter product name">
            <small id="name_error" class="form-text text-danger"></small>

          </div>


          <div class="form-group">
            <label for="name">Order creation date</label>
            <input type="text" disabled class="form-control"  name="price" id="price" value="{{$order->created_at}}" placeholder="please enter price">
            <small id="price_error" class="form-text text-danger"></small>

          </div>


          <div class="form-group">
            <label for="name">Number of items in order</label>
            <input type="text" disabled class="form-control"  name="quantity" id="quantity" value="{{$order->quantity}}" placeholder="please enter price">
            <small id="image_error" class="form-text text-danger"></small>

          </div>

          <div class="form-group">
            <label for="price">price</label>
            <input type="text" disabled class="form-control"  name="quantity" id="quantity" value="{{$order->price}}" placeholder="please enter price">
            <small id="description_error" class="form-text text-danger"></small>

          </div>

          <div class="form-group">
            <label for="description">Total order cost</label>
            <input type="text" disabled class="form-control"  name="quantity" id="quantity" value="{{$order->total_order_cost}}" placeholder="please enter price">
            <small id="description_error" class="form-text text-danger"></small>

          </div>


          <div class="form-group">
    <label for="status">Order status</label>
    <select  class="form-control" id="status" name="status">
     <option  value="0">Processing</option>
     <option  value="1">Shipped</option>
     <option  value="2">Delivered</option>
     <option  value="3">Complete</option>
     <option  value="4">Canceled</option>




    </select>
    <small id="status_error" class="form-text text-danger"></small>

  </div>






           <a href="{{route('admin.order.index')}}" class="btn btn-primary">Back</a>
            <button type="button"   id="update" class="btn btn-primary">Update</button>

      </form>
</div>
@endsection
<script src="{{ asset('js/jquery.js') }}"></script>

<script>
    $(document).on('click', '#update', function (e) {
        e.preventDefault();
        var formData = new FormData($('#update_order')[0]);
        $.ajax({
            type: 'post',
            url: "{{route('admin.order.update',$order->id)}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                if(data.status == true){
                    $('#success_msg').show();
                }
            },error: function (reject) {

var response = $.parseJSON(reject.responseText);
console.log(response)
$.each(response.errors, function (key, val) {
    $("#"+key+'_error').text(val[0])

});




}
        });
    });
</script>

