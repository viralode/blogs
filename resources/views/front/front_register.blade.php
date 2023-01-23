
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <style>
        .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
    </style>
    <body>
        
<!------ Include the above in your HEAD tag ---------->
<section class="h-100 gradient-form">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="{{ asset('admin/lotus.webp')}}"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">We are The Blog Team</h4>
                </div>

                <form action="{{ route('front_register_store')}}" method="POST">
                    @csrf
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                      <label class="form-label">Name</label>
                    <input type="text"name="name" class="form-control"/>
                        @error('name')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                  </div>
                  <div class="form-outline mb-4">
                      <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"/>
                    @error('email')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                  </div>

                

                  <div class="form-outline mb-4">
                      <label class="form-label">Password</label>
                    <input type="password"name="password" class="form-control" />
                    @error('password')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror

                  </div>

                  <div class="form-outline mb-4">
                      <label class="form-label">Confrim Password</label>
                    <input type="password" name="password_confirmation" class="form-control" />

                    @error('password_confirmation')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Register</button>
                   
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">I have an account?</p>
                    <a href="{{ route('front_login')}}"  class="btn btn-outline-danger">Login</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </body>
</html>