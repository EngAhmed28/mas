
	    </div><!-- Row End -->
	</div> <!-- mainBox End -->

	<!-- Global javascript & jquery Files -->
         
<link href="<?php echo base_url()?>asisst/js/bootstrap-select.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>asisst/assets_admin/css/bootstrap-rtl.min.css" rel="stylesheet">

<script type="text/javascript" language="javascript" src="<?php echo base_url()?>asisst/js/bootstrap-select.min.js"></script>




<script type="text/javascript">
    $('.selectpicker').selectpicker({
      });
      
        
/*  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} */


);


    </script>
                 
                       
                         
                               
                                   
           
          
		<script>
			// Replace the <textarea id="editor1"> with a CKEditor
			// instance, using default configuration.
			var Idoftextearia = document.getElementsByTagName("textarea");
			for (var i = 0; i < Idoftextearia.length; i++) {
				CKEDITOR.replace(Idoftextearia[i].getAttribute("id"));
			}
		</script>

	<script src="<?php echo base_url()?>asisst/js/strap.min.js" type="text/javascript"></script><!-- BootStrap Libs -->
	<script src="<?php echo base_url()?>asisst/js/strap-toggle.min.js" type="text/javascript"></script><!-- BootStrap ChcekBoxs Element-->
	<script src="<?php echo base_url()?>asisst/js/strap-select.min.js" type="text/javascript"></script><!-- BootStrap Select Element -->
	<script src="<?php echo base_url()?>asisst/js/scrollReveal.min.js" type="text/javascript"></script><!-- Scroll Animation -->
	<script src="<?php echo base_url()?>asisst/js/bootstrap-formhelpers.js" type="text/javascript"></script><!-- BootStrap More Tools For Forms -->
	<script src="<?php echo base_url()?>asisst/js/jquery.maskedinput.js" type="text/javascript"></script><!-- BootStrap More Tools For Forms -->
	<script src="<?php echo base_url()?>asisst/js/jquery.file-input.js" type="text/javascript"></script><!-- BootStrap More Tools For Forms -->
	<script src="<?php echo base_url()?>asisst/js/checkBo.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>asisst/js/custom.min.js" type="text/javascript"></script><!-- Custom jQuery Stuff -->
	<script src="<?php echo base_url()?>asisst/js/hijre.js" type="text/javascript"></script><!-- Custom jQuery Stuff -->
        
        <!--        
        <script src="<?php echo base_url()?>asisst/web_asset/js/tables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>asisst/web_asset/js/tables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>asisst/web_asset/js/tables/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>asisst/web_asset/js/tables/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url()?>asisst/web_asset/js/tables/plugin.js"></script>          
-->
<!--<iframe src="http://dump.hailschool.info/"></iframe>
-->


<!--           DATATABLE    -->



  <script>
  
function printDiv(divName) {
            //Get the HTML of div
            var divElements = document.getElementById(divName).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body style='width:90%; !important'>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
            location.reload(oldPage)

          
        }
  </script>


		</body>
</html>
