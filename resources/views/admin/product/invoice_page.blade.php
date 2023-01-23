@extends('admin.app_master')

@section('content')

<style>

 .invoice_header {

    align-items: center;

    display: flex;

    /* background-color: #007aff; */

    justify-content: end;

    color: #fff;

    position: relative;

    padding: 5px

}

.invoice_header .invoice_col h6{

   font-weight: bold;

   margin-right:15px;

}
p.client_address {
    margin-bottom: 0px;
}

p.client_email {
    margin-bottom: 0px;
}



.invoice-info{

   margin-top: 20px

}

.table_header{

   background-color: #007aff;

   color: #fff

}

.table-bordered td, .table-bordered th {

    border: none;

    border-top: 1px solid #dbdfea;

}

.table_total{

   background-color: #f5f6fa;

}

.total_block{

   background-color: #007aff;

   color: #fff

}



.tm_invoice_seperator {

    margin-right: 0;

    border-radius: 0;

    -webkit-transform: skewX(35deg);

    transform: skewX(35deg);

    position: absolute;

    height: 100%;

    width: 100%;

    right: -30px;

    overflow: hidden;

    border: none;

    background: #007aff;

    z-index: 0;

}

.invoice_col ,.date{

    z-index: 2;

}  



.invoice {

    overflow: hidden;

}

table#tab_logic {

    border-bottom: 1px solid #ddd;

}



.invoice img{

    width: 150px;

}

</style>

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">

                        <h1>Invoice</h1>

                    </div>

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                            <li class="breadcrumb-item active">Invoice</li>

                        </ol>

                    </div>

                </div>

            </div><!-- /.container-fluid -->

        </section>



        <section class="content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-12">



                     <form action="{{ route('invoice_submit') }}" method="POST">
                     
                        @csrf



                        

                        <div class="invoice p-3 mb-3">

                            

                              <div class="row justify-content-between">

                                <div class="col-sm-6 col-md-6 col-lg-6">

                                    <div class="logo">

                                        <img class="img-fluid" src="{{ asset('all_image/'.$setting->logo) }}" alt="" >

                                    </div>

                                 </div>

                                 <div class="col-sm-3 col-md-5 col-lg-4">

                                    <div class="invoice_header">

                                        <div class="invoice_col">

                                            <h6>Invoice {{ $invoice_number }}</h6>

                                            <input type="hidden" name='invoice_number' id='invoice_number' value='{{ $invoice_number }}'>

                                         </div>

                                      

                                         <div class="date">

                                            <h6 class="float-right">Date: {{ date('d-m-Y') }}</h6>

                                         </div>

                                         <div class="tm_invoice_seperator tm_accent_bg"></div>

                                    </div>

                                    

                                 </div>

                                

                            </div>

                            

                            <div class="row invoice-info justify-content-between">

                                <div class="col-sm-2 invoice-col left_address">

                                    From

                                    <address>

                                        <strong>{{ $setting->company_name }}</strong><br>

                                        {{ $setting->company_address }}<br>

                                        @if($setting->company_phone)

                                        {{ $setting->company_phone }}<br>

                                        @endif

                                        @if($setting->company_mobile)

                                        {{ $setting->company_mobile }}<br>

                                        @endif

                                        {{ $setting->company_email }}<br>

                                    </address>

                                </div>

                                

                                <div class="col-sm-4 invoice-col right_address" >

                                 To

                                 <span id='address_hide_option'>

                                    <select class="form-control" name="clients" id="clients">

                                       <option value=''>Select Client</option>

                                                @foreach ($client as $row)

                                                <option value="{{ $row->id }}"

                                                   frist_name="{{ $row->first_name }}"

                                                   last_name="{{ $row->last_name }}"

                                                   email='{{ $row->email }}'

                                                   address='{{ $row->address }}'
                                                   

                                                   phone='{{ $row->phone }}'

                                                   >{{ $row->first_name }}

                                                </option>

                                                @endforeach

                                       </select>

                                      

                                          <P class='text-danger' id='client_error'></P>

                                      

                                    </span>

                                 

                                    

                                    <address class='td text-address_hide' id='address_hide'>

                                        <strong class='client_name'></strong>
                                        <p class='client_address'></p>
                                        <p class='client_email'></p>
                                        <p class='client_phone'></p>
                                        <!-- <p class='client_'></p> -->
                                        <!-- <strong class='strong_name'></strong><br>

                                        795 Folsom Ave, Suite 600<br>

                                        San Francisco, CA 94107<br>

                                        Phone: (555) 539-1037<br>

                                        Email: john.doe@example.com -->

                                    </address>



                                </div>

                           </div>

                           <div class="row">

                                <div class="col-12 table-responsive">

                                    

                                       

                                        {{-- id="dynamicAddRemove" --}}

                                        <table class="table table-bordered" id="tab_logic">

                                            <tr class="table_header">

                                                <td>Product</td>

                                                <td>Category</td>

                                                <td>Rate</td>

                                                <td>Quantity</td>

                                                <td>Price</td>

                                                <td>Action</td>

                                            </tr>

                                            <tr class='item'>

                                                <td>

                                                    <select class="form-control product"name="attraction_or_activity[]"

                                                        id="product_1" data-id='1' onchange='product_chnage(1)'>

                                                        <option value=''>Select Product</option>

                                                        @foreach ($product as $row)

                                                            <option value="{{ $row->id }}" pro_id='{{ $row->id }}'

                                                                cat_name='{{ $row->cat_name }}'

                                                                pro_prices='{{ $row->rate }}'>{{ $row->name }}

                                                            </option>

                                                        @endforeach

                                                    </select>

                                                </td>

                                                <td><input type="text" readonly class="form-control add_category"

                                                        id="add_category1" /></td>

                                                <td><input type="number" readonly class="form-control price add_price"

                                                        id='add_price1' /></td>

                                                <td><input type="number" name='qty[]' class="form-control qty" value="1" /></td>

                                                

                                                <td>

                                                    <input type="number" name='total[]' placeholder='0.00'

                                                        class="form-control total" readonly />
                                                </td>



                                             </tr>

                                          </table>

                                          <button type="button" name="add" id="dynamic-ar"

                                          class="btn btn-outline-primary">Add +</button>





                                        

                                         

                                    

                                </div>

                                

                            </div>

                           <div class="row justify-content-end">

                              <div class="col-sm-4 col-md-6 col-lg-4">

                                 <table class="table table-bordered table_total">

                                    <tbody>

                                        <tr class="align-middle">

                                            <th class="text-center align-middle">Sub Total</th>

                                            <td class="text-center"><input type="number" name='sub_total'

                                                    placeholder='0.00' class="form-control" id="sub_total"

                                                    readonly /></td>

                                        </tr>

                                        <tr>

                                            <th class="text-center align-middle">Discount %</th>

                                            <td class="text-center">

                                                <div class="input-group mb-2 mb-sm-0">

                                                    <input type="number" readonly class="form-control" id="disscount"

                                                        placeholder="0"  name='disscount' value='{{ $setting->disscount }}'>

                                                    <div class="input-group-addon"></div>

                                                </div>

                                            </td>

                                        </tr>

                                        <tr>

                                            <th class="text-center align-middle">Total</th>

                                            <td class="text-center"><input type="text" name='Discount_amount'

                                                    id="Discount_amount" placeholder='0.00' class="form-control"

                                                    readonly /></td>

                                        </tr>



                                        <tr>

                                            <th class="text-center align-middle">Tax %</th>

                                            <td class="text-center">

                                                <div class="input-group mb-2 mb-sm-0">

                                                    <input type="number" readonly class="form-control" id="tax1"

                                                        placeholder="0" name='tex' value='{{ $setting->text }}'>

                                                    <div class="input-group-addon"></div>

                                                </div>

                                            </td>

                                        </tr>

                                        <tr>

                                            <th class="text-center align-middle">Shipping</th>

                                            <td class="text-center"><input type="number" name='shipping_amount'

                                                    id="shipping_amount" placeholder='0.00' class="form-control"

                                                    readonly value='{{ $setting->shipping }}' ></td>

                                        </tr>

                                        

                                        <tr class='d-none'>

                                            <th class="text-center align-middle"> Tax Amount</th>

                                            <td class="text-center"><input type="hidden" name='tax_amount'

                                                    id="tax_amount" placeholder='0.00' class="form-control"

                                                    readonly /></td>

                                        </tr>



                                        



                                        <tr class="total_block">

                                            <th class="text-center align-middle">Total Payable</th>

                                            <td class="text-center"><input type="number" name='total_amount'

                                                    id="total_amount" placeholder='0.00' class="form-control "

                                                    readonly /></td>

                                        </tr>

                                    </tbody>

                                </table>

                              </div>

                            </div>

                           <div class="row no-print">

                              <div class="col-12">

                              

                              

                              <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;" id='viewer_racer_login_submit'>

                                 <i class="fas fa-download"></i> Generate Invoice

                              </button>

                              <!-- <a href="{{ route('pdf_delevery_ganrate') }}" class="btn btn-success float-right" style="margin-right: 5px;" >

                                 <i class="fas fa-download"></i> Generate Delivery Form

                                </a> -->

                              </div>

                           </div>

                           </form>

                        </div>

                        

                    </div>

                </div>

            </div>

        </section>

        

    </div>







    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">

    $(document).ready(function() {

        $("#viewer_racer_login_submit").click(function(){
            setTimeout(function () {
                
                location.reload(true);
            }, 2000);
        });

      $('#address_hide').hide();



      $("#clients").change(function(){

         var element = $(this).val();

         var first_name = $('option:selected', this).attr('frist_name');

         var last_name = $('option:selected', this).attr('last_name');

         var email = $('option:selected', this).attr('email');

         var phone = $('option:selected', this).attr('phone');

         var address = $('option:selected', this).attr('address');

         

         

         $('#address_hide_option').hide();

         $('#address_hide').show();


         
         $('.client_name').html('<strong>'+first_name+'- '+last_name+'</strong><br>');
         $('.client_address').html(''+address+'');
         $('.client_email').html(''+email+'');
         $('.client_phone').html(''+phone+'');
         
         

        //  $('#address_hide').html('<strong>'+first_name+'- '+last_name+'<br>'+email+'<br>'+phone+'<br>'+address+'');

         

      });





        var i = 0;



        var x = 1;

        var selectedItem_1 = new Array();

        var product = new Array();

        var products = {!! $product->toJson() !!};

         $("#dynamic-ar").click(function() {

            var select = $('select[name="attraction_or_activity"]').val();

            ++i;

            x++;

            

            $("#tab_logic").append('<tr><td><select onchange=product_chnage(' + x +

                ') class="text-two form-control product item_select" id=product_' + x + ' data-id=' + x +

                ' name="attraction_or_activity[]"><option >Select Product</option></select></td><td><input type="text" class="form-control add_category" readonly id="add_category' +

                x +

                '"/></td><td><input type="number" readonly class="form-control price add_price" id="add_price' +

                x +

                '"/></td><td><input type="number" name=qty[] class="form-control qty" value="1"/></td><td><input type="number" name=total[] placeholder=0.00 class="form-control total" readonly/></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'

            );



            

            $.each(products, function(index, value) {

               $('#product_' + x + '').append('<option value=' + value['id'] + ' pro_id=' + value['id'] +

                      ' cat_name=' + value['cat_name'] + ' pro_prices=' + value['rate'] + ' >' + value[

                          'name'] + '</option>');

            });



        });



         $(document).on('click', '.remove-input-field', function() {

           $(this).parents('tr').remove();

           calc();

         });



         var i = 1;

            $('#tab_logic tbody').on('keyup change', function() {

               calc();

            });

            $('#tax').on('keyup change', function() {

                  calc_total();

            });

         });



        function calc() {

            $('#tab_logic tbody tr').each(function(i, element) {

                var html = $(this).html();

                if (html != '') {

                    var qty = $(this).find('.qty').val();

                    var price = $(this).find('.price').val();

                    $(this).find('.total').val(qty * price);



                    calc_total();

                }

            });

        }



         function calc_total() {

            var shipping_amount = $('#shipping_amount').val();
            shipping_amount = parseInt(shipping_amount);
            total = 0;
            

            $('.total').each(function() {
                total += parseInt($(this).val());

            });

            $('#sub_total').val(total.toFixed(2));

            disscount_sum = (total / 100) * $('#disscount').val();


            total = total - disscount_sum;
            $('#Discount_amount').val(total.toFixed(2));

            tax_sum = (total / 100) * $('#tax1').val();

            g_total = tax_sum + total;
            console.log(g_total);
            console.log(g_total + shipping_amount);
            $('#tax_amount').val(tax_sum.toFixed(2));
            $('#total_amount').val((g_total + shipping_amount).toFixed(2));

         }



         function product_chnage(id) {

            var cat_name = $('#product_' + id + ' option:selected').last().attr('cat_name');

            var price = $('#product_' + id + ' option:selected').last().attr('pro_prices');

            $('#add_category' + id).val(cat_name);

            $('#add_price' + id).val(price);

         }



        //  $('#viewer_racer_login_submit').click(function() {
            
        //     console.log($("#myForm input").serializeArray());
            
        //     var formdata = $('form').serializeArray();
            // console.log(formdata);
            // $('#client_error').html('');
            // $('#password_error').html('');

            // var clients = $('#clients').val();
            
            // var sub_total = $('#sub_total').val();

            // var Discount_amount = $('#Discount_amount').val();
            // var tax1   = $('#tax1').val();
            // var shipping_amount   = $('#shipping_amount').val();
            // var disscount   = $('#disscount').val();
            // var tax_amount   = $('#tax_amount').val();
            // var total_amount   = $('#total_amount').val();
            // var invoice_number   = $('#invoice_number').val();
            
            
            
            
        //     $.ajax({
        //         type: "POST",
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         url: "{{ route('invoice_submit') }}",
        //         data: {
        //             formdata:formdata,
        //             // clients:clients,
        //             // sub_total:sub_total,
        //             // Discount_amount:Discount_amount,
        //             // tex:tax1,
        //             // shipping_amount:shipping_amount,
        //             // disscount:disscount,
        //             // tax_amount:tax_amount,
        //             // total_amount:total_amount,
        //             // invoice_number:invoice_number,
        //         },
        //         success: function(response)
        //         {
        //             // $('.member_description').html('');
        //             // $('.member_description').append('hello');
        //             // $('#memebership_modal_join').modal('show');
        //         },
        //         error: function(response) {
        //             $('#client_error').html(response.responseJSON.errors.clients);
        //             $('#product_error').html(response.responseJSON.errors.password);
        //         }
        //     });
        // });


    </script>



    </html>

@endsection

