@extends('admin.index')
@section('title')
Edit SubCategory
@stop
@section('content')

<div class="container">
    <div class="alert alert-success mt-2" id="success_msg" style="display:none">
        updateing successfully

      </div>

    <form id="update_category" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="name">category name</label>
          <input type="text" class="form-control"  value="{{$subcategories->name}}" name="name" id="name" placeholder="please enter category name">
          <small id="name_error" class="form-text text-danger"></small>

        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">select category name</label>
            <select  class="form-control" id="exampleFormControlSelect2" name="category_id">

                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                <small id="category_id_error" class="form-text text-danger"></small>


                @endforeach


            </select>
          </div>
           <a href="{{route('admin.subcategeory.index')}}" class="btn btn-primary">Back</a>
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
            url: "{{route('admin.subcategeory.update',$subcategories->id)}}",
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
