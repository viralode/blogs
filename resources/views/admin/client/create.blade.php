@extends('admin.app_master')



@section('content')

    <div class="content-wrapper">

    

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Client</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Home</a></li>

              <li class="breadcrumb-item active">Client</li>

            </ol>

          </div>

        </div>

      </div>

    </section>



    

    <section class="content">

      <div class="container-fluid">

        <div class="row">

          

          <div class="col-md-12">

            

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Add Client</h3>

              </div>

            

              <form action='{{ route('client.store') }}' method='POST' enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                    

                    <div class="form-group">

                        <label for="first_name">First name</label>

                        <input type="text" class="form-control" id="first_name" name='first_name'placeholder="Enter first name">

                        @error('first_name')

                            <P class='text-danger'>{{ $message }}</P>

                        @enderror

                    </div>



                    <div class="form-group">

                        <label for="name">Last Name</label>

                        <input type="last_name" class="form-control" id="last_name" name='last_name' placeholder="Enter last name">

                        <!-- @error('last_name')

                            <P class='text-danger'>{{ $message }}</P>

                        @enderror -->

                    </div>

                    <div class="form-group">

                        <label for="name">Address</label>

                        <textarea class="form-control" id="address" name='address' placeholder="Enter address"></textarea>

                        @error('address')

                            <P class='text-danger'>{{ $message }}</P>

                        @enderror

                    </div>



                    <div class="form-group">

                        <label for="email">Email</label>

                        <input type="email" class="form-control" id="email" name='email' placeholder="Enter the email">

                        @error('email')

                            <P class='text-danger'>{{ $message }}</P>

                        @enderror

                    </div>



                    <div class="form-group">

                        <label for="name">Phone</label>

                        <input type="text" class="form-control" id="phone" name='phone' placeholder="Enter phone">

                        @error('phone')

                            <P class='text-danger'>{{ $message }}</P>

                        @enderror

                    </div>

                    


                </div>

                

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>

              

            </form>

            </div>
          </div>
        </div>

      </div>

    </section>
  </div>

@endsection