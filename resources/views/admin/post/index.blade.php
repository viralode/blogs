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

            <h1>Posts List</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Posts</li>

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

                <h3 class="card-title">Posts</h3>

               <a href="{{ route('post_add') }}" class='float-right btn btn-primary' >Add Post</a>

            </div>

              

              <div class="card-body">
                <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-striped">

                  <thead>

                  <tr>
                    <th>SR NO.</th>
                    <th>Title</th>
                    <th>Auther</th>
                    <th>Date</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Action</th>

                  </tr>

                  </thead>

                  <tbody>

                   
                    @foreach($posts as $post)
                        <tr>

                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->auther }}</td>
                            <td>{{ $post->date}}</td>
                            <td>{{ $post->content }}</td>
                            <td>
                            <img src="{{ asset('all_image/'.$post->image)}}" alt="" border=3 height=100 width=100></img>
                            </td>
                            <td class="edit_data">
                                <a href="{{ route('post_edit',$post->id)}}" class="edit_icon"><i class="fa fa-pencil-alt"></i></a>
                                <a href="{{ route('post_delete',$post->id)}}"  onclick="return confirm('Are you sure ?')"; class="dlt_icon" ><i class="fa fa-trash"></i></a>
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



