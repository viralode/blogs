<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;
use App;
use Auth;
use App\Models\Clients;
use App\Models\Product;
use App\Models\User;
use App\Models\settingsModel;
use App\Models\InvoiceDetails;
use App\Models\InvoiceData;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('admin.admin_dashboard');
    }
    public function invoice(){
        $client = Clients::get();
        $product = Product:: join('category','products.cat_id','category.id')
        ->select('products.*','category.cat_name')
        ->get();
        $last_id = InvoiceData::latest()->first();
       
        if(!empty($last_id)){
            
            $invoice_number = '#000'.$last_id->id+1; 
        }else{
            $invoice_number = '#0001'; 
        }
        
        $setting = settingsModel::find(1);
        $user = User::find(Auth::id());
        
       return view('admin.product.invoice_page',compact('user','client','invoice_number','product','setting'));
    }

    
    public function invoice_submit(request $request){
        $this->validate($request, [
            'clients'   => 'required',
        ]);
        
        try
        {
            DB::beginTransaction();

        $invoice_data = new InvoiceData;
        $invoice_data->client_id        = $request->clients;
        $invoice_data->sub_total        = $request->sub_total;
        $invoice_data->tex              = $request->tex;
        $invoice_data->shhiping         = $request->shipping_amount;
        $invoice_data->disscount         = $request->disscount;
        
        $invoice_data->tax_amount       = $request->tax_amount;
        $invoice_data->Discount_amount  = $request->Discount_amount;
        $invoice_data->total_amount     = $request->total_amount;
        $invoice_data->invoice_number   = $request->invoice_number;
        $invoice_data->save();

        
        foreach($request->attraction_or_activity as $key=>$row){

            if(empty($row)){
                return redirect()->back()->with('info','Please Select Products');
            }else{
                $invoice_details = new InvoiceDetails;
                $invoice_details->invoice_data_id   = $invoice_data->id;
                $invoice_details->product_id        = $row;
                $invoice_details->qty               = $request->qty[$key];
                $invoice_details->total             =  $request->total[$key];
                $invoice_details->save();
            }
            

        }

        $setting = settingsModel::find(1);
        $invoiceData = InvoiceData::find($invoice_data->id);
        // $invoiceData = InvoiceData::find(39);
        
        $InvoiceDetails   = InvoiceDetails::
        join('products','invoice_details.product_id','products.id')
        ->join('category','products.cat_id','category.id')
        ->select('invoice_details.*','products.cat_id','products.name','products.rate','category.cat_name')
        ->where('invoice_data_id',$invoiceData->id)->get();
        
        $client = Clients::find($invoiceData->client_id);
        $pdf1 = PDF::loadView('admin.product.pdfview_download',compact('setting','client','invoiceData','InvoiceDetails'));
        DB::commit();
        return  $pdf1->download('pdf_invoice.pdf');

        // $this->pdf_delevery_ganrate($invoiceData->id);
       
        // $pdf1->Output('pdf_invoice.pdf');
        // dd('suvvess');
        // $pdf = PDF::loadView('admin.product.pdfview_download',compact('setting','client','invoiceData','InvoiceDetails','date2'));
        // return $InvoiceDetails;

        // echo $this->pdf_delevery_ganrate($invoiceData->id);
        // return $pdf,$pdf;
    }catch (\Exception $e) {
        DB::rollBack();
        return $e->getMessage();
    } catch (\Throwable $e) {
        DB::rollBack();
        return $e->getMessage();
    }
    

    
    
    }

    public function pdf_delevery_ganrate(){
        $update_id = InvoiceData::latest()->first()->id;
        
        $setting = settingsModel::find(1);
        $invoiceData = InvoiceData::find($update_id);
        
        $InvoiceDetails   = InvoiceDetails::
        join('products','invoice_details.product_id','products.id')
        ->join('category','products.cat_id','category.id')
        ->select('invoice_details.*','products.cat_id','products.name','products.rate','category.cat_name')
        ->where('invoice_data_id',$update_id)->get();
        
        $client = Clients::find($invoiceData->client_id);
        
    //    return $client;

        $pdf2 = PDF::loadView('admin.product.pdfview_delevry_download',compact('setting','client','invoiceData','InvoiceDetails'));
        return $pdf2->download('pdf_delevry.pdf');
    }

    public function pdf_delevery_ganratewith_id($id){
        $update_id = $id;
       
        $setting = settingsModel::find(1);
        $invoiceData = InvoiceData::find($update_id);
        
        $InvoiceDetails   = InvoiceDetails::
        join('products','invoice_details.product_id','products.id')
        ->join('category','products.cat_id','category.id')
        ->select('invoice_details.*','products.cat_id','products.name','products.rate','category.cat_name')
        ->where('invoice_data_id',$update_id)->get();
        
        $client = Clients::find($invoiceData->client_id);
        
    //    return $client;

        $pdf2 = PDF::loadView('admin.product.pdfview_delevry_download',compact('setting','client','invoiceData','InvoiceDetails'));
        return $pdf2->stream('pdf_delevry.pdf');
    }

    public function invoice_data(){

        $invoiceData = InvoiceData::
        join('clients','invoice_data.client_id','clients.id')
        ->select('invoice_data.*','clients.first_name','clients.last_name','clients.email')
        ->orderBy('invoice_data.id', 'DESC')->get();
        return view('admin.product.invoice_data',compact('invoiceData'));
    }

    public function invoice_show($id){
        $date1 = date('Y-m-d ');; 

       

        $setting = settingsModel::find(1);
        $invoiceData = InvoiceData::find($id);
        $InvoiceDetails   = InvoiceDetails::
        join('products','invoice_details.product_id','products.id')
        ->join('category','products.cat_id','category.id')
        ->select('invoice_details.*','products.cat_id','products.name','products.rate','category.cat_name')
        ->where('invoice_data_id',$invoiceData->id)->get();
        $client = Clients::find($invoiceData->client_id);
        // return view('admin.product.pdfview_download',compact('setting','client','invoiceData','InvoiceDetails'));
        
        $pdf = PDF::loadView('admin.product.pdfview_download',compact('setting','client','invoiceData','InvoiceDetails'));
        return $pdf->stream('pdfview.pdf');
        // return $pdf->download('pdfview.pdf');
    }

    public function invoice_delete($id){
        $InvoiceDetails = InvoiceDetails::where('invoice_data_id',$id)->delete();
        $invoiceData = InvoiceData::where('id',$id)->delete();
        return redirect()->back()->with('danger','Data Deleted Successfully');
    }

}
