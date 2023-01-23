@extends('admin.app_master')



@section('content')


<style>
  .edit_data {
    text-align: center;
  }
  .edit_icon i{
    color: #197e30;
    font-size: 15px;
    margin-right: 5px;
  }
  .dlt_icon i{
    color: #f00;
    font-size: 15px;
  }
</style>



<div class="content-wrapper">

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Category List</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Category </li>

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

                <h3 class="card-title">Category </h3>

               <a href="{{ route('category.create') }}" class='float-right btn btn-primary' >Add category</a>

            </div>

              

              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>

                  <tr>

                    <th>Id</th>

                    <th>Name</th>

                    <th>Created Date</th>

                    <th>Action</th>

                  </tr>

                  </thead>

                  <tbody>

                    @foreach ($data as $row)

                            <tr>

                                <td>{{ $row->id }}</td>

                                <td>{{ $row->cat_name }}</td><?php $p= $row->created_at;  $date= $p->format('Y-m-d'); ?>

                                <td>{{ $date }}</td>

                                <td class="edit_data">

                                    <a href="{{ route('category.edit',$row->id) }}" class="edit_icon"><i class="fa fa-pencil-alt"></i></a>

                                    <a href="{{ route('category_delete',$row->id) }}" onclick="return confirm('Are you sure ?')";  class="dlt_icon" ><i class="fa fa-trash"></i></a>

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