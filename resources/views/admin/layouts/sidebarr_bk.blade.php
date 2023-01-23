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

          
              
            <li class="nav-item">

            <a href="{{ route('category.index') }}" class="nav-link @if(Route::currentRouteName() == 'category.index') active @endif @if(Route::currentRouteName() == 'category.create') active @endif  @if(Route::currentRouteName() == 'category.edit')active @endif">

              <i class="nav-icon fa fa-list-alt"></i>

              <p>Category</p>

            </a>

           

          </li>

          <li class="nav-item">

          <a href="{{ route('category.index') }}" class="nav-link @if(Route::currentRouteName() == 'category.index') active @endif @if(Route::currentRouteName() == 'category.create') active @endif  @if(Route::currentRouteName() == 'category.edit')active @endif">

            <i class="nav-icon fa fa-list-alt"></i>

            <p>Post</p>

          </a>



          </li>



          <li class="nav-item">

            <a href="{{ route('product.index') }}" class="nav-link @if(Route::currentRouteName() == 'product.index') active @endif @if(Route::currentRouteName() == 'product.create') active @endif  @if(Route::currentRouteName() == 'product.edit')active @endif">

              <i class="nav-icon fas fa-table"></i>

              <p>Product</p>

            </a>

           

          </li>



          <li class="nav-item ">

            <a href="{{ route('client.index') }}" class="nav-link @if(Route::currentRouteName() == 'client.index') active @endif @if(Route::currentRouteName() == 'client.create') active @endif  @if(Route::currentRouteName() == 'client.edit')active @endif">

              <i class="nav-icon fas fa-users"></i>

              <p>Client</p>

            </a>

           

          </li>



          <li class="nav-item">

            <a href="{{ route('invoice') }}" class="nav-link @if(Route::currentRouteName() == 'invoice') active @endif">

              <i class="nav-icon fa fa-file"></i>

              <p>Invoice</p>

            </a>

           

          </li>





          <li class="nav-item">

            <a href="{{ route('invoice_data') }}" class="nav-link @if(Route::currentRouteName() == 'invoice_data') active @endif">

              <i class="nav-icon fa fa-database"></i>

              <p>Invoices Data</p>

            </a>

          </li>







          <li class="nav-item">

            <a href="{{ route('setting.index') }}" class="nav-link @if(Route::currentRouteName() == 'setting.index') active @endif">

              <i class="nav-icon fa fa-cog"></i>

              <p>Setting</p>

            </a>

          </li>



        </ul>

      </nav>

    </div>

    

  </aside>

