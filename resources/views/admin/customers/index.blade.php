@extends('admin.index')
@section('content')
@section('title')
Customers
@endsection

  <div class="container">
  <div class="alert alert-danger" id="delete" style="display: none">
    Deleted successfully
  </div>
  <a href="{{route('admin.customer.create')}}" class="btn btn-primary">Add Customers</a>

    @if  (isset($users) &&   count($users)>0)

    <table class="table table-striped table-sm mt-2">
        <thead>
          <tr>
            <th>#</th>
            <th>user Name</th>
            <th>email</th>
            <th>status</th>
            <th colspan="2" class="text-justify">action</th>

          </tr>
        </thead>
        @php
            $i=0;
        @endphp
        <tbody>

          @foreach ($users as $user)
            <div class="row">
 <tr class="customer{{$user->id}}">
<td>{{++$i}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
              @if ($user->email_verified_at!=null)
              <td class="badge badge-pill badge-success mt-2 p-2">verified</td>

             @else
             <td class="badge badge-pill badge-danger mt-2 p-2">not verified</td>

              @endif






            <td>



                <a user_id="{{$user->id}}"  class="btn btn-danger delete text-white">delete</a>
                <a href="{{route('admin.customer.edit',$user->id)}}"  class="btn btn-success">edit</a>

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

  <script src="{{ asset('js/jquery.js') }}"></script>

<script>
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
          var user_id =  $(this).attr('user_id');
        $.ajax({
            type: 'DELETE',
             url: 'customer/'+user_id,
            data: {
                '_token': "{{csrf_token()}}",

                'id' :user_id
            },
            success: function (data) {
                if(data.status == true){
                    $('#delete').show();
                }
                $('.customer'+data.id).remove();
            }, error: function (reject) {


            }
        });
    });
</script>
@endsection
