@extends('admin.index')
@section('content')
@section('title')
SubCategories
@endsection

  <div class="container">
  <div class="alert alert-danger" id="delete" style="display: none">
    Deleted successfully
  </div>
  <a href="{{route('admin.subcategeory.create')}}" class="btn btn-primary">Add SubCategory</a>

    @if  (isset($subcategories) &&   count($subcategories)>0)

    <table class="table table-striped table-sm mt-2">
        <thead>
          <tr>
            <th>#</th>
            <th>SubCategory Name</th>
            <th>Category Name</th>

            <th colspan="2" class="text-justify">action</th>

          </tr>
        </thead>
        @php
            $i=0;
        @endphp
        <tbody>

          @foreach ($subcategories as $subcategory )
            <div class="row">
 <tr class="subcategory{{$subcategory->id}}">
<td>{{++$i}}</td>

            <td>{{$subcategory->name}}</td>
            <td>{{$subcategory->category->name}}</td>


            <td>



                <a Subcategory_id="{{$subcategory->id}}"  class="btn btn-danger delete text-white">delete</a>
                <a href="{{route('admin.subcategeory.edit',$subcategory->id)}}"  class="btn btn-success">edit</a>

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

        {{ $subcategories->links() }}


    </div>
  </div>

  <script src="{{ asset('js/jquery.js') }}"></script>
<script>
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
          var Subcategory_id =  $(this).attr('Subcategory_id');
        $.ajax({
            type: 'DELETE',
             url: 'subcategeory/'+Subcategory_id,
            data: {
                '_token': "{{csrf_token()}}",

                'id' :Subcategory_id
            },
            success: function (data) {
                if(data.status == true){
                    $('#delete').show();
                }
                $('.subcategory'+data.id).remove();
            }, error: function (reject) {


            }
        });
    });
</script>
@endsection
