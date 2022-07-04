@extends('admin.index')
@section('content')
@section('title')
<style>
    img:hover{
        width:500px;
        height:500px;

    }
</style>
Products
@endsection

  <div class="container">
  <div class="alert alert-danger" id="delete" style="display: none">
    Deleted successfully
  </div>
  <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add Product</a>

    @if  (isset($products) &&   count($products)>0)

    <table class="table table-striped table-sm mt-2">
        <thead>
          <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>description</th>
          <th>price</th>
            <th>image</th>
            <th colspan="" >size</th>
            <th>quantity</th>
            <th>color</th>
<th>Category Name</th>

            <th colspan="2" class="text-justify">action</th>

          </tr>
        </thead>
        @php
            $i=0;
        @endphp
        <tbody>

          @foreach ($products as $product)
            <div class="row">
 <tr class="product{{$product->id}}">
    <div class="col">
        <td>{{++$i}}</td>

    </div>
    <div class="col">
        <td>{{$product->name}}</td>

    </div>
    <div class="col">
        <td>{{$product->description}}</td>

    </div>
<div class="col">
    <td>{{$product->price}}</td>

</div>
<div class="col">
    <td>
        <img src="{{asset('uploads/products/'.$product->image)}}" width="50px" height="50px" alt="">
        </td>

</div>

<div class="col">

    @foreach ($product->prodcuts_attributes as $item)

    <td>[{{ $item->size  }}]</td>




    @endforeach
</div>
       <div class="col">
        <td>{{$product->quantity}}</td>

       </div>

<div class="col">
    <td><input type="color" name="" id="" value="{{ $product->color }}" disabled></td>

</div>

<div class="col">
    <td>{{ isset($product->SubCategory) ?   $product->SubCategory->name : '' }} </td>

</div>


<div class="col">
    <td>



        <a category_id="{{$product->id}}"  class="btn btn-danger delete text-white">delete</a>
        <a href="{{route('admin.product.edit',$product->id)}}"  class="btn btn-success">edit</a>

</td>
</div>



          </tr>
          @endforeach
            </div>



        </tbody>
      </table>
      @else
      <div class="alert alert-primary mt-2 text-center ">no data found</div>
      @endif


  </div>

  <script src="{{ asset('js/jquery.js') }}"></script>


<script>
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
          var category_id =  $(this).attr('category_id');
        $.ajax({
            type: 'DELETE',
             url: 'product/'+category_id,
            data: {
                '_token': "{{csrf_token()}}",

                'id' :category_id
            },
            success: function (data) {
                if(data.status == true){
                    $('#delete').show();
                }
                $('.product'+data.id).remove();
            }, error: function (reject) {


            }
        });
    });
</script>
@endsection
