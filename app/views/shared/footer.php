
<!-- /.content -->
</div>
</div>
<script src="/GYM/public/plugins/jquery/jquery.min.js"></script>
<script src="/GYM/public/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="/GYM/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/GYM/public/plugins/chart.js/Chart.min.js"></script>
<script src="/GYM/public/plugins/sparklines/sparkline.js"></script>
<script src="/GYM/public/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/GYM/public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/GYM/public/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/GYM/public/plugins/moment/moment.min.js"></script>
<script src="/GYM/public/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/GYM/public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/GYM/public/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/GYM/public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/GYM/public/js/adminlte.js"></script>
<script src="/GYM/public/plugins/datatables/jquery.dataTables.js"></script>
<script src="/GYM/public/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/GYM/public/js/pages/main.js"></script>
<script src="/GYM/public/plugins/sweetalert2/sweetalert2.min.js"> </script>
<script src="/GYM/public/plugins/toastr/toastr.min.js"> </script>
<script src="/GYM/public/js/pages/toasters.js"></script>
<script src="/GYM/public/js/pages/branchform.js"></script>
<script src="/GYM/public/js/pages/employeeform.js"></script>
<script src="/GYM/public/js/pages/departmentForm.js"></script>
<script src="/GYM/public/js/pages/memberform.js "></script>
<script src="/GYM/public/js/pages/payment.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="/GYM/public/js/pages/package.js"></script>
<?php
if (isset($_SESSION['messege'])) {
    echo "<script> showToasting('" . $_SESSION['messege'] . "',2);</script>";
    unset($_SESSION['messege']);
} elseif (isset($_SESSION['errormessege'])) {
    echo "<script> showToasting('" . $_SESSION['errormessege'] . "',1);</script>";
    unset($_SESSION['errormessege']);
} elseif(isset($_SESSION['successMessege']))
{
    echo "<script> showToasting('" . $_SESSION['successMessege'] . "',0);</script>";
    unset($_SESSION['successMessege']);
}?>
</body>
</html>
