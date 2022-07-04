@extends('layouts.user')
@section('content')
<h1 class="text-info font-weight-bold text-center">Cart Page</h1>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="progress" style="height: 1px;">
        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="progress" style="height: 20px;">
        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
</div>
  <div class="container mt-3 p-2 h-100">

    <div class="alert alert-success h-100"  id="success_msg" style="display: none">
        updated successfully

        </div>
    <div class="alert alert-danger h-100"  id="delete" style="display: none">
        deleted successfully
        </div>
        @if (isset($carts) && count($carts->products)>0)



    <table class="table border border-info rounded">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">size</th>
            <th scope="col">price</th>
            <th>total price for each product</th>

            <th scope="col" rowspan="3">Quantity</th>
            <th scope="col" colspan="2">Action</th>

          </tr>
        </thead>
        <tbody>


     @php $total_price=0;
     $i=0;

     @endphp

        @foreach ($carts->products as $cart)

          <tr class="cart">

            <th>{{ ++$i }}</th>
            <th >{{$cart->name }}</th>

             <td>
                       <img class="card-img-top"  src="{{asset('uploads/products/'.$cart->image)}}" alt="Card image cap" width="50px" height="50px">
            </td>


            <td>{{ $cart->pivot->size }}</td>

<td class="price">{{ $cart->price }}</td>




                            <td class="subtotal"></td>

                            <td class="bage badge-info ring-black">

                                <input type="number"   id="quantity_id{{$cart->pivot->id}}" min="1" class="qty" style="width:60px;" value="{{ $cart->pivot->quantity }}">


                            </td>


                    <td>
                        <form  id="update_category">
                            @csrf


                            <a product_id="{{$cart->pivot->id}}"  class="btn btn-danger update text-white">update</a>

                        </form>
                    </td>
                    <td>
                        <form action="">
                            @csrf
                            @method('DELETE')
                            <a product_id="{{$cart->pivot->id}}"  class="btn btn-danger delete text-white">X</a>

                        </form>

                    </td>


          </tr>
          @php $total_price+=$cart->pivot->quantity*$cart->price; @endphp

          @endforeach
        </tbody>


      </table>
      <div class="alert alert-success" id="total" style="display: none">

      </div>


      </div>
      <div class="text-center">
        <a href="{{route('checkout.index')}}" id="update" class="btn btn-primary float-sm-right">Continue to checkout</a>

      </div>

    @else
    <div class="alert alert-primary text-center">
     Cart is empty <a href="{{route('product.index')}}" class="btn btn-primary">Add products now</a>
    </div>
     <a class="btn-primary">

     </a>
     @endif

</div>




<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>



<script>
    $(document).on('click', '.update', function (e) {
        e.preventDefault();
        var product_id =  $(this).attr('product_id');
        var quantity=$('#quantity_id'+product_id).val();
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

        $.ajax({

            type: 'PUT',
            url: "cart/"+product_id,
            data:{
                'id':product_id,
                'quantity':quantity
            },

            success: function (data) {
                if(data.status == true){
                    $('#success_msg').show();
                }
            }, error: function (reject) {

var response = $.parseJSON(reject.responseText);
console.log(response)
$.each(response.errors, function (key, val) {
    $("#"+key+'_error').text(val[0])

});




}
        });
    });
</script>


<script>
    $(document).on('click', '.delete', function (e) {
        console.log('yes');

        e.preventDefault();
          var product_id =  $(this).attr('product_id');

          $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $.ajax({
            type: 'DELETE',
             url: 'cart/'+product_id,
            data: {
                '_token': "{{csrf_token()}}",

                'id' :product_id
            },
            success: function (data) {
                if(data.status == true){
                    $('#delete').show();
                }
                $('.offerRow'+data.id).remove();
            }, error: function (reject) {


            }
        });
    });
</script>








<script>
    $('.qty').change(function() {
  updateQuantity(this);
});


function updateQuantity(qtyInput) {
  var cartRow = $(qtyInput).closest('tr');
  var price = parseFloat($('.price', cartRow).text());
  var quantity = $('.qty', cartRow).val();
  var subtotal = $('.subtotal', cartRow);
  var linePrice = price * quantity;
  $(subtotal).text(linePrice.toFixed(2));
  total_calculate() //call
}

function total_calculate() {
  var total = 0;
  //loop through subtotal
  $(".cart .subtotal").each(function() {
    //chck if not empty
    var value = $(this).text() != "" ? parseFloat($(this).text()) : 0;
    total += value; //add that value
  })
  if(total>0){
    $('#total').show();
    $("#total").text(total.toFixed(2))

  }
  //assign to total span

}


</script>




@endsection
