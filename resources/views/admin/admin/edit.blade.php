@extends('admin.index')
@section('title')
Edit Admin
@stop
@section('content')

<div class="container">
    <div class="alert alert-success mt-2" id="success_msg" style="display:none">
        updateing successfully

      </div>

      <form id="update_product" enctype="multipart/form-data" method="POST" action="{{route('admin.product.store')}}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name"> name</label>
            <input type="text" class="form-control"  name="name" id="name" value="{{$admin->name}}" placeholder="please enter product name">
            <small id="name_error" class="form-text text-danger"></small>

          </div>


          <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control"  name="email" id="email" value="{{$admin->email}}" placeholder="please enter price">
            <small id="email_error" class="form-text text-danger"></small>

          </div>


          <div class="form-group">
            <label for="password">password</label>
            <input type="password" class="form-control"  name="password" id="password"  placeholder="please enter a password">
            <small id="password_error" class="form-text text-danger"></small>

          </div>

          <div class="form-group">
            <label for="password">confirm password</label>
            <input type="password" class="form-control"  name="password_confirmation" id="password_confirmation">
            <small id="password_confirmation_error" class="form-text text-danger"></small>

          </div>
          <div class="form-group">
    <label for="status">select status</label>
    <select  class="form-control" id="status" name="email_verified_at">
        <option  value="verified">verified</option>
        <option  value="not_verified">not verified</option>

    </select>
    <small id="email_verified_error" class="form-text text-danger"></small>

  </div>











           <a href="{{route('admin.admin.index')}}" class="btn btn-primary">Back</a>
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
            url: "{{route('admin.admin.update',$admin->id)}}",
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

