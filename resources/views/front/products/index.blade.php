@extends('layouts.user')

@section('content')
<style>
    input[type="color"] {
	-webkit-appearance: none;
	border: none;
	width: 32px;
	height: 32px;
    margin-top: 10px;
    text-align: center;
    margin-left:40%;
}
input[type="radio"] {
	-webkit-appearance: none;
	border: none;
	width: 32px;
	height: 32px;
    text-align: center;

}

</style>


  <div class="container">

    <div class="alert alert-success mt-4" style="display:none" id="message_success">
        Added successfully
    </div>
    <nav aria-label="breadcrumb" class="mt-2 p-2" >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('product.index') }}">products</a></li>
        </ol>
      </nav>
<h1 class="text-info p-2 text-center">Product page</h1>

<div class="alert alert-success" id="success_msg" style="display:none">
    add successfully
    </div>
<div class="row">

        <select class="form-select form-select-md w-25 m-2" id="category" aria-label="Default select example">
            <option selected>select category </option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach
          </select>



        <select class="form-select form-select-md w-25 m-2" id="product_id" aria-label="Default select example">
            <option selected>select product </option>
            @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>

            @endforeach
          </select>



    <select class="form-select form-select-md w-25 m-2" id="product_id" aria-label="Default select example">
        <option value="">Select Price Range</option>
        <option value="0-100">0-100</option>
        <option value="100-300">100-300</option>
        <option value="300-500">300-500</option>
        <option value="500-1000">500-1000</option>
    </select>


</div>
<button class="btn btn-success">find</button>
</div>
<div class="container">


    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">

      @foreach ($products as $product)

      <form  method="POST" id="save_product">
        @csrf

        <input type="number" name="product_id" value="{{$product->id}}" hidden id="product_id">

        <div class="col">
          <div class="card">
            <a href="{{route('product.show',$product->id)}}">
                <img class="card-img-top"  src="{{$product->image}}" alt="Card image cap"/>
                {{-- asset('uploads/products/'. --}}
            </a>
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">
                <span class="badge badge-primary">Color</span>
                <input type="color" disabled name="color"  class="" value="{{$product->color}}" id="color">

              </p>
              <span class="badge badge-primary">Size</span>

              <div class="btn-group btn-group-sm text-center" style="margin-left:40%" role="group" aria-label="Basic checkbox toggle button group">



                @foreach ($product->prodcuts_attributes as $item)
                <input type="radio" class="btn-check" name="size"   id="{{$item->id}}" value="{{$item->size }}" autocomplete="off">

                <label class="btn btn-primary btn-group-sm" for="{{$item->id}}">{{ $item->size }}</label>

                @endforeach


              </div>
              <p class="card-text"><small id="size_error{{$product->id}}"></small></p>
              <div class="mt-2" style="margin-left:40%">
                <input type="number" name="quantity"  min="1" oninput="this.value = Math.abs(this.value)"  id="quantity" style="width:60px;">
              </div>
              <p class="card-text"><small id="quantity_error{{$product->id}}"></small></p>

           <a  product_id={{$product->id}} class="btn btn-primary save">ADD TO CART </a>
            </div>
          </div>
        </div>

    </form>
        @endforeach

      </div>
    </div>










@endsection
<script src="{{ asset('js/jquery.js') }}"></script>
{{-- //          var product_id =  $(this).attr('product_id'); --}}

<script>
    $(document).on('click', '.save', function (e) {
        e.preventDefault();
        var product_id =  $(this).attr('product_id');

        var formData = new FormData($('#save_product')[0]);
        $.ajax({
            type: 'post',
            url: "{{route('cart.store')}}",

            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                if (data.status == true) {
                 $('#message_success').show();




                }
            }, error: function (reject) {

var response = $.parseJSON(reject.responseText);
console.log(response)
$.each(response.errors, function (key, val) {
    $("#"+key+'_error'+product_id).text(val[0])

});




}
        });
    });


</script>


