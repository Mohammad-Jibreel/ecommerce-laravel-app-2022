
  <script src="//geodata.solutions/includes/countrystatecity.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
      /* footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
} */
</style>
</head>
<body>
    @extends('layouts.user')
    @section('content')

    @if (auth()->check())
@if (count($products)>0)




    <div class="container">

        <div class="alert alert-success mt-4" style="display: none" id="message_success">
            The order has been sent successfully you can trace the order status from <a href="{{route('dashboard.index')}}">Order</a>
        </div>

        <div class="py-5 text-center">

          <h2 class="text-info text-center">Checkout Page</h2>
        </div>
        <div class="container">
            <div class="progress" style="height: 1px;">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="progress" style="height: 20px;">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
        </div>

        <div class="row mt-4">
          <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Your cart</span>
              <span class="badge badge-secondary badge-pill">
                {{ count($products) }}
              </span>
            </h4>

            <ul class="list-group mb-3" id="dom">
                @foreach ($products as $product)
                <li  class="list-group-item d-flex justify-content-between lh-condensed cartRow">
                    <div>
                       <h6 class="my-0">{{ $product->name }}</h6>
                      <small class="text-muted">{{ $product->description }}</small>
                    </div>
                    <span class="text-muted total_price" >{{$product->price*$product->quantity }}</span>
                  </li>
                @endforeach


              <li class="list-group-item d-flex justify-content-between">
                <span >Total </span>
                <strong class="subtotal" id="total_cart"></strong>
              </li>
            </ul>


          </div>
          <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form id="save_address">
                @csrf
                <input type="text" name="user_id" id="user_id" value="{{ Auth::id() }}"  hidden>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" disabled value="{{ Auth::user()->name }}" class="form-control input-group-sm w-50" id="name" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted" ></small>
                  </div>
                <div class="form-group mt-2">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" disabled value="{{ Auth::user()->email }}" class="form-control input-group-sm w-50" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted" ></small>
                </div>
                <div class="form-group mt-2">
                    <label for="address_line_1">Address line 1</label>
                    <input type="text" name="address_line_1"  class="form-control input-group-sm w-50" id="address_line_1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="address_line_1_error" class="form-text text-muted" ></small>
                    <label for="address_line_2">Address line 2</label>
                    <input type="text" name="address_line_2" class="form-control input-group-sm w-50" id="address_line_2" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="address_line_2_error" class="form-text text-muted" ></small>
                </div>

                <div class="form-group mt-2">

                    <div class="row">
                        <div class="col-sm-4">
                          <h3>Country</h3>
                          <select name="country" class="countries form-control" id="countryId">
                        <option value="">Select Country</option>
                    </select>

                        </div>
                        <div class="col-sm-4">
                          <h3>State</h3>
                          <select name="state" class="states form-control" id="stateId">
                        <option value="">Select State</option>
                    </select>
                        </div>
                        <div class="col-sm-4">
                          <h3>City</h3>
                          <select name="city" class="cities form-control" id="cityId">
                        <option value="">Select City</option>
                    </select>
                        </div>
                      </div>
                </div>
                <div class="form-group mt-2">
                    <label for="postal_code">postal code</label>
                    <input type="text" name="postal_code" class="form-control w-50" id="postal_code" aria-describedby="postal_code" placeholder="Enter postal code">
                    <small id="postal_code_error" class="form-text text-muted" ></small>
                  </div>



            </form>

            <form action="" id="save_payment">
                @csrf
                <h4 class="mb-3 mt-3">Payment</h4>

                <div class="d-block mt-2 p-2">

                  <div class="custom-control custom-radio">
                    <input id="paypal" name="cash"   disabled type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="paypal">PayPal</label>
                    <small class="text-muted">soon</small>

                  </div>
                  <div class="custom-control custom-radio">
                    <input id="cash" name="cash"   type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="cash">Cash on Delivery</label>
                    <small class="text-muted" id="cash_error"></small>

                  </div>
                </div>
            </form>
            <form id="save_order">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::id()}}" id="user_id">

                <input type="hidden" name="status" value="0">
                <input type="hidden" name="quantity" value="{{ count($products) }}" id="quantity">
                <input type="hidden" name="total_order_cost" value="" id="total_order_cost">
            </form>
            <a href="{{ route('cart.index') }}" class="btn btn-primary p-2 m-2">back</a>
            <button id="save" style="display:none" class="btn btn-primary p-2 m-2">Submit</button>

            </div>
          </div>
    </div>

    @else
<div class="alert alert-primary text-center mt-4">
cart empty please put product in cart and try again


</div>




@endif
    @endif


    @endsection

      </div>





    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script>
 $(function() {
        $('#cash').click(function () {
            $('#save').show();

            $(document).on('click', '#save', function (e) {
        e.preventDefault();

        var formData = new FormData($('#save_payment')[0]);
        $.ajax({
            type: 'post',
            url: "{{route('payment.store')}}",

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

        });
    });
</script>



<script>

  function ajaxCall() {
    this.send = function(data, url, method, success, type) {
        type = type||'json';
        var successRes = function(data) {
            success(data);
        }

        var errorRes = function(e) {
            console.log(e);
            windwos.location.href='/login';
        }
        jQuery.ajax({
            url: url,
            type: method,
            data: data,
            success: successRes,
            error: errorRes,
            dataType: type,
            timeout: 60000
        });

    }

}

function locationInfo() {
    var rootUrl = "https://geodata.solutions/api/api.php";
    //now check for set values
    var addParams = '';
    if(jQuery("#gds_appid").length > 0) {
        addParams += '&appid=' + jQuery("#gds_appid").val();
    }
    if(jQuery("#gds_hash").length > 0) {
        addParams += '&hash=' + jQuery("#gds_hash").val();
    }

    var call = new ajaxCall();

    this.confCity = function(id) {
        var url = rootUrl+'?type=confCity&countryId='+ jQuery('#countryId option:selected').attr('countryid') +'&stateId=' + jQuery('#stateId option:selected').attr('stateid') + '&cityId=' + id;
        var method = "post";
        var data = {};
        call.send(data, url, method, function(data) {
        });
    };


    this.getCities = function(id) {
        jQuery(".cities option:gt(0)").remove();
        var stateClasses = jQuery('#cityId').attr('class');

        var cC = stateClasses.split(" ");
        cC.shift();
        var addClasses = '';
        if(cC.length > 0)
        {
            acC = cC.join();
            addClasses = '&addClasses=' + encodeURIComponent(acC);
        }
        var url = rootUrl+'?type=getCities&countryId='+ jQuery('#countryId option:selected').attr('countryid') +'&stateId=' + id + addParams + addClasses;
        var method = "post";
        var data = {};
        jQuery('.cities').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            jQuery('.cities').find("option:eq(0)").html("Select City");
            if(data.tp == 1){
                var listlen = Object.keys(data['result']).length;

                if(listlen > 0)
                {
                    jQuery.each(data['result'], function(key, val) {

                        var option = jQuery('<option />');
                        option.attr('value', val).text(val);
                        jQuery('.cities').append(option);
                    });
                }
                else
                {
                    var usestate = jQuery('#stateId option:selected').val();
                    var option = jQuery('<option />');
                    option.attr('value', usestate).text(usestate);
                    option.attr('selected', 'selected');
                    jQuery('.cities').append(option);
                }

                jQuery(".cities").prop("disabled",false);
            }
            else{
                alert(data.msg);
            }
        });
    };

    this.getStates = function(id) {
        jQuery(".states option:gt(0)").remove();
        jQuery(".cities option:gt(0)").remove();
        //get additional fields
        var stateClasses = jQuery('#stateId').attr('class');

        var cC = stateClasses.split(" ");
        cC.shift();
        var addClasses = '';
        if(cC.length > 0)
        {
            acC = cC.join();
            addClasses = '&addClasses=' + encodeURIComponent(acC);
        }
        var url = rootUrl+'?type=getStates&countryId=' + id + addParams  + addClasses;
        var method = "post";
        var data = {};
        jQuery('.states').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            jQuery('.states').find("option:eq(0)").html("Select State");
            if(data.tp == 1){
                jQuery.each(data['result'], function(key, val) {
                    var option = jQuery('<option />');
                    option.attr('value', val).text(val);
                    option.attr('stateid', key);
                    jQuery('.states').append(option);
                });
                jQuery(".states").prop("disabled",false);
            }
            else{
                alert(data.msg);
            }
        });
    };

    this.getCountries = function() {
        //get additional fields
        var countryClasses = jQuery('#countryId').attr('class');

        var cC = countryClasses.split(" ");
        cC.shift();
        var addClasses = '';
        if(cC.length > 0)
        {
            acC = cC.join();
            addClasses = '&addClasses=' + encodeURIComponent(acC);
        }

        var presel = false;
        var iip = 'N';
        jQuery.each(cC, function( index, value ) {
            if (value.match("^presel-")) {
                presel = value.substring(7);

            }
            if(value.match("^presel-byi"))
            {
                var iip = 'Y';
            }
        });


        var url = rootUrl+'?type=getCountries' + addParams + addClasses;
        var method = "post";
        var data = {};
        jQuery('.countries').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            jQuery('.countries').find("option:eq(0)").html("Select Country");

            if(data.tp == 1){
                if(presel == 'byip')
                {
                    presel = data['presel'];
                    console.log('2 presel is set as ' + presel);
                }


                if(jQuery.inArray("group-continents",cC) > -1)
                {
                    var $select = jQuery('.countries');
                    console.log(data['result']);
                    jQuery.each(data['result'], function(i, optgroups) {
                        var $optgroup = jQuery("<optgroup>", {label: i});
                        if(optgroups.length > 0)
                        {
                            $optgroup.appendTo($select);
                        }

                        jQuery.each(optgroups, function(groupName, options) {
                            var coption = jQuery('<option />');
                            coption.attr('value', options.name).text(options.name);
                            coption.attr('countryid', options.id);
                            if(presel) {
                                if (presel.toUpperCase() == options.id) {
                                    coption.attr('selected', 'selected');
                                }
                            }
                            coption.appendTo($optgroup);
                        });
                    });
                }
                else
                {
                    jQuery.each(data['result'], function(key, val) {
                        var option = jQuery('<option />');
                        option.attr('value', val).text(val);
                        option.attr('countryid', key);
                        if(presel)
                        {
                            if(presel.toUpperCase() ==  key)
                            {
                                option.attr('selected', 'selected');
                            }
                        }
                        jQuery('.countries').append(option);
                    });
                }
                if(presel)
                {
                    jQuery('.countries').trigger('change');
                }
                jQuery(".countries").prop("disabled",false);
            }
            else{
                alert(data.msg);
            }
        });
    };

}

jQuery(function() {
    var loc = new locationInfo();
    loc.getCountries();
    jQuery(".countries").on("change", function(ev) {
        var countryId = jQuery("option:selected", this).attr('countryid');
        if(countryId != ''){
            loc.getStates(countryId);
        }
        else{
            jQuery(".states option:gt(0)").remove();
        }
    });
    jQuery(".states").on("change", function(ev) {
        var stateId = jQuery("option:selected", this).attr('stateid');
        if(stateId != ''){
            loc.getCities(stateId);
        }
        else{
            jQuery(".cities option:gt(0)").remove();
        }
    });

    jQuery(".cities").on("change", function(ev) {
        var cityId = jQuery("option:selected", this).val();
        if(cityId != ''){
            loc.confCity(cityId);
        }
    });
});


</script>

    <script>
    $(document).on('click', '#save', function (e) {
        e.preventDefault();

        var formData = new FormData($('#save_address')[0]);
        $.ajax({
            type: 'post',
            url: "{{route('checkout.store')}}",

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

<script>


var value=0;

$(document).ready(function(){

    var l=document.getElementsByClassName("total_price").length;
    for(var i=0 ; i<l;i++){
    var testTarget = document.getElementsByClassName("total_price")[i].innerHTML; // the first element, as we wanted
    testTarget=parseInt(testTarget);
     value+=testTarget;
    }


$('#total_cart').text(value);
document.getElementById('total_order_cost').value=value;




});


$(document).on('click', '#save', function (e) {
           e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
           var formData = new FormData($('#save_order')[0]);
           $.ajax({
               type: 'post',
               url: "{{route('order.store')}}",

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

</body>
</html>
