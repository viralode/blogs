@extends('admin.app_master')



@section('content')

<style>
  .eye_btn i{
    color: #197e30;
    font-size:15px ;
    margin-right: 5px;
  }
  .dlt_icon i{
    color: #f00;
    font-size: 15px;
  }
  .edit_data {
    text-align: center;
  }
</style>



<div class="content-wrapper">

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Invoice List</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Invoice</li>

            </ol>

          </div>

        </div>

      </div>

    </section>

    <section class="content">

      <div class="container-fluid">

        <div class="row">

          <div class="col-12">

           



            <div class="card">

              <div class="card-header">

                <h3 class="card-title">Invoice</h3>

            </div>

              

              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>

                  <tr>

                    <th>SR NO.</th>

                    <th>Invoice No.</th>

                   

                    <th>Name</th>

                    <th>Email</th>

                    <th>Created Date</th>

                    <th>View</th>
                    <th>Action</th>

                  </tr>

                  </thead>

                  <tbody>

                    @foreach ($invoiceData as $data)

                        <tr>

                            <td>{{  $data->id }}</td>

                            <td>{{  $data->invoice_number }}</td>

                            <td>{{  $data->first_name }}-{{  $data->last_name }}</td>

                            <td>{{  $data->email }}</td><?php $p= $data->created_at;  $date= $p->format('Y-m-d'); ?>

                            <td>{{  $date }}</td>

                            <td class="edit_data"><a href="{{ route('invoice_show',$data->id) }}" target="_blank"  data-toggle="tooltip" data-placement="top" title="Invoice" class='eye_btn'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('pdf_delevery_ganratewith_id',$data->id) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Delivery"> <i class="fa fa-share"></i></a>
                            </td>

                            <td>
                            <a href="{{ route('invoice_delete',$data->id) }}" onclick="return confirm('Are you sure ?')"; class='dlt_icon' data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>



                    @endforeach

                    

                  </tbody>


                </table>

              </div>

              

            </div>

            

          </div>

          

        </div>

        

      </div>

      

    </section>

    

  </div>

@endsection



