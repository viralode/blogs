<!DOCTYPE html>

<html>

<head>

    <title>Invoice App</title>

</head>

<style type="text/css">

    body{

        font-family: 'Roboto Condensed', sans-serif;

    }

    .m-0{

        margin: 0px;

    }

    .p-0{

        padding: 0px;

    }

    .pt-5{

        padding-top:5px;

    }

    .mt-10{

        margin-top:10px;

    }

    .text-center{

        text-align:center !important;

    }

    .w-100{

        width: 100%;

    }

    .w-50{

        width:50%;   

    }

    .w-85{

        width:85%;   

    }

    .w-15{

        width:15%;   

    }

    .logo img{

        width:45px;

        height:45px;

        padding-top:30px;

    }

    .logo span{

        margin-left:8px;

        top:19px;

        position: absolute;

        font-weight: bold;

        font-size:25px;

    }

    .gray-color{

        color:#5D5D5D;

    }

    .text-bold{

        font-weight: bold;

    }

    .border{

        border:1px solid black;

    }

    table tr,th,td{

        border: 1px solid #d2d2d2;

        border-collapse:collapse;

        padding:7px 8px;

    }

    table tr th{

        background: #F4F4F4;

        font-size:15px;

    }

    table tr td{

        font-size:13px;

    }

    table{

        border-collapse:collapse;

    }

    .box-text p{

        line-height:10px;

    }

    .float-left{

        float:left;

    }

    .total-part{

        font-size:16px;

        line-height:12px;

    }

    .total-right p{

        padding-right:20px;

    }

</style>

<body>

<div class="head-title">

    <h1 class="text-center m-0 p-0">Invoice</h1>

</div>

<div class="add-detail mt-10">

    <div class="w-50 float-left mt-10">

        <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">{{ $invoiceData->invoice_number }}</span></p>

        <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">{{ date('d-m-Y') }}</span></p>

    </div>

    

    <div style="clear: both;"></div>

</div>

<div class="table-section bill-tbl w-100 mt-10 bg-warning">

    <table class="table w-100 mt-10">

        <tr align="left">

            <th class="w-50">From</th>

            <th class="w-50">To</th>

        </tr>

        <tr>

            <td>

                <div class="box-text">

                    <address>

                        <strong>{{ $setting->company_name }}</strong><br>

                        {{$setting->company_address }}<br>

                        @if($setting->company_phone)

                        {{ $setting->company_phone }}<br>

                        @endif

                        @if($setting->company_mobile)

                        {{ $setting->company_mobile }}<br>

                        @endif

                        {{ $setting->company_email }}<br>

                    </address>

                </div>

                

            </td>

            <td valign="top">

                <div class="box-text">

                    <address>

                    {{ $client->first_name }}-{{ $client->last_name }} <br>

                    {{ $client->address }}<br>
                    {{ $client->email }}<br>

                    {{ $client->phone }}

                </address>

                </div>

            </td>

        </tr>

    </table>

</div>

<div class="table-section bill-tbl w-100 mt-10">

    <table class="table w-100 mt-10">

        <tr align="left">

            <th class="w-50">Id</th>

            <th class="w-50">Product Name</th>

            <th class="w-50">Category</th>

            <th class="w-50">Price</th>

            <th class="w-50">Qty</th>

            <th class="w-50">Grand Total</th>

        </tr>

        @foreach ($InvoiceDetails as $row)

            <tr align="left">

                <td>{{ $row->id }}</td>

                <td>{{ $row->name }}</td>

                <td>{{ $row->cat_name }}</td>

                <td>{{ $row->rate }}</td>

                <td>{{ $row->qty }}</td>

                <td>{{ $row->total }}</td>

            </tr>

        @endforeach

        

        <tr>

            <td colspan="6">

                <div class="total-part">

                    <div class="total-left w-85 float-left" align="right">

                        <p>Sub Total</p>
                        <p>Discount</p>
                        <p>Total</p>
                        <p>Tax ({{ $invoiceData->tex }} %)</p>
                        <p>Shipping</p>
                        <p>Total Payable</p>

                    </div>

                    <div class="total-right w-15 float-left text-bold" align="right">

                        <p>{{ $invoiceData->sub_total }}</p>
                        <p>{{ $invoiceData->disscount }} %</p>
                        <p>{{ $invoiceData->Discount_amount }}</p>
                        <p>{{ $invoiceData->tax_amount }}</p>
                        <p>{{ $invoiceData->shhiping }}</p>
                        <p>{{ $invoiceData->total_amount }}</p>

                    </div>

                    <div style="clear: both;"></div>

                </div> 

            </td>

        </tr>

    </table>

</div>

</html>