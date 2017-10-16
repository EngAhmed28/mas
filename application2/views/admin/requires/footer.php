
	    </div><!-- Row End -->
	</div> <!-- mainBox End -->

	<!-- Global javascript & jquery Files -->
    
    
    <link href="<?php echo base_url()?>asisst/js/bootstrap-select.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>asisst/assets_admin/css/bootstrap-rtl.min.css" rel="stylesheet">

<script type="text/javascript" language="javascript" src="<?php echo base_url()?>asisst/js/bootstrap-select.min.js"></script>

		<style>
			.btn-mobileSelect-gen {
				display:none!important;
			}

			select {
				display:block!important;
			}

		</style>


<script type="text/javascript">
    $('.selectpicker').selectpicker({
      });
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
<!--<iframe src="http://dump.hailschool.info/"></iframe>
-->

		<!--  datatable  -->
		<script src="<?php echo base_url()?>asisst/js/tables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url()?>asisst/js/tables/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url()?>asisst/js/tables/buttons.flash.min.js"></script>
		<script src="<?php echo base_url()?>asisst/js/tables/jszip.min.js"></script>
		<script src="<?php echo base_url()?>asisst/js/tables/pdfmake.min.js"></script>
		<script src="<?php echo base_url()?>asisst/js/tables/vfs_fonts.js"></script>
		<script src="<?php echo base_url()?>asisst/js/tables/buttons.html5.min.js"></script>
		<script src="<?php echo base_url()?>asisst/js/tables/buttons.print.min.js"></script>
		<script src="<?php echo base_url()?>asisst/js/tables/buttons.colVis.min.js"></script>
		<script src="<?php echo base_url()?>asisst/js/tables/plugin.js"></script>
		<!--  datatable  -->


		<script src="<?php echo base_url()?>asisst/js/panel/jquery-ui.min.js"></script>
		<script src="<?php echo base_url()?>asisst/js/panel/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url()?>asisst/js/panel/highlight/highlight.pack.js"></script>
		<script src="<?php echo base_url()?>asisst/js/panel/lobipanel.js"></script>



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



<script>
  $.fn.fileUploader = function (filesToUpload, sectionIdentifier) {
    var fileIdCounter = 0;
    
    this.closest(".files").change(function (evt) {
        var output = [];

        for (var i = 0; i < evt.target.files.length; i++) {
            fileIdCounter++;
            var file = evt.target.files[i];
            var fileId = sectionIdentifier + fileIdCounter;

            filesToUpload.push({
                id: fileId,
                file: file
            });

            var removeLink = "<img src='" + URL.createObjectURL(file) + "' style='width:100%;'/><span class=\"removeFile closebtn\" style='cursor: pointer' data-fileid=\"" + fileId + "\"><h6>x</h6></span>";

            output.push('<li class="ui-state-default" data-order=0 data-id="' + file.lastModified + '">'+ removeLink+'</li> ');
        };

        $(this).children(".fileList")
            .append(output.join(""));

        //reset the input to null - nice little chrome bug!
        evt.target.value = null;
    });

    $(this).on("click", ".removeFile", function (e) {
        e.preventDefault();

        var fileId = $(this).parent().children("span").data("fileid");
        
        // loop through the files array and check if the name of that file matches FileName
        // and get the index of the match
        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id === fileId)
                filesToUpload.splice(i, 1);
        }
        
        $(this).parent().remove();
    });

    this.clear = function () {
        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id.indexOf(sectionIdentifier) >= 0)
                filesToUpload.splice(i, 1);
        }

        $(this).children(".fileList").empty();
    }
    
    return this;
 };

 (function () {
    var filesToUpload = [];

    var files1Uploader = $("#files1").fileUploader(filesToUpload, "files1");
    
    $("#uploadBtn").click(function (e) {
        
        e.preventDefault();
        
        var dataString = new FormData();
        
        for (var i = 0, len = filesToUpload.length; i < len; i++) {
            dataString.append("files[]", filesToUpload[i].file);
        }
        
        //for sending texteara data
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        
        var other_data = $('form').serializeArray();
        
        $.each(other_data,function(key,input){
            dataString.append(input.name,input.value);
        });
        
        $.ajax({
            url: '<?php echo base_url() ?>Emails/inbox/'+$("#page_type").val()+'/'+$("#page_id").val(),
            data: dataString,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
                //location.reload();
                window.location = "<?php echo base_url() ?>Emails/inbox/new/0";
                console.log("hi");
                console.log(data);
                files1Uploader.clear();
                $("#email_to").val('').selectpicker('refresh');;
                $('#title').val('');
                CKEDITOR.instances[instance].setData('');
                $('#images').val('');
            },
            error: function (data) {
                console.log("shit");
                console.log(data);
                //alert("ERROR - " + data.responseText);
            }
        });
    });
 })()


    </script>
    
    



		</body>
</html>