@extends('front.cart.index')
@section('content')
<style>
input[type="color"] {
	-webkit-appearance: none;
	border: none;
	width: 32px;
	height: 32px;
    margin-top: 10px;
}
input[type="color"]::-webkit-color-swatch-wrapper {
	padding: 0;

}
input[type="color"]::-webkit-color-swatch {
	border: none;
}
<meta name="csrf-token" content="{{ csrf_token() }}" />


</style>


<div class="container">
    <div class="alert alert-success mt-4" id="success_msg" style="display:none">
  Added Successfully
    </div>
    <nav aria-label="breadcrumb" class="mt-2 p-2" >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('product.index') }}">products</a></li>
          <li class="breadcrumb-item"><a href="{{ route('product.index') }}">{{ $product->name }}</a></li>

        </ol>
      </nav>

    <div class="card mb-3 mt-5 ml-auto">
        <div class="row g-0">
          <div class="col-md-4">
            {{-- <img class="card-img-top"  src="{{asset('uploads/products/'.$product->image)}}" alt="Card image cap"> --}}
            <img class="card-img-top"  src="{{$product->image}}" alt="Card image cap">


          </div>

          <div class="col-md-8">

            <div class="card-body">
                <form   method="POST"  id="update_cart">

                    @csrf

                    <input type="text" hidden name="product_id" value="{{ $product->id }}" id="product_id">

              <h5 class="card-title p-2 font-weight-bold font-sans">{{ $product->name }}</h5>
              <h3>${{ $product->price }}.00</h3>
              <p class="card-text">{{ $product->description }}</p>
              <span class="badge text-bg-info">Color</span>

              <p class="card-text">
                <input type="color" disabled name=""  class="" value="{{$product->color}}" id="">

              </p>
              <span class="badge text-bg-info">Size</span>

              <p class="card-text">
                  <div class="btn-group btn-group-sm text-center" role="group" aria-label="Basic checkbox toggle button group">




                        @foreach ($product->prodcuts_attributes as $item)
                                                <input type="radio" class="btn-check" name="size"  id="{{$item->id}}" value="{{$item->size }}" autocomplete="off">

                        <label class="btn btn-primary btn-group-sm" for="{{$item->id}}">{{ $item->size }}</label>

                        @endforeach
                      </div>
                      <br>
                      <small id="size_error"></small>

              </p>
              <div class="mt-2">
                <input type="number" name="quantity"  min="1" oninput="this.value = Math.abs(this.value)" id="quantity" style="width:60px;">
              </div>
          <small id="quantity_error"></small>

              <br>
              <button id="update" class="btn btn-dark">ADD TO CART</button>

            </form>

            </div>
          </div>
        </div>

      </div>

</div>



@endsection
<script src="{{ asset('js/jquery.js') }}"></script>


<script>
    $(document).on('click', '#update', function (e) {
        e.preventDefault();
        var formData = new FormData($('#update_cart')[0]);
        $.ajax({
            type: 'post',
             enctype: 'multipart/form-data',
            url: "{{route('cart.store')}}",
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

