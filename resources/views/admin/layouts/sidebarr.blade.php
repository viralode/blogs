<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <?php $data = DB::table('settings')->where('id',1)->first();
        
    ?>
    <a href="{{ route('admin_dashboard') }}" class="brand-link">

      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

      <span class="brand-text font-weight-light">AdminLite</span>

    </a>
  
  
    <div class="sidebar">
    <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          
     
          </li>

          <li class="nav-item">

          <a href="{{ route('post') }}" class="nav-link ">

            <i class="nav-icon fa fa-list-alt"></i>

            <p>Post</p>

          </a>



          </li>



          <li class="nav-item">

            <a href="{{ route('comment_list') }}" class="nav-link ">
  
              <i class="nav-icon fa fa-list-alt"></i>
  
              <p>Comment</p>
  
            </a>
  
  
  
            </li>










      


        </ul>

      </nav>

    </div>

    

  </aside>

