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

            <h1>Comments List</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Comments</li>

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

                <h3 class="card-title">Comments</h3>

               {{-- <a href="{{ route('post_add') }}" class='float-right btn btn-primary' >Add Post</a> --}}

            </div>

              

              <div class="card-body">
                <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-striped">

                  <thead>

                  <tr>
                    <th>SR NO.</th>
                    <th>Post </th>
                    <th>User</th>
                    <th>Subject</th>
                    <th>Comment</th>
                    <th>Action</th>

                  </tr>

                  </thead>

                  <tbody>

                   
                    @foreach($Comment as $cot)
                        <tr>

                            <td>{{ $cot->id }}</td>
                            <td>{{$cot->user['name']}}</td>
                            <td>{{$cot->post['title']}}</td>
                            <td>{{ $cot->subject}}</td>
                            <td>{{ $cot->comment }}</td>
                            
                            <td class="edit_data">
                                <a href="{{route('comment_delete',$cot->id)}}"  onclick="return confirm('Are you sure ?')"; class="dlt_icon" ><i class="fa fa-trash"></i></a>
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

        

      </div>

      

    </section>

    

  </div>

@endsection



