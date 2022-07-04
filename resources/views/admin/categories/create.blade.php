@extends('admin.index')
@section('title')
Create Category
@stop
@section('content')

<div class="container">
    <div class="alert alert-success mt-2" id="message_success" style="display:none">
        Added successfully

      </div>

    <form id="save_category">
        @csrf

        <div class="form-group">
          <label for="name">category name</label>
          <input type="text" class="form-control" onfocus="this.value=''" name="name" id="name" placeholder="please enter category name">
          <small id="name_error" class="form-text text-danger"></small>

        </div>
           <a href="{{route('admin.category.index')}}" class="btn btn-primary">Back</a>
            <button type="button"   id="save" class="btn btn-primary">Save changes</button>

      </form>
</div>
@endsection
<script src="{{ asset('js/jquery.js') }}"></script>

<script>
    $(document).on('click', '#save', function (e) {
        e.preventDefault();

        var formData = new FormData($('#save_category')[0]);
        $.ajax({
            type: 'post',
            url: "{{route('admin.category.store')}}",
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

