@extends('admin.index')
@section('title')
Edit Product
@stop
@section('content')

<div class="container">
    <div class="alert alert-success mt-2" id="success_msg" style="display:none">
        Updated successfully

      </div>

      <form id="update_product" enctype="multipart/form-data" method="POST" action="{{route('admin.product.store')}}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">product name</label>
            <input type="text" class="form-control"  name="name" id="name" value="{{$product->name}}" placeholder="please enter product name">
            <small id="name_error" class="form-text text-danger"></small>

          </div>


          <div class="form-group">
            <label for="name">price</label>
            <input type="text" class="form-control"  name="price" id="price" value="{{$product->price}}" placeholder="please enter price">
            <small id="price_error" class="form-text text-danger"></small>

          </div>


          <div class="form-group">
            <label for="name">image</label>
            <input type="file" class="form-control"  name="image" id="image">
            <small id="image_error" class="form-text text-danger"></small>

          </div>

          <div class="form-group">
            <label for="description">description</label>
            <textarea class="form-control" id="description" name="description" rows="2">{{$product->description}}</textarea>
            <small id="description_error" class="form-text text-danger"></small>

          </div>

          <div class="form-group">
    <label for="size">select size</label>
    <select multiple class="form-control" id="size" name="size[]">
      <option  value="0" >S</option>
      <option  value="1">M</option>
      <option  value="2">L</option>
      <option  value="3">XL</option>
      <option  value="4">XXL</option>

    </select>
    <small id="size_error" class="form-text text-danger"></small>

  </div>


<div class="form-group" >
    <label for="quantity">quantity</label>
    <input type="number" class="form-control"  name="quantity" id="quantity" value="{{$product->quantity}}" placeholder="please enter quantity">
    <small id="quantity_error" class="form-text text-danger"></small>

  </div>
  <div class="form-group">

    <label for="color" class="form-label">Color picker</label>
  <input type="color" class="form-control form-control-color" id="color" name="color" value="{{$product->color}}" title="Choose your color">
    </div>

        <div class="form-group">
            <label for="category">select Category</label>
            <select  class="form-control categroy" id="category" name="categroy">
                <option value="" selected>please selec category name</option>
                 @foreach ($categories as $category)
                 <option value="{{$category->id}}">{{$category->name}}</option>

                 @endforeach




            </select>
            <small id="category" class="form-text text-danger"></small>


          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">select SubCategory name</label>
            <select  class="form-control" id="exampleFormControlSelect2" name="category_id">




            </select>
            <small id="category_id_error" class="form-text text-danger"></small>


          </div>




           <a href="{{route('admin.product.index')}}" class="btn btn-primary">Back</a>
            <button type="button"   id="update" class="btn btn-primary">Save changes</button>

      </form>
</div>
@endsection
<script src="{{ asset('js/jquery.js') }}"></script>

<script>
    $(document).on('click', '#update', function (e) {
        e.preventDefault();
        var formData = new FormData($('#update_product')[0]);
        $.ajax({
            type: 'post',
             enctype: 'multipart/form-data',
            url: "{{route('admin.product.update',$product->id)}}",
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

<script>
    $(document).ready(function() {
        $('select[name="categroy"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ URL::to('admin/products') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="category_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="category_id"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

        });

</script>
