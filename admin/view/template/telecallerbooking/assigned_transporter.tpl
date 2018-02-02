<?php echo $header;?><?php echo $column_left; ?>
       
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
         
        <button type="submit" form="form-product" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-info"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
         </div>
      <h1>Assign To Transporter</h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Assign To Transporter</h3>
      </div>
      <div class="panel-body">
            <h5><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Booking Id</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $booking_id;?></h5>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">

              <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $vehicle_type; ?></label>
            <div class="col-sm-10">
              <!--<input type="text" name="city" value="<?php echo $city;?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />-->
                 <select id="vehicle_type_id" name="vehicle_type_id" value="" class="form-control">
                     <option value=0>Select Vehicle Types</option> 
                      <?php  foreach ($vehicle_types as $vehicle_type) { 
?>
         <option value="<?php echo $vehicle_type['vehicle_type_id']; ?>" <?php if(isset($vehicle_id))echo ($vehicle_type['vehicle_type_id'] == $vehicle_id)?"selected='selected'":""?>><?php echo $vehicle_type['vehicle_type_name']; ?></option>
    <?php } ?>
                 
                        </select>
              <?php if ($error_vehicle_type) { ?>
              <div class="text-danger"><?php echo $error_vehicle_type; ?></div>
              <?php } ?>
            </div>
          </div>
           
             <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $area_name; ?></label>
            <div class="col-sm-10">
              <!--<input type="text" name="city" value="<?php echo $city;?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />-->
                 <select id="area_id" name="area_id" value="" class="form-control"  onchange="checkSubArea()">
                     <option value="0">Select Area</option>
                      <?php  foreach ($all_areas as $all_area) { 
?>
         <option value="<?php echo $all_area['area_id']; ?>" <?php if(isset($area))echo ($all_area['area_id'] == $area)?"selected='selected'":""?>><?php echo $all_area['area_name']; ?></option>
    <?php } ?>
                    
                        </select>  
                 <?php if ($error_area) { ?>
              <div class="text-danger"><?php echo $error_area; ?></div>
              <?php } ?>
            </div>
          </div>
            
               <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $subarea; ?></label>
            <div class="col-sm-10">
              <!--<input type="text" name="city" value="<?php echo $city;?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />-->
                
                    
                 <select name="subarea" id="subarea" value="" class="form-control" onchange="getTransporter()">
                       <option value="0">Select Subarea</option>
                     
                        </select>
                 <?php if ($error_subarea) { ?>
              <div class="text-danger"><?php echo $error_subarea; ?></div>
              <?php } ?>
            </div>
          </div>
            
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $transport_name; ?></label>
            <div class="col-sm-10">
              <!--<input type="text" name="city" value="<?php echo $city;?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />-->
                 <select id="transport_id" name="transport_id" value="" class="form-control"  onchange="checkVehicle()">
                     <option value="0">Select Transporter Name</option>
                    
                        </select>
                <?php if ($error_transport) { ?>
              <div class="text-danger"><?php echo $error_transport; ?></div>
              <?php } ?>
            </div>
          </div>
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $vehicle_number; ?></label>
            <div class="col-sm-10">
                 <select name="vehicleno" id="vehicle_no" value="" class="form-control" onchange="details()">
                       <option value="0">Select Vehicle Number</option>
                        </select>
                 <?php if ($error_vehicle) { ?>
              <div class="text-danger"><?php echo $error_vehicle; ?></div>
              <?php } ?>
            </div>
          </div>
              
            
                  <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $driver_name; ?></label>
            <div class="col-sm-10">
              <input type="text" name="driver" id="driver" value="" placeholder="<?php echo $driver_name; ?>" id="input-name" class="form-control" />
         
         <?php if (isset($error_driver)) { ?>
              <div class="text-danger"><?php echo $error_driver; ?></div>
              <?php } ?>
            </div>
          </div>
                  <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $licence_no; ?></label>
            <div class="col-sm-10">
              <input type="text" name="licence_no" id="licence_no" value="" placeholder="<?php echo $licence_no; ?>" id="input-name" class="form-control" />

            </div>
          </div>
                  <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $mobile_no; ?></label>
            <div class="col-sm-10">
              <input type="text" name="mobile_no" id="mobile_no" maxlength="10" value="" placeholder="<?php echo $mobile_no; ?>" id="input-name" class="form-control" />
      
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-make"><?php echo $make; ?></label>
            <div class="col-sm-10">
              <input type="text" name="make" id="make" value="" placeholder="<?php echo $make; ?>" id="input-make" class="form-control" readonly/>
         
         <?php if (isset($error_driver)) { ?>
              <div class="text-danger"><?php echo $error_driver; ?></div>
              <?php } ?>
            </div>
          </div>
                <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-model"><?php echo $model; ?></label>
            <div class="col-sm-10">
              <input type="text" name="model" id="model" value="" placeholder="<?php echo $model; ?>" id="input-model" class="form-control" readonly/>
         
         <?php if (isset($error_driver)) { ?>
              <div class="text-danger"><?php echo $error_driver; ?></div>
              <?php } ?>
            </div>
          </div>
              
              <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $city; ?></label>
            <div class="col-sm-10">
              <input type="text" name="city" id="city" value="" placeholder="<?php echo $city; ?>" id="input-city" class="form-control" readonly/>
          
               
      
            </div>
         </div>
           
              <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $lorry; ?></label>
            <div class="col-sm-10">
              <input type="text" name="lorry" id="lorry" value="" placeholder="<?php echo $lorry; ?>" id="input-lorry" class="form-control" readonly/>
          
               
      
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $labour; ?></label>
            <div class="col-sm-10">
              <input type="text" name="labour" id="labour" value="" placeholder="<?php echo $labour; ?>" id="input-labour" class="form-control" readonly/>
          
               
      
            </div>
          </div>
                          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $insurance_date; ?></label>
            <div class="col-sm-10">
              <input type="text" name="insurance_date" id="insurance_date" value="" placeholder="<?php echo $insurance_date; ?>" id="input-lorry" class="form-control" readonly/>
          
               
      
            </div>
          </div>
    
         
      
                    </div>
                      </div>
   
           <!--<input type="button" class="btn btn-primary" value="Assign" onclick="loopForm(document.thisForm);" style="float:right;"> -->
              
            
    
          <tbody>
        
             </table>
              
              </form>
          <button type="submit" form="form-product" data-toggle="tooltip" title="Assign" class="btn btn-info">Assign</button>
                 
               </div>
  </div>

             </div>
      
</form>
          </div>

            </div>
      <script type="text/javascript">
             function check() {
                  var vehicle_type_id=document.getElementById('vehicle_type_id').value;
                        $.ajax({
		url: 'index.php?route=telecallerbooking/assigned_transporter/area&token=<?php echo $token; ?>&vehicle_type_id=' + vehicle_type_id,
		dataType: 'json',
		beforeSend: function() {
            $('#load').show();
			//$('select[name=\'country_id\']').before('<i class="fa fa-circle-o-notch fa-spin load">sjbsgkjsb</i>');
		},
		complete: function() {
           
			$('.fa-spin').remove();
            
		},
		success: function(json) {
           // alert(json['vehicle']);
			if(json!='')
			{
			
			
			html = '<option value="">Please Select Area</option>';
			if (json['vehicle'] != '') {
               
				for (i = 0; i < json['area'].length; i++) {              
					html += '<option value="' + json['area'][i]['area_id'] + '"';
          
				
					html += '>' + json['area'][i]['area_name'] + '</option>';
				}
			}
			else {
				//html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
				html = '<option value="">Please Select area</option>';
			}
			}
			else
			{
				$('.fa-spin').remove();
				html = '<option value="">Please Select area</option>';
				//html = '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
				
			}
            $('select[name=\'area_id\']').html(html);
           
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
             }
          function checkSubArea() {
                    var area_id=document.getElementById('area_id').value; 
                          $.ajax({
		url: 'index.php?route=telecallerbooking/assigned_transporter/subarea&token=<?php echo $token; ?>&area_id=' + area_id,
		dataType: 'json',
		beforeSend: function() {
            $('#load').show();
			//$('select[name=\'country_id\']').before('<i class="fa fa-circle-o-notch fa-spin load">sjbsgkjsb</i>');
		},
		complete: function() {
           
			$('.fa-spin').remove();
            
		},
		success: function(json) {
          //  alert(json['vehicle_no']);
			if(json!='')
			{
			
			
			html = '<option value="">Please Select Sub Area</option>';
			if (json['area'] != '') {
               
				for (i = 0; i < json['area'].length; i++) {              
					html += '<option value="' + json['area'][i]['subarea_id'] + '"';
          
				
					html += '>' + json['area'][i]['subarea_name'] + '</option>';
				}
			}
			else {
				//html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
				html = '<option value="">test</option>';
			}
			}
			else
			{
				$('.fa-spin').remove();
				html = '<option value="">test</option>';
				//html = '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
				
			}
            $('select[name=\'subarea\']').html(html);
           
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
                     }
          function getTransporter() {
            
                    var subarea=document.getElementById('subarea').value;
               $.ajax({
		url: 'index.php?route=telecallerbooking/assigned_transporter/transporters&token=<?php echo $token; ?>&subarea_id=' + subarea,
		dataType: 'json',
		beforeSend: function() {
            $('#load').show();
			//$('select[name=\'country_id\']').before('<i class="fa fa-circle-o-notch fa-spin load">sjbsgkjsb</i>');
		},
		complete: function() {
           
			$('.fa-spin').remove();
            
		},
		success: function(json) {
          // alert(json['vehicle_no']);
			if(json!='')
			{
			
			
			html = '<option value="0">Please Select Vehicle Number</option>';
			if (json['subarea'] != '') {
               
				for (i = 0; i < json['subarea'].length; i++) {              
					html += '<option value="' + json['subarea'][i]['vendor_id'] + '"';
          
				
					html += '>' + json['subarea'][i]['vendor_name'] + '</option>';
				}
			}
			else {
				//html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
				html = '<option value="0">Please Select Vehicle Number</option>';
			}
			}
			else
			{
				$('.fa-spin').remove();
				html = '<option value="0">Please Select Vehicle Number</option>';
				//html = '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
				
			}
            $('select[name=\'transport_id\']').html(html);
           
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
                          
                     }
                     function checkVehicle() {
                    var transport_id=document.getElementById('transport_id').value; 
                          $.ajax({
		url: 'index.php?route=telecallerbooking/assigned_transporter/vehicleNumber&token=<?php echo $token; ?>&transport_id=' + transport_id,
		dataType: 'json',
		beforeSend: function() {
            $('#load').show();
			//$('select[name=\'country_id\']').before('<i class="fa fa-circle-o-notch fa-spin load">sjbsgkjsb</i>');
		},
		complete: function() {
           
			$('.fa-spin').remove();
            
		},
		success: function(json) {
          //  alert(json['vehicle_no']);
			if(json!='')
			{
			
			
			html = '<option value="0">Please Select Vehicle Number</option>';
			if (json['transporter'] != '') {
               
				for (i = 0; i < json['transporter'].length; i++) {              
					html += '<option value="' + json['transporter'][i]['vehicle_no'] + '"';
          
				
					html += '>' + json['transporter'][i]['vehicle_no'] + '</option>';
				}
			}
			else {
				//html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
				html = '<option value="">Please Select Vehicle Number</option>';
			}
			}
			else
			{
				$('.fa-spin').remove();
				html = '<option value="">Please Select Vehicle Number</option>';
				//html = '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
				
			}
            $('select[name=\'vehicleno\']').html(html);
           
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
                     }
                   function details() {
   
                    var vehicle_no=document.getElementById('vehicle_no').value;
                                         $.ajax({
		url: 'index.php?route=telecallerbooking/assigned_transporter/details&token=<?php echo $token; ?>&vehicle_no=' + vehicle_no,
		dataType: 'json',
		beforeSend: function() {
            $('#load').show();
			//$('select[name=\'country_id\']').before('<i class="fa fa-circle-o-notch fa-spin load">sjbsgkjsb</i>');
		},
		complete: function() {
           
			$('.fa-spin').remove();
            
		},
		success: function(data) {
            //alert(data['vehicle_details'][0]['driver_name']);die;
			
            document.getElementById('driver').value =data['vehicle_details'][0]['driver_name'];
             document.getElementById('licence_no').value =data['vehicle_details'][0]['licence_no'];
             document.getElementById('mobile_no').value =data['vehicle_details'][0]['mobile_no'];
             document.getElementById('city').value =data['vehicle_details'][0]['city_name'];
             document.getElementById('lorry').value =data['vehicle_details'][0]['lorry'];
             document.getElementById('labour').value =data['vehicle_details'][0]['labour'];
             document.getElementById('insurance_date').value =data['vehicle_details'][0]['insurance_due_date'];
              document.getElementById('make').value =data['vehicle_details'][0]['carmake_name'];
              document.getElementById('model').value =data['vehicle_details'][0]['carmodel_name'];
           
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
                   }
          
             </script>
      <script type="text/javascript"><!--
$('select[name=\'transport_id\']').on('change', function() {
	$.ajax({
		url: 'index.php?route=telecallerbooking/assigned_transporter/vehiclenumber&token=<?php echo $token; ?>&transport_id=' + this.value,
		dataType: 'json',
		beforeSend: function() {
			$('select[name=\'car_make_id\']').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
		},
		complete: function() {
			$('.fa-spin').remove();
		},
		success: function(json) {
			if(json!='')
			{
			if (json['postcode_required'] == '1') {
				$('input[name=\'postcode\']').parent().parent().addClass('required');
			} else {
				$('input[name=\'postcode\']').parent().parent().removeClass('required');
			}
                
			
			html = '<option value=""><?php echo $text_select; ?></option>';
			if (json['car_make_model'] != '') {
				for (i = 0; i < json['car_make_model'].length; i++) {
					html += '<option value="' + json['car_make_model'][i]['car_model_id'] + '"';
                    
				
					if (json['car_make_model'][i]['car_model_id'] == '<?php echo $model_id; ?>') {
						html += 'selected="selected">' + json['car_make_model'][i]['car_model_name'] + '</option>';
					}
				
				
					html += '>' + json['car_make_model'][i]['car_model_name'] + '</option>';
				}
			}
			else {
				//html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
				html = '<option value=""><?php echo $text_select; ?></option>';
			}
			}
			else
			{
				$('.fa-spin').remove();
				html = '<option value=""><?php echo $text_select; ?></option>';
				//html = '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
				
			}
			
			$('select[name=\'model\']').html(html);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$('select[name=\'car_make_id\']').trigger('change');
//--></script> 
<?php echo $footer; ?> 