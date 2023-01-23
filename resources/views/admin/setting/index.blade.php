@extends('admin.app_master')



@section('content')

    <div class="content-wrapper">

    

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Setting</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Home</a></li>

              <li class="breadcrumb-item active">Setting</li>

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

                <h3 class="card-title">Add Setting</h3>

              </div>

            

              <form action='{{ route('setting.update',$data->id) }}' method='POST' enctype="multipart/form-data">

                @method('PUT')

                @csrf

                <div class="card-body">

                    

                    <div class="form-group">

                        <label for="category_name">Tax %</label>

                        <input type="text" class="form-control" id="text" name='text'placeholder="0.59 %" value='{{ $data->text }}'>

                        @error('text')

                            <P class='text-danger'>{{ $message }}</P>

                        @enderror

                    </div>



                    <div class="form-group">

                        <label for="category_name">Shipping</label>

                        <input type="number" class="form-control" id="Shipping" name='Shipping'placeholder="0.7 %" value='{{ $data->shipping }}'>

                        @error('Shipping')

                            <P class='text-danger'>{{ $message }}</P>

                        @enderror

                    </div>



                    <div class="form-group">

                        <label for="category_name">Discount %</label>

                        <input type="text" class="form-control" id="Discount" name='Discount'placeholder="0.89 %" value='{{ $data->disscount }}'>

                        @error('Discount')

                            <P class='text-danger'>{{ $message }}</P>

                        @enderror

                    </div>







                    <div class="form-group">

                      <img src="{{ asset('all_image/'.$data->logo) }}" alt="logo" width="100" height="100">

                    </div>





                    <div class="form-group">

                        <label for="category_name">Company Logo</label>

                        <input type="file" class="form-control" name='logo'>

                    </div>



                    <div class="form-group">

                      <label for="category_name">Company Name</label>

                      <input type="text" class="form-control" name='company_name' placeholder="Company Name" value='{{ $data->company_name }}'>

                      @error('company_name')

                            <P class='text-danger'>{{ $message }}</P>

                      @enderror

                    </div>



                    <div class="form-group">

                      <label for="category_name">Company Email</label>

                      <input type="email" class="form-control" name='company_email' placeholder="Company Email" value='{{ $data->company_email }}'>

                      @error('company_email')

                            <P class='text-danger'>{{ $message }}</P>

                      @enderror

                    </div>



                    <div class="form-group">

                      <label for="category_name">Company Phone</label>

                      <input type="number" class="form-control" name='company_phone' placeholder="Company Phone" value='{{ $data->company_phone }}'>

                      

                    </div>



                    <div class="form-group">

                      <label for="category_name">Company Mobile</label>

                      <input type="text" class="form-control" name='company_mobile' placeholder="Company Mobile" value='{{ $data->company_mobile }}'>

                      

                    </div>



                    <div class="form-group">

                      <label for="category_name">Company Address</label>

                      <textarea type="file" class="ckeditor form-control" name='company_address'>{{ $data->company_address }}</textarea>

                      @error('company_address')

                            <P class='text-danger'>{{ $message }}</P>

                      @enderror

                    </div>




                      <div class="form-group">

                        <img src="{{ asset('all_image/'.$data->d_logo) }}" alt="logo" width="100" height="100">

                      </div>

                      <div class="form-group">

                        <label for="category_name">Dashboard Logo</label>
                        <input type="file" class="form-control" name='dashboard_logo'>
                        @error('dashboard_logo')

                            <P class='text-danger'>{{ $message }}</P>

                      @enderror
                      </div>

                      <div class="form-group">

                        <label for="category_name">Dakar</label>
                        <input type="text" class="form-control" name='dakar' value='{{ $data->dakar }}'>
                        @error('dashboard_logo')

                            <P class='text-danger'>{{ $message }}</P>

                      @enderror
                      </div>

                      <div class="form-group">

                        <label for="category_name">Senegal</label>
                        <input type="text" class="form-control" name='senegal' value='{{ $data->senegal }}'>
                        @error('dashboard_logo')

                            <P class='text-danger'>{{ $message }}</P>

                      @enderror
                      </div>

                      <div class="form-group">

                        <label for="category_name">Dashboard Title</label>
                        <input type="text" class="form-control" name='dashboard_title' placeholder='Enter dashboard title' value='{{ $data->d_title }}'>
                      @error('dashboard_title')

                            <P class='text-danger'>{{ $message }}</P>

                      @enderror
                      </div>
                      <div class="form-group">

                        <label for="category_name">Dashboard Footer Text</label>
                        <input type="text" class="form-control" name='dashboard_footer_title' placeholder='Enter dashboard footer text' value='{{ $data->footer_text }}'>
                      @error('dashboard_footer_title')

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