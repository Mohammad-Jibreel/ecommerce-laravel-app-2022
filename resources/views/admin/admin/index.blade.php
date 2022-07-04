@extends('admin.index')
@section('content')
@section('title')
admin
@endsection

  <div class="container">
  <div class="alert alert-danger" id="delete" style="display: none">
  deleted successfully
  </div>
  <a href="{{route('admin.admin.create')}}" class="btn btn-primary">add admin</a>

    @if  (isset($admins) &&   count($admins)>0)

    <table class="table table-striped table-sm mt-2">
        <thead>
          <tr>
            <th>#</th>
            <th> Name</th>
            <th>Email</th>
            <th>Status</th>



            <th colspan="2" class="text-justify">action</th>

          </tr>
        </thead>
        @php
            $i=0;
        @endphp
        <tbody>

          @foreach ($admins as $admin)
            <div class="row">
 <tr class="offerRow{{$admin->id}}">
<td>{{++$i}}</td>
          <td>{{$admin->name}}</td>

            <td>{{$admin->email}}</td>

            @if ($admin->email_verified_at!=null)
            <td class="badge badge-pill badge-success mt-2 p-2">verified</td>

           @else
           <td class="badge badge-pill badge-danger mt-2 p-2">not verified</td>

            @endif






            <td>



                <a user_id="{{$admin->id}}"  class="btn btn-danger delete text-white">delete</a>
                <a href="{{route('admin.admin.edit',$admin->id)}}"  class="btn btn-success">edit</a>

</td>

          </tr>
          @endforeach
            </div>



        </tbody>
      </table>
      @else
      <div class="alert alert-primary mt-2 text-center ">no data found</div>
      @endif

  </div>

            <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
            <script>
                $(document).on('click', '#save', function (e) {

                    var formData = new FormData($('#save_category')[0]);
                    $.ajax({
                        type: 'post',
                        // enctype: 'multipart/form-data',
                        url: "{{route('admin.admin.store')}}",
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
          var admin_id =  $(this).attr('user_id');
        $.ajax({
            type: 'DELETE',
             url: 'admin/'+admin_id,
            data: {
                '_token': "{{csrf_token()}}",

                'id' :admin_id
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
