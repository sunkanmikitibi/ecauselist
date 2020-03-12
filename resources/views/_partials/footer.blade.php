<!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://xtremestudiolabs.io">Xtreme.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js')}}"></script>
@include('sweetalert::alert')
@yield('datepicker_scripts')
