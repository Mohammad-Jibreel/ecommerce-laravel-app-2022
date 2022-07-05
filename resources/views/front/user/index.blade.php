@extends('dashboard')
@section('content')
   <div class="container mt-2">
                <div class="alert alert-success mt-2" id="success_msg" style="display:none">
                    updateing successfully

                  </div>
                  <div class="alert alert-danger mt-2" id="message_erorr" style="display:none">
                    faling add

                  </div>
                  <form id="update_product"  method="POST" action="{{route('user.update',$user->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name"> name</label>
                        <input type="text" class="form-control"  name="name" id="name" value="{{$user->name}}" placeholder="please enter product name">
                        <small id="name_error" class="form-text text-danger"></small>

                      </div>


                      <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control"  name="email" id="email" value="{{$user->email}}" placeholder="please enter price">
                        <small id="email_error" class="form-text text-danger"></small>

                      </div>


                      <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control"  name="password" id="password" value="" placeholder="please enter quantity">
                        <small id="password_error" class="form-text text-danger"></small>

                      </div>

                      <div class="form-group">
                        <label for="password">confirm password</label>
                        <input type="password" class="form-control"  name="password_confirmation" id="password_confirmation" value="">
                        <small id="password_confirmation_error" class="form-text text-danger"></small>

                      </div>












                        <button type="button"   id="update" class="btn btn-primary mt-3">Save changes</button>

                  </form>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

            <script>
                $(document).on('click', '#update', function (e) {
                    e.preventDefault();
                    var formData = new FormData($('#update_product')[0]);
                    $.ajax({
                        type: 'post',
                        url: "{{route('user.update',$user->id)}}",
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


@endsection
