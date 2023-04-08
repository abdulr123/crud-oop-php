<footer class="main-footer">
    <strong>Copyright &copy; 2023 | CRUD OOP</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>



<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="dist/js/pages/dashboard.js"></script>

<script src="dist/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    $(function() {
      //datepicker plugin
      $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
      });
      // toolip
      $('[data-toggle="tooltip"]').tooltip();
      $('#dataTables-example').dataTable({
        "lengthMenu": [
          [5, 10, 25, 50, -1],
          [5, 10, 25, 50, "All"]
        ],
        "pageLength": 5
      });
    })
  </script>

</body>
</html>
