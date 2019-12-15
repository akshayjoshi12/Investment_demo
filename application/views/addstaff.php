<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Staff</title>
    <?php require_once('header.php'); ?>
</head>
<body>
    	<?php 
	    	require_once('sidebar.php');
	    	
		// Check if image file is a actual image or fake image
		if (isset($_FILES['txtPhoto']['name'])) {
			$target_dir = "images/staff";
			$target_file = $target_dir . basename($_FILES["txtPhoto"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		    	$check = getimagesize($_FILES["txtPhoto"]["tmp_name"]);
		    	if($check !== false) {
		        	echo "File is an image - " . $check["mime"] . ".";
		        	$uploadOk = 1;
		    	} else {
		        	echo "File is not an image.";
		        	$uploadOk = 0;
		    	}
		}
    	?>
     <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"> 
          <br>
         <div class="row">
              <div class="col-lg-12">
                    <?php //echo $breadcrumbs; ?>
                    <div class="panel panel-default">
                         <div class="panel-heading">
                              <h4>
                              	<b>Add Staff</b>
                         	</h4>
                         </div>
                         <div class="panel-body">
                            <div class="col-md-12">
                              <form method="post" id="addStaffForm" action="<?php echo base_url();?>index.php/admin/admin/processAddStaff" enctype="multipart/form-data">
                                   <div class="row js-rowstaff">
                                        <div class="col-md-12" id="staffdiv_1">
    									<!-- <div class="row">
                                                  <div class="col-md-6 form-group mt15">
                                                       <label>Upload Image:</label>
                                                       <p><input type="file" name="txtPhoto" id="txtPhoto"></p>
                                                       <input type="hidden" name="txtPhotoPath" id="txtPhotoPath" value="" />
                                                       <p><img id="imgProfilePic" width="130px" src="" /></p>
                                                  </div>
                                             </div> -->

                                             <div class="row">
	                                             <div class="col-md-6 form-group">
	                                                  <div class="row">
	                                                  	<div class="col-md-2">
	                                                       	<img id="imgDefault" width="64px" src="<?php echo base_url();?>admin_assets/images/staff_add_image.png" />
	                                                  	</div>
	                                                  	<div class="col-md-10">
	                                                       	<input type="file" name="txtPhoto" id="txtPhoto">
	                                                       	<a href="" class="js-upload-image">Upload Image</a>
	                                                       	<input type="hidden" name="txtPhotoPath" id="txtPhotoPath" value="" />
                                                       		<p><img id="imgProfilePic" width="130px" src="" /></p>
	                                                  	</div>
	                                             	</div>
	                                             </div>
	                                        </div>

                                             <div class="row">
                                                  <div class="col-md-6 formdiv form-group mt15">
                                                       <label>STAFF NAME</label>
                                                       <p><input type="text" id="txtStaffName" name="txtStaffName" placeholder="Staff Name" value="" /></p>
                                                  </div>
                                             </div>
                                             <div class="height17"></div>
                                             <div class="row">
                                                  <div class="col-md-6 formdiv form-group">
                                                      <label>Location<span class="required">*</span></label>
                                                       <div>
                                                           <select multiple="multiple" id="selLocation" name="selLocation" class="w100">
                                                                 <?php foreach($recordLoc as $location) 
                                                                 {
                                                                 ?>
                                                                      <option value="<?php echo $location->id; ?>" ><?php echo $location->location_name; ?></option>
                                                                 <?php
                                                                  }
                                                                  ?>
                                                            </select>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="height17"></div>
                                             <div class="row js-dept-tag">
                                                  <div class="col-md-6 formdiv form-group">
                                                  	<label>DEPARTMENT</label>
                                                      	<span><input type="text" data-role="tagsinput" class="txtDepartment form-control" id="txtDepartment" name="txtDeptTag" placeholder="Type in name and press enter." value="" /></span>
                                                  </div>
                                             </div>
                                             <div class="row js-role-tag">
                                                  <div class="col-md-6 formdiv form-group">
                                                  	<label>ROLE</label>
                                                      	<span><input type="text" data-role="tagsinput" class="txtRole form-control" id="txtRole" name="txtRoleTag" placeholder="Type in name and press enter." value="" /></span>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   
                                   <div class="height17"></div>
                                   <div class="form-group">
                                        <div class="row">
                                             <div class="col-lg-5 pad0">
                                                  <input type="button" id="btnCancel" class="btnCancel" value="Cancel" />
                                             </div>
                                             <div class="col-lg-3 pad0">
                                                  <button type="submit" id="btnSaveStaff" class="btnSaveStaff btnSave">Save</button>
                                             </div>
                                        </div>
                                        <input type="hidden" value="" id="txtMode" name="txtMode" />
                                   </div>
                                   <div class="errorMsg"></div>
                              </form>
                            </div>
                         </div><!-- /.panel-body-->
                    </div><!-- /.panel-default -->
               </div><!--/.col-->
          </div><!--/.row-->
     </div><!--/.main-->

<div class="modal fade js-modal-success" tabindex="-1" role="dialog" aria-labelledby="ModalSuccess" aria-hidden="true">
     <div class="modal-dialog common-popup modal-dialog-centered" role="document">
          <div class="modal-content">
               <div class="modal-body">
                    <div class=" common-model-img">
                         <img src="<?php echo base_url();?>admin_assets/images/Success.png" alt="Success" class="img-responsive center-block">
                    </div>
                    <div class="common-title-name">
                         <h2 class="text-center common-title">Success</h2>
                         <h3 class="text-center verified-common-msg">Your staff has been added.</h3>
                    </div>
                    <div class="common-button">   
                         <button type="button" class="btn btn-primary btnCommon js-ok-button" data-dismiss="modal">OK</button>
                    </div>
               </div>
          </div>
     </div>
</div>

<script type="text/javascript">
         
    $(document).ready(function(){
    		$(".js-ok-button").click(function(){
    			var baseurl="<?php echo base_url();?>";
               var managequesturl = baseurl+"index.php/admin/admin/manageStaff";
               location.href = managequesturl;
    		});
		$('#selLocation').multiSelect({
               noneText: 'Select Location (can multiple location)'
          });
          $(".js-upload-image").on('click', function(e){
		    	e.preventDefault();
		    	$("#txtPhoto:hidden").trigger('click');
		});
          $('#txtPhoto').change(function(){
		     var file_data = $('#txtPhoto').prop('files')[0];
		     var old_file = $('#txtPhotoPath').val();
		     var form_data = new FormData();                  
		     form_data.append('file', file_data);
		     form_data.append('old_file', old_file);
		     $.ajax({
		            url: "<?php echo base_url();?>index.php/admin/admin/processImage",
		            type: "POST",
		            data: form_data,
		            contentType: false,
		            cache: false,
		            processData:false,
		            success: function(data){
		            	if(data == 0){
		            		alert("Upload image file only.");
		            		return false;
		            	}else{
		            		var imagePath = '<?php echo base_url();?>/'+$.trim(data);
		            		$("#imgDefault").attr('src', imagePath);
		            		$("#txtPhotoPath").val($.trim(data));
		            	}
		            }
		     });
		});
          // $.validator.addMethod("needsSelection", function(value, element) {
          //      return $(element).multiselect("getChecked").length > 0;
          // });
		$(document).on("keypress", ":input:not(#txtStaffName)", function(event) {
		    	if (event.keyCode == 13) {
		        	event.preventDefault();
		    	}	
		});
    
          $("#addStaffForm").validate({
               rules: {
                    txtStaffName: "required",
                    selLocation: "required"
               },
               messages: {
                    txtStaffName: "Please enter name",
                    selLocation: "Please select location"
               },
               ignore: ':hidden:not("#selLocation")',
               submitHandler: function(response) {
                    $.ajax({
                         url:"<?php echo base_url();?>index.php/admin/admin/processAddStaff",
                         type:"POST",
                         dataType:"JSON",
                         data:{
                             txtStaffName:$("#txtStaffName").val(),
                             selLocation:$("#selLocation").val(),
                             txtDepartment:$("#txtDepartment").val(),
                             txtRole:$("#txtRole").val(),
                             txtPhoto: $("#txtPhotoPath").val()
                         },
                         success:function(response)
                         {
                              if(response.error=='false')
                              {
                                   $(".js-modal-success").modal();
                              }
                              else
                              {
                              	//alert(response.message);
                              	return false;
                              }
                         },
                         error: function (error) {
                             $(".errorMsg").html('error: ' + eval(error));
                         }
                    });
               }
          });
		$("#btnCancel").click(function(){
               location.href = '<?php echo base_url();?>index.php/admin/admin/manageStaff';
          });
      });
</script>

</body>
</html>