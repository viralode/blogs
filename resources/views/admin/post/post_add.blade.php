@extends('admin.app_master')

@section('content')
    <div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('post') }}">Home</a></li>
              <li class="breadcrumb-item active">Post</li>
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
                <h3 class="card-title">Add Post</h3>
              </div>
            
              <form action="{{ route('post_store')}}" method='POST' enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    
                   

                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="title" name='title' value="{{ old('title')}}" placeholder="Enter post title">
                        @error('title')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Auther</label>
                        <input type="text" class="form-control" id="auther" value="{{ old('auther')}}" name='auther' placeholder="Enter post auther">
                        @error('auther')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Date</label>
                        <input type="date" class="form-control" id="date" value="{{ old('date')}}" name='date' placeholder="Enter post auther">
                        @error('date')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea type="text" class="form-control" id="content" name='content'placeholder="Enter post content">{{ old('content')}}</textarea>
                        @error('content')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">image</label>
                        <input type="file" class="form-control" name='image' accept="image/png, image/jpg, image/webp">
                        @error('image')
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