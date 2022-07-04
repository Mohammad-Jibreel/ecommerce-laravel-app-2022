@extends('admin.index')
@section('content')
@section('title')
Categories
@endsection

  <div class="container">
  <div class="alert alert-danger" id="delete" style="display: none">
    Deleted successfully
  </div>
  <a href="{{route('admin.category.create')}}" class="btn btn-primary">Add Category</a>

    @if  (isset($categories) &&   count($categories)>0)

    <table class="table table-striped table-sm mt-2">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th colspan="2" class="text-justify">action</th>

          </tr>
        </thead>
        @php
            $i=0;
        @endphp
        <tbody>

          @foreach ($categories as $category )
            <div class="row">
 <tr class="offerRow{{$category->id}}">
<td>{{++$i}}</td>

            <td>{{$category->name}}</td>

            <td>



                <a category_id="{{$category->id}}"  class="btn btn-danger delete text-white">delete</a>
                <a href="{{route('admin.category.edit',$category->id)}}"  class="btn btn-success">edit</a>

</td>

          </tr>
          @endforeach
            </div>



        </tbody>
      </table>
      @else
      <div class="alert alert-primary mt-2 text-center ">no data found</div>
      @endif


    <div class="d-flex justify-content-center">

        {{ $categories->links() }}


    </div>
  </div>

  <script src="{{ asset('js/jquery.js') }}"></script>


<script>
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
          var category_id =  $(this).attr('category_id');
        $.ajax({
            type: 'DELETE',
             url: 'category/'+category_id,
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
