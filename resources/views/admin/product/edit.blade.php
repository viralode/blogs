@extends('admin.app_master')

@section('content')
    <div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <h3 class="card-title">Edit Product</h3>
              </div>
            
              <form action='{{ route('product.update',$data->id) }}' method='POST' enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                    
                    

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name='name' placeholder="Enter Product Name" value='{{ $data->name }}'>
                        @error('name')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <select class="form-control" name="category_name" id="category_name">
                          <option value="">Selecte category name</option>
                          @foreach ($cat as $row)
                          
                          @if($data->cat_id == $row->id)
                              <option selected value="{{ $row->id }}">{{ $row->cat_name }}</option>
                          @else
                              <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                          @endif
                            
                          @endforeach
                        </select>
                        @error('category_name')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                  </div>


                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea type="text" class="form-control" id="Description" name='description'placeholder="Enter Product Description">{{ $data->description }}</textarea>
                        @error('description')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Quantity">Quantity</label>
                        <input type="number" class="form-control" id="Quantity" name='quantity' placeholder="Enter Product quantity" value='{{ $data->quantity }}'>
                        @error('quantity')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                    </div>

                 

                    <div class="form-group">
                        <label for="rate">Rate</label>
                        <input type="number" class="form-control" id="rate" name='rate' placeholder="Enter Product rate" value='{{ $data->rate }}'>
                        @error('rate')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                    </div>

                   

                  
                </div>
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              
            </form>
            </div>
          </div>
          
        </div>
       
      </div>
    </section>
    
  </div>
@endsection