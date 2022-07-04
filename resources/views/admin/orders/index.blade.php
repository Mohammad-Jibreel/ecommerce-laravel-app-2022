@extends('admin.index')
@section('content')
@section('title')
Orders
@endsection

  <div class="container">
  <div class="alert alert-danger" id="delete" style="display: none">
    Deleted successfully
  </div>

    @if  (isset($orders) &&   count($orders)>0)

    <table class="table table-striped table-sm mt-2">
        <thead>
          <tr>
            <th>#</th>
            <th>Customer Name</th>
            <th>Order creation date.</th>
            <th>Number of items in order</th>
            <th>Total order cost</th>
            <th>Order status</th>


            <th colspan="2" class="text-justify">action</th>

          </tr>
        </thead>
        @php
            $i=0;
        @endphp
        <tbody>

          @foreach ($orders as $order)
            <div class="row">
        <tr class="offerRow{{$order->id}}">
        <td>{{++$i}}</td>
        <td>{{$order->user->name}}</td>
        <td>{{$order->created_at}}</td>
        <td>{{ $order->quantity }}</td>
        <td>{{$order->total_order_cost}}</td>
        <td>{{ $order->status }}</td>





            <td>



                <a category_id="{{$order->id}}"  class="btn btn-danger delete text-white">delete</a>
                <a href="{{route('admin.order.edit',$order->id)}}"  class="btn btn-success">edit</a>

</td>

          </tr>
          @endforeach
            </div>



        </tbody>
      </table>
      @else
      <div class="alert alert-primary mt-2 text-center ">no data found</div>
      @endif

{{--
    <div class="d-flex justify-content-center">

        {{ $orders->links() }}


    </div> --}}
  </div>

            <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
            <script>
                $(document).on('click', '#save', function (e) {
                    // e.preventDefault();
                    // $('#photo_error').text('');
                    // $('#name_ar_error').text('');
                    // $('#name_en_error').text('');
                    // $('#price_error').text('');
                    // $('#details_ar_error').text('');
                    // $('#details_en_error').text('');
                    var formData = new FormData($('#save_category')[0]);
                    $.ajax({
                        type: 'post',
                        // enctype: 'multipart/form-data',
                        url: "{{route('admin.order.store')}}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function (data) {
                            if (data.status == true) {
                             $('#message_success').show();




                            }
                        }, error: function (data) {
                            if(data.status==false){
                                $('#message_erorr').show();

                            }

                        }
                    });
                });
            </script>

<script>
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
          var category_id =  $(this).attr('category_id');
        $.ajax({
            type: 'DELETE',
             url: 'order/'+category_id,
            data: {
                '_token': "{{csrf_token()}}",

                'id' :category_id
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
@endsection
