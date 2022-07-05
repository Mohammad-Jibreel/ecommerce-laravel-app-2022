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
            <th style="width:1px; white-space:nowrap;" >description</th>
          <th>price</th>
            <th>image</th>
            <th colspan="3">size</th>
            <th>quantity</th>
            <th>color</th>
<th>Category Name</th>

            <th colspan="2">action</th>

          </tr>
        </thead>
        @php
            $i=0;
        @endphp
        <tbody>

          @foreach ($products as $product)
 <tr class="product{{$product->id}}">
        <td>{{++$i}}</td>

        <td>{{$product->name}}</td>

        <td>{{$product->description}}</td>

    <td>{{$product->price}}</td>

    <td>
        {{-- <img src="{{asset('uploads/products/'.$product->image)}}" width="50px" height="50px" alt=""> --}}
                <img src="{{$product->image}}" width="50px" height="50px" alt="">

        </td>




    @foreach ($product->prodcuts_attributes as $item)

    <td style="width:1px; white-space:nowrap;">[{{ $item->size  }}]</td>




    @endforeach

        <td>{{$product->quantity}}</td>


    <td><input type="color" name="" id="" value="{{ $product->color }}" disabled></td>


    <td>{{ isset($product->SubCategory) ?   $product->SubCategory->name : '' }} </td>



    <td style="width:1px; white-space:nowrap;">



        <a category_id="{{$product->id}}"  class="btn btn-danger delete text-white">delete</a>
        <a href="{{route('admin.product.edit',$product->id)}}"  class="btn btn-success">edit</a>

</td>



          </tr>
          @endforeach



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
