@extends('admin.index')
@section('title')
Edit Category
@stop
@section('content')

<div class="container">
    <div class="alert alert-success mt-2" id="success_msg" style="display:none">
        Updated successfully

      </div>

    <form id="update_category" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="name">category name</label>
          <input type="text" class="form-control"  value="{{$Category->name}}" name="name" id="name" placeholder="please enter category name">
          <small id="name_error" class="form-text text-danger"></small>

        </div>
           <a href="{{route('admin.category.index')}}" class="btn btn-primary">Back</a>
            <button type="button"   id="update" class="btn btn-primary">Update</button>

      </form>
</div>
@endsection
<script src="{{ asset('js/jquery.js') }}"></script>
<script>
    $(document).on('click', '#update', function (e) {
        e.preventDefault();
        var formData = new FormData($('#update_category')[0]);
        $.ajax({
            type: 'post',
            url: "{{route('admin.category.update',$Category->id)}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                if(data.status == true){
                    $('#success_msg').show();
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
