 

 <footer class="main-footer">

    <?php $data = DB::table('settings')->where('id',1)->first();
    echo '<strong>'.$data->footer_text.'</strong>';
    ?>
    <div class="float-right d-none d-sm-inline-block">

      {{-- <b>Version</b> 3.2.0 --}}

    </div>

  </footer>