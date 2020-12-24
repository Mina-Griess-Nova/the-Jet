@extends('backend.layouts.app')
@push('style')
<style>
    .Availability{
        background-color: #1B5A90 !important;
        color:#fff !important
    }
    #currency{
        width: 30% !important
    }

    th{
        text-align: left !important
    }
    th,td{
        width:10%;
    }
   .col .custom-radio input{
        border: none !important
    }
    .filter-option{
        background-color: #fff;
    }
    .create_coupon{
        display: none
    }
    .custom-control{
        z-index: unset !important;
    }
    #status a{
        color: #1B5A90
    }
</style>
@endpush


@section('content')
 <!-- Page Wrapper -->
 <div class="page-wrapper">



    <div class="content container-fluid">
        <button id="create_coupon" type="button" class="btn btn-primary " >Create Coupon </button>
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of Discount</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Discount</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row" >
            <div class="col-md-12 d-flex">

                <!-- Recent Orders -->
                <div class="card card-table flex-fill">
                    {{-- @include('backend.partials.errors')
                    <div id="login_error" class="alert alert-danger"  style="display:none">

                    </div> --}}
                    <div class="card-header" style="margin: 0;padding:0">
                        <table class="table table-hover table-center mb-0 w-100">
                            <thead style="background-color: #91a4b6;color:#fff" class="w-100">
                                <tr>
                                    <th > Name</th>
                                    <th > Coupon code</th>
                                    <th> Discount</th>
                                    <th >Time of life</th>
                                    <th >Availability</th>
                                    <th >Number of users</th>
                                    <th >Applies to</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <thead class="create_coupon">
                                <tr>
                                    <td> <input class="form-control" type="text" name="name"></td>
                                    <td> <input class="form-control" type="text" name="code"></td>
                                    <td style="position:relative"> <select name="discount" title="discount type" class="selectpicker"  data-live-search="true"   style="paddind:2px" >
                                            <option value="EGP">EGP discount</option>
                                            <option value="%">% discount</option>
                                            <option value="Free">Free shipping</option>
                                            <option value="Free+EGP">Free shipping + EGP discount</option>
                                            <option value="Free+%">Free shipping + % discount</option>
                                        </select>
                                    </td>
                                    <td >
                                        <input class="form-control" type="text" name="total" style="display: inline;">

                                    </td>
                                    <td>
                                        <select class="form-control" name="discount_type"  id="discount_type" title="EGP" placeholder="EGP"  data-live-search="true"   style="width:50%!important;display: inline;paddind:2px" >
                                            <option value="EGP">EGP </option>
                                            <option value="%">% </option>

                                        </select>
                                    </td>
                                    <td>
                                        <button id="apply" type="button" class="btn btn-primary " >
                                            save
                                          </button>
                                          <button id="cancel_coupon" type="button" class="btn btn-primary " >
                                            Cancel
                                          </button>

                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table  class="js-dynamitable     table table-bordered">
                                <tr class="create_coupon" style="background-color: #F8F9FA !important">
                                    <p class="create_coupon" style="background-color: #F8F9FA !important;padding:8px;margin:0">
                                        Valid from
                                        <input class="date_picker" type="text" name="activate_from" id="date" >
                                        <a href="#" id="pickDate"> today </a>
                                         until
                                         <input class="date_picker" type="text" name="activate_to" id="date_to" >
                                         <a href="#" id="pick_date">deactivated</a>
                                         , applies with
                                         <a href="#" data-toggle="modal" data-target="#exampleModalCenter" >no limits </a>
                                         . (<a href="#">Generate</a> copoun code)
                                    </p>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg  " role="document" id="promo">
                                            <div class="modal-content" style="border:20px solid #becbda">
                                                <div style="bacground-color:#fff !important">
                                                    <form  id="form_modal">
                                                        <div class="modal-header" style="border: none">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Applicable For...</h5>
                                                        </div>
                                                        <div class="modal-body" style="border:20px solid #fff;background-color:#e5eaf0 !important">
                                                            @include('backend.partials.errors')
                                                            <div id="login_error" class="alert alert-danger"  style="display:none">

                                                            </div>
                                                            <div class="row" >
                                                                    <div class="col">

                                                                        <label for="">Orders :</label>
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" class="custom-control-input" id="orders" name="order"checked value="all">
                                                                            <label class="custom-control-label" for="orders">all orders </label>
                                                                        </div>

                                                                        <div class="custom-control custom-radio mb-5 mt-1">
                                                                            <input type="radio" class="custom-control-input" id="order" name="order"  value="subtotal">
                                                                            <label class="custom-control-label" for="order">subtotal over EGP</label>
                                                                            <input type="text" name="subtotal" style="display: inline;width:20%" placeholder="0">
                                                                        </div>
                                                                        <label for="">customers :</label>
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" class="custom-control-input" id="customers" name="customer" checked value="all">
                                                                            <label class="custom-control-label" for="customers">all </label>
                                                                        </div>

                                                                        <div class="custom-control custom-radio mt-1">
                                                                            <input type="radio" class="custom-control-input" id="customer" name="customer" value="repeat">
                                                                            <label class="custom-control-label" for="customer">repeat customers</label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio mt-1">
                                                                            <input type="radio" class="custom-control-input" id="custome" name="customer"  value="new">
                                                                            <label class="custom-control-label" for="custome">new customers </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="">Number of uses :</label>
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" class="custom-control-input" id="uses" name="use" checked value="unlimited">
                                                                            <label class="custom-control-label" for="uses">unlimited </label>
                                                                        </div>

                                                                        <div class="custom-control custom-radio mb-5 mt-1">
                                                                            <input type="radio" class="custom-control-input" id="us" name="use" value="once">
                                                                            <label class="custom-control-label" for="us">once per customer</label>
                                                                        </div>

                                                                        <div class="custom-control mt-1" style="padding: 0">
                                                                            <span style="margin-right: 11px;">Dishes :</span>

                                                                            <select name="dish[]" title="applied to " class="selectpicker" multiple data-live-search="true"   style="paddind:2px" >
                                                                                <option value="all" selected>all</option>
                                                                                @isset($dishes)
                                                                                    @foreach ($dishes as $dishe)
                                                                                        <option value="{{ $dishe->id }}">{{ $dishe->name }}</option>
                                                                                    @endforeach
                                                                                @endisset

                                                                            </select>

                                                                        </div>
                                                                        <div class="custom-control mt-1" style="padding: 0">
                                                                            <span style="margin-right: 13px;">Cooks :</span>

                                                                            <select name="cook[]" title="applied to " class="selectpicker" multiple data-live-search="true"   style="paddind:2px" >
                                                                                <option value="all" selected>all</option>
                                                                                @isset($cooks)
                                                                                    @foreach ($cooks as $cook)
                                                                                        <option value="{{ $cook->id }}">{{ $cook->name }}</option>
                                                                                    @endforeach
                                                                                @endisset

                                                                            </select>

                                                                        </div>
                                                                        <div class="custom-control mt-1" style="padding: 0">
                                                                            <span style="margin-right: 4px;">Cusines :</span>

                                                                            <select name="cusine[]" title="applied to " class="selectpicker" multiple data-live-search="true"   style="paddind:2px" >
                                                                                <option value="all" selected>all</option>
                                                                                @isset($cusines)
                                                                                    @foreach ($cusines as $cusine)
                                                                                        <option value="{{ $cusine->id }}">{{ $cusine->name }}</option>
                                                                                    @endforeach
                                                                                    @endisset

                                                                            </select>

                                                                        </div>
                                                                        <div class="custom-control mt-1" style="padding: 0">
                                                                            <span>Sections :</span>

                                                                            <select name="section[]" title="applied to " class="selectpicker" multiple data-live-search="true"   style="paddind:2px" >
                                                                                <option value="all" selected>all</option>
                                                                                @isset($sections)
                                                                                    @foreach ($sections as $section)
                                                                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                                                                    @endforeach
                                                                                @endisset

                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer" style="border: none ;justify-content:center">
                                                            <button id="cancel" type="button" class="btn " data-dismiss="modal" style="border:2px solid #e5eaf0;border-radius:20px">Cancel</button>
                                                            <button  type="button" class="btn " data-dismiss="modal"  style="border:2px solid #e5eaf0;border-radius:20px">Save Changes </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <thead class="create_coupon">
                                    <tr>
                                      <th>
                                        <input  class="js-filter  form-control"  type="text" value="">
                                      </th>
                                      <th>
                                        <input  class="js-filter  form-control"  type="text" value="">
                                      </th>
                                      <th>
                                        <select class=" js-filter  form-control" >
                                          <option value=""> All Type </option>
                                          @foreach ($discounts as $discount)
                                          <option value="{{ $discount->id }}"> {{ $discount->discount }}</option>
                                          @endforeach
                                        </select>
                                      </th>
                                      <th>
                                        <select class=" js-filter  form-control" >
                                          <option value="">Any period</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                        </select>
                                      </th>
                                      <th>
                                        <select class=" js-filter  form-control" >
                                            <option value="">Select Type</option>
                                            <option value="Active">Active</option>
                                            <option value="Paused">Paused</option>
                                            <option value="Expired">Expired</option>
                                          </select>
                                      </th>
                                      <th>
                                        <select class=" js-filter  form-control" >
                                            <option value="">All</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="30">30</option>
                                        </select>
                                      </th>
                                      <th></th>
                                      <th></th>

                                    </tr>
                                </thead>
                                  <tbody>

                                   @isset($discounts)

                                       @foreach ($discounts as $discount)
                                       <tr>
                                        <td>{{ $discount->name }}</td>
                                        <td>{{ $discount->code }}</td>
                                        <td >{{ $discount->total }} {{ $discount->discount }}</td>
                                        <td >{{ $discount->activate_from }} <br> {{ $discount->activate_to == null ? 'untill deactivate' : $discount->activate_to }}</td>
                                        <?php
                                            $date =  strtotime(date("Y-m-d"));
                                            $end_date=strtotime($discount->activate_to);

                                        ?>
                                        @if ($end_date-$date > 0 | $end_date-$date == -$date)
                                            <td id="status"><span class="status" style="color:#54C3A6">Active </span></td>
                                        @else
                                         <td id=""><span class="" style="color:#91A4B6">Used up </span></td>
                                        @endif
                                        {{-- <td id="{{ $end_date-$date > 0 ? 'status' : ''}} "><span class="status" style="color: {{ $end_date-$date > 0 ? '#54C3A6' : '#6D80AE'}}">{{ $end_date-$date > 0 ? 'Active': 'Used up'}} </span></td> --}}
                                        <td >{{ $discount->uses }}</td>
                                        <td>{{ $discount->customers }} customers</td>
                                        <td>
                                          <div class="actions">
                                              <a class="link_update bg-success-light mr-2" data-toggle="modal"  href="#edit_specialities_details" >
                                                  <i class="fe fe-pencil"></i> Edit
                                              </a>
                                              <a class="link_delete" data-toggle="modal" href="#delete_modal" data-url=""  class="btn btn-sm btn-danger" style="color: #f00">
                                                  <i class="fe fe-trash"></i> Delete
                                              </a>
                                          </div>
                                        </td>

                                      </tr>
                                       @endforeach
                                   @endisset

                                  </tbody>
                        </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>

@endsection


@push('scripts')


    <script src="{{ asset('backend/js/dynamitable.jquery.min.js') }}"></script>


    <script>

$('.date_picker').datepicker({
        format: 'dd-mm-yyyy'
    });

    // $('.dropdown').show();
    function removeDiv(elem){
        $(elem).parent('div').remove();
    }

    $('#create_coupon').on('click',function(){
        $('.create_coupon').show();
    });


    $('#cancel_coupon').on('click',function(){
        $('.create_coupon').hide();
    })

    $('#cancel').click(function(){
        $('#form_modal')[0].reset();
        $(".selectpicker").val('all');
        $(".selectpicker").selectpicker("refresh");

    });





    $("#apply").click(function(event){
      event.preventDefault();

        $('.errors').hide();
      let name = $("input[name=name]").val();
      let code = $("input[name=code]").val();
      let total = $("input[name=total]").val();
      let uses = $("input[name=use]:checked").val();
      let orders = $("input[name=order]:checked").val();
      let customers = $("input[name=customer]:checked").val();
      let discount = $('select[name="discount"]').val();
      let dishes = $('select[name="dish[]"]').val();
      let cooks = $('select[name="cook[]"]').val();
      let cusines = $('select[name="cusine[]"]').val();
      let sections = $('select[name="section[]"]').val();
      let discount_type = $('select[name="discount_type"]').val();
      let activate_from = $("input[name=activate_from]").val();
      let activate_to = $("input[name=activate_to]").val();

    //   let _token   = $('meta[name="csrf-token"]').attr('content');


    console.log( activate_from);

      $.ajax({
        url: "/{{ Config::get('app.locale') }}/dashboard/discount",
        type:"POST",
        data:{
          name:name,
          code:code,
          total:total,
          uses:uses,
          orders:orders,
          customers:customers,
          discount:discount,
          sections:sections,
          cooks:cooks,
          dishes:dishes,
          cusines:cusines,
          discount_type:discount_type,
          activate_from:activate_from,
          activate_to:activate_to,
          "_token": "{{ csrf_token() }}",
        },

        success:function(response){
        //   if(response.success) {
        //     $('#exampleModalCenter').modal('hide');
        //   }else if( ! response.success){
        //       alert('fdhg');
        //             $('#exampleModalCenter').modal('hide');
        //             $('#login_error').css('display','block')
        //             $('#login_error').append('<p>'+response.error+'</p>');
        //         }
        if(response.success) {
            setTimeout(function(){window.location = window.location}, 5000);
                }

        },
        error:function(data)
            {
                $('#exampleModalCenter').hide();
                $('.modal-backdrop.show').hide();
            // console.log(data.responseJSON.errors);
            $.each(data.responseJSON.errors, function (i, error) {
                var el = $(document).find('[name="'+i+'"]');
                el.before($('<span class="errors" style="color: red;display:block;">'+error[0]+'</span>'));
            });
            }
       });
  });



    </script>

    <script>

$("#date").hide();
$("#pickDate").click(function(){
        $("#date").show();
        $("#date").datepicker({
                showButtonPanel: true,
                minDate: '0M',
                maxDate: '+90D',
                dateFormat: "d-MM-yy"
              }).change(function(){
                var dateString = $( "#date" ).datepicker( "getDate" );
                 if(dateString != null){
                        var timestamp = dateString.getTime()/1000;
                        $('#hidden1').val( timestamp );
                 }
            });
    });
$("#date_to").hide();

$("#pick_date").click(function(){
        $("#date_to").show();
        $("#date_to").datepicker({
                showButtonPanel: true,
                minDate: '0M',
                maxDate: '+90D',
                dateFormat: "d-MM-yy"
              }).change(function(){
                var dateString = $( "#date_to" ).datepicker( "get_date" );

            });
    });

var status=$('.status').html();
if(status){
    $('#status').append('<span>[<a href="#"> Pause</a>] <a href="#">Limites</a></span>')
}
    </script>

@endpush


