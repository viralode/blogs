<!DOCTYPE html>

<html lang="en">



@include('admin.layouts.head')



<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

    

      <!-- Preloader -->

      {{-- <div class="preloader flex-column justify-content-center align-items-center">

        <img class="animation__shake" src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">

      </div> --}}



      @include('admin.layouts.navbarr')

      



      @include('admin.layouts.sidebarr')



      @yield('content')





      @include('admin.layouts.footer')



       

  <aside class="control-sidebar control-sidebar-dark">

    

  </aside>

  

</div>

<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

{{-- <script>$.widget.bridge('uibutton', $.ui.button)</script> --}}

<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>

<script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>

<script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>

<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>

{{-- <script src="{{ asset('admin/dist/js/demo.js') }}"></script> --}}

<script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>

<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script>

    $(document).ready( function () {

      $('#example1').DataTable();

        @if(Session::has('message'))

          toastr.options ={

            "closeButton" : true,

            "progressBar" : true

          }

          toastr.success("{{ session('message') }}");

        @endif



        @if(Session::has('info'))

        toastr.options =

        {

            "closeButton" : true,

            "progressBar" : true

        }

                toastr.info("{{ session('info') }}");

        @endif


        @if(Session::has('success'))

        toastr.options =

        {

            "closeButton" : true,

            "progressBar" : true

        }

                toastr.success("{{ session('success') }}");

        @endif

        @if(Session::has('danger'))  
        toastr.options =

        {

            "closeButton" : true,

            "progressBar" : true

        }

            toastr.error("{{ session('danger') }}");
        @endif









   

    });

  </script>

</body>

</html>

