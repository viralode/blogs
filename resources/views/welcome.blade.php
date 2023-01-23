<html>


<header>
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
  rel="stylesheet"
/>
    <!-- Intro settings -->
    <style>
      #intro {
        /* Margin to fix overlapping fixed navbar */
        margin-top: 58px;
      }
      @media (max-width: 991px) {
        #intro {
          /* Margin to fix overlapping fixed navbar */
          margin-top: 45px;
        }
      }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container-fluid">
        <!-- Navbar brand -->
       <span class="text-success">Blog</span>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          </ul>
        @if(Auth::user())
          <span class="btn btn-primary">{{ Auth::user()->name }}</span>&nbsp;
          <span class="btn btn-primary"><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
            <i class="fas fa-users mr-2"></i>Logout
            </a>    
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form></span>
        @else
        <a href="{{ route('front_login')}}" class="btn btn-primary">Login</a>&nbsp;
        <a href="{{ route('front_register')}}" class="btn btn-primary">Register</a>
        @endif
        </div>
      </div>
    </nav>
  </header><br>
  <main class="my-5">
    <div class="container">
      <section class="text-center">
        <h4 class="mb-5"><strong>Latest Blog</strong></h4>
        <div class="row">
            @foreach($posts as $post)
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="{{ asset('all_image/'.$post->image)}}" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">{{ $post->title}}</h5>
                <p class="card-text">
                  {{ substr($post->content, 0, 100) . '...';}}
                </p>
                <a href="{{ route('blog_details',$post->id)}}" class="btn btn-primary">Read</a>
              </div>
            </div>
        </div>
        @endforeach()

          

        

        </div>
      </section>
      <!--Section: Content-->

      
      <!-- Pagination -->
      <nav class="my-4" aria-label="...">

        <ul class="pagination pagination-circle justify-content-center">
            {{ $posts->links() }}
        </ul>
      </nav>
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="bg-light text-lg-start">
    

    <hr class="m-0" />

    

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->
  </html>
