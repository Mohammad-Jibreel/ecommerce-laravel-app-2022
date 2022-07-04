@extends('admin.index')
@section('title')
Create Customer
@stop
@section('content')

<div class="container">
    <div class="alert alert-success mt-2" id="message_success" style="display:none">
        Added Successfully

      </div>

    <form id="save_customer"  method="POST" action="{{route('user.store')}}">
        @csrf

        <div class="form-group">
            <label for="name">user  name</label>
            <input type="text" class="form-control" onfocus="this.value=''" name="name" id="name" placeholder="please enter product name">
            <small id="name_error" class="form-text text-danger"></small>

          </div>


          <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" onfocus="this.value=''" name="email" id="email" placeholder="please enter email address">
            <small id="email_error" class="form-text text-danger"></small>

          </div>


          <div class="form-group">
            <label for="password">password</label>
            <input type="password" class="form-control"  name="password" id="password">
            <small id="password_error" class="form-text text-danger"></small>

          </div>

          <div class="form-group">
            <label for="password">confirm password</label>
            <input type="password" class="form-control"  name="password_confirmation" id="password_confirmation">
            <small id="password_confirmation_error" class="form-text text-danger"></small>

          </div>

          <div class="form-group">
    <label for="email_verified_at">select status</label>
    <select  class="form-control" id="email_verified_at" name="email_verified_at">
      <option  value="verified">verified</option>
      <option  value="not_verified">not verified</option>


    </select>
    <small id="email_verified_at_error" class="form-text text-danger"></small>

  </div>






           <a href="{{route('admin.customer.index')}}" class="btn btn-primary">Back</a>
            <button type="button"   id="save" class="btn btn-primary">Save changes</button>

      </form>
</div>
@endsection
<script src="{{ asset('js/jquery.js') }}"></script>

<script>
    $(document).on('click', '#save', function (e) {
        e.preventDefault();

        var formData = new FormData($('#save_customer')[0]);
        $.ajax({
            type: 'post',
            url: "{{route('admin.customer.store')}}",

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
    $("#"+key+'_error').text(val[0])

});




}
        });
    });


</script>

