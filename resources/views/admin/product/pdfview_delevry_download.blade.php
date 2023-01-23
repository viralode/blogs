<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<style type="text/css">
body {
	margin:0;
	padding:0;
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	color:#222222;
	line-height:18px;
}
* {
  box-sizing:border-box;
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  -o-box-sizing:border-box;
  -ms-box-sizing:border-box;
}
</style>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        	<!--  Header part Start -->
            	  <tr>
                    <td align="left" valign="top">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding-bottom:10px;"><img src="{{asset('/all_image/'.$setting->logo)}}" style="height:50px; width:auto; display:block;" height="50px" width="auto" alt="" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding:10px 0px;">    	 	
<strong><span style="font-size:18px;">{{$setting->company_name}}</span></strong> <br />
<br />
{{$setting->company_address}}
    </td>
  </tr>
</table>

    </td>
    <td align="right" valign="top">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-weight:bold; padding:10px 0px; font-size:22px; text-align:right;">Facture</td>
  </tr>
  <tr>
    <td style="font-size:16px; padding:10px 0px; font-weight:bold; text-align:right;">#INV-{{ $invoiceData->invoice_number}}</td>
  </tr>
</table>

    </td>
  </tr>
</table>

                    </td>
                  </tr>
            <!-- Header part End -->
            
                    	<!--  Header bottom Start -->
            	  <tr>
                    <td align="left" valign="top">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" style="padding:10px 0px; line-height:24px;">    	 	
    {{$setting->dakar}} <br />{{$setting->senegal}}
    </td>
  </tr>
</table>

    </td>
    <td align="right" valign="top" style="padding:10px 0px; line-height:24px;">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-weight:bold; font-size:18px; text-align:right;">Solde dû</td>
  </tr>
  <tr>
    <td style="font-size:22px; font-weight:bold; text-align:right;"> XOF{{ $invoiceData->total_amount }}</td>
  </tr>
</table>

    </td>
  </tr>
</table>

                    </td>
                  </tr>
            <!-- Header bottom End -->
            
                                	<!--  Address Start -->
            	  <tr>
                    <td align="left" valign="top">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="middle">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td align="left" valign="top" style="padding:10px 0px; line-height:24px;">    	
    Facturer à<br />
<strong><span style="font-size:18px;">{{ $client->first_name}} {{ $client->last_name}}</span></strong> <br />
{{ $client->address}}<br />
{{ $client->email}}<br />
{{ $client->phone}}<br />
<!-- Kery  	 -->
    </td>
  </tr>
</table>

    </td>
    <td align="right" valign="bottom" style="line-height:24px; padding:10px 0px;">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="text-align:right;"><strong>Date de facture :</strong>{{ date('d-F-Y')}}</td>
  </tr>
 
</table>

    </td>
  </tr>
</table>

                    </td>
                  </tr>
            <!-- Address End -->
            
        	<!-- Item Table Start -->
  			<tr>
    <td align="left" valign="top" style="padding-top:30px;">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col" style="background:#000000; color:#ffffff; font-weight:bold; padding:10px 8px; width:50px; text-align:center;">#</th>
    <th scope="col" style="background:#000000; color:#ffffff; font-weight:bold; padding:10px 8px; text-align:left;">Article & Description</th>
    <th scope="col" style="background:#000000; color:#ffffff; font-weight:bold; padding:10px 8px; text-align:right;">Quantité</th>

  </tr>
  <?php $i = 1; ?>
  @foreach($InvoiceDetails as $row)
  <tr style="border-bottom:1px solid #000000;">
    <td style="padding:8px; width:50px; text-align:right;">{{ $i}}</td>
        <td style="padding:8px; text-align:left;">
                {{ $row->cat_name }} <br />
                {{$row->name }}<br />
                
                <!-- Structures support<br />
                Câbles et accessoires  -->
        </td>
        <td style="padding:8px; text-align:right;">{{ $row->qty}} pcs</td>
  </tr>
  <?php $i++; ?>
  @endforeach
</table>

    </td>
  </tr>
        	<!-- Item Table End -->

        
        <!-- Remarks Start -->
  <tr>
    <td align="left" valign="top" style="padding-top: 50px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:16px; padding:10px 0px; font-weight:bold; text-align:left;" align="left" valign="top">Remarques</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding:10px 0px;">This is remarks info section here</td>
  </tr>
</table>

    </td>
  </tr>
          <!-- Remarks End -->


 <!-- signature Start -->
  <tr>
    <td align="left" valign="top" style="padding-top: 50px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:16px; padding:10px 0px; font-weight:bold; text-align:left;" align="left" valign="top">Signature autorisée ______________________</td>
  </tr>
  
</table>

    </td>
  </tr>
          <!-- Remarks End -->
</table>

    </td>
  </tr>
</table>

</body>
</html>
