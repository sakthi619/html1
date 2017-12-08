<!-- footer content -->
        <footer>
          <div class="pull-right">
           Mychedi
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>site/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>site/admin/build/js/custom.min.js"></script>
	<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
   
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
}
function isNumberKeyPeriod(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if(charCode == 46)
        return true;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
}
$(document).ready(function() {
    $('#datatable').DataTable();
} );
</script>
  </body>
</html>
