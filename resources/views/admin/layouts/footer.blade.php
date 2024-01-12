<footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="https://github.com/Eng-MuhammadAbdulrazek/">Eng.Muhammad Abdulrazek</a>.</strong>
    All rights reserved.

</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('dashboard/')}}/plugins/jquery/jquery.min.js"></script>

@yield('scripts')

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('dashboard/')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('dashboard/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="{{asset('dashboard/')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('dashboard/')}}/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dashboard/')}}/dist/js/pages/dashboard.js"></script>
</body>
</html>
