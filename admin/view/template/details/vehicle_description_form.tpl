<?php echo $header;?><?php echo $column_left; ?>
</script>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">


       
        <button type="submit" form="form-product" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>

            </div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
       <?php
if(isset($message))
{?>
  <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $message; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
      <?php
}
?>
       <?php if ($error_common) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_common; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">
            <?php
            if(isset($vendor_id)=="")
{
?>
                     <div class="form-group required">
             
            <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_transporter; ?></label>
            <div class="col-sm-10">
                <select class="form-control" name="transport_id">
                    <option value="0">Select Transporter</option>
               <?php foreach ($all_vendors as $all_vendor) { ?>
         <option value="<?php echo $all_vendor['vendor_id']; ?>" <?php if(isset($id))echo ($all_vendor['vendor_id'] == $id)?"selected='selected'":""?>><?php echo $all_vendor['vendor_id']?>. <?php echo $all_vendor['vendor_name']; ?></option>
    <?php }?>
</select>
                         
                         <?php if ($error_transporter) { ?>
              <div class="text-danger"><?php echo $error_transporter; ?></div>
              <?php } ?>
          </div>
              </div>  
         <div class="form-group required">
            
            <label class="col-sm-2 control-label" for="input-address"><?php echo $entry_vehicle_no; ?></label>
            <div class="col-sm-10">
              <input type="text" name="vehicle_no" value="<?php if(isset($vehicle_no))echo $vehicle_no?>" placeholder="" id="input-address" class="form-control" />
                <?php if ($error_vehicle_no) { ?>
              <div class="text-danger"><?php echo $error_vehicle_no; ?></div>
              <?php } ?>

          </div>
              </div>
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email"><?php echo $entry_vehicle_type; ?></label>
            <div class="col-sm-10">
              <select class="form-control" name="vehicle_type">
                    <option value="0">Select Vehicle Type</option>
                
               <?php  foreach ($all_vehicles as $vehicles) { 
?>
         <option value="<?php echo $vehicles['vehicle_type_id']; ?>" <?php if(isset($vehicle_id))echo ($vehicles['vehicle_type_id'] == $vehicle_id)?"selected='selected'":""?>><?php echo $vehicles['vehicle_type_id']?>. <?php echo $vehicles['vehicle_type_name']; ?></option>
    <?php } ?>
</select>
                 <?php if ($error_vehicle_type) { ?>
              <div class="text-danger"><?php echo $error_vehicle_type; ?></div>
              <?php } ?>

          </div>
              </div>
             <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_insurance_due_date; ?></label>
            <div class="col-sm-10">
                      <!-- <input type="text" style="height:35px;width:100%;display:block;border-radius:3px;border: 1px solid #cccccc;" name="insurance_due_date" id="input-insurance_due_date" class="date" />-->
                       <input type="text" style="height:35px;width:100%;display:block;border-radius:3px;border: 1px solid #cccccc;" name="insurance_due_date" value="<?php if(isset($date))echo $date; ?>" id="input-deliver" class="date" />
 <?php if ($error_insurance_due_date) { ?>
              <div class="text-danger"><?php echo $error_insurance_due_date; ?></div>
              <?php } ?>
            </div>
          </div>
<div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_area; ?></label>
            <div class="col-sm-10">
                              <select class="form-control" name="area" id="area" onchange="checkSubArea()">
                    <option value="0">Select Area</option>
                   <?php foreach ($all_areas as $area_now) { ?>
						  <option value="<?php echo $area_now['area_id']; ?>" <?php if(isset($area))echo ($area_now['area_id'] == $area)?"selected='selected'":""?>><?php echo $area_now['area_name']; ?></option>

                          <?php } ?>
</select>
<?php if ($error_area) { ?>
              <div class="text-danger"><?php echo $error_area; ?></div>
              <?php } ?>
            </div>
          </div>
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_subarea; ?></label>
            <div class="col-sm-10">
                         <select name="subarea" value="" class="form-control">
                             
                       <option>Select Subarea</option>
                              <?php foreach ($all_subareas as $subarea_now) { ?>
						  <option value="<?php echo $subarea_now['subarea_id']; ?>" <?php if(isset($subarea))echo ($subarea_now['subarea_id'] == $subarea)?"selected='selected'":""?>><?php echo $subarea_now['subarea_name']; ?></option>

                          <?php } ?>
                        </select>
                <?php if ($error_subarea) { ?>
              <div class="text-danger"><?php echo $error_subarea; ?></div>
              <?php } ?>
            </div>
          </div>
            
               <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_city; ?></label>
            <div class="col-sm-10">
                              <select class="form-control" name="city" id="city">
                    <option value="0">Select City</option>
               <?php foreach ($all_cities as $city_now) { ?>
						  <option value="<?php echo $city_now['city_id']; ?>" <?php if(isset($city))echo ($city_now['city_id'] == $city)?"selected='selected'":""?>><?php echo $city_now['city_name']; ?></option>

                          <?php } ?>
</select>
                   <?php if ($error_city) { ?>
              <div class="text-danger"><?php echo $error_city; ?></div>
              <?php } ?>
            </div>
          </div>
                <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_make; ?></label>
            <div class="col-sm-10">
                     <select class="form-control" name="make" id="make" onchange="checkModel()">
                    <option value="0">Select Make</option>
              <?php foreach ($all_makes as $make_now) { ?>
						  <option value="<?php echo $make_now['carmake_id']; ?>" <?php if(isset($make))echo ($make_now['carmake_id'] == $make)?"selected='selected'":""?>><?php echo $make_now['carmake_name']; ?></option>

                          <?php } ?>
</select>
                      <?php if ($error_make) { ?>
              <div class="text-danger"><?php echo $error_make; ?></div>
              <?php } ?>
            </div>
          </div>
                   <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_model; ?></label>
            <div class="col-sm-10">
                    <select name="model" value="" class="form-control">
                       <option>Select Model</option>
                        <?php foreach ($all_models as $model_now) { ?>
						  <option value="<?php echo $model_now['carmodel_id']; ?>" <?php if(isset($model))echo ($model_now['carmodel_id'] == $model)?"selected='selected'":""?>><?php echo $model_now['carmodel_name']; ?></option>

                          <?php } ?>
                        </select>
                         <?php if ($error_model) { ?>
              <div class="text-danger"><?php echo $error_model; ?></div>
              <?php } ?>
            </div>
          </div>
                   <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_lorry; ?></label>
            <div class="col-sm-10">

              <select name="lorry" value="" class="form-control">
                  
<?php if($id=="")
{
?>
            
                       <option value="Covered">Covered</option>
                       <option value="Uncovered">Uncovered</option>
                 <?php } else if($lorry=="Covered")
{
?>
                   <option value="Covered" <?php echo ($lorry == "covered")?"selected='selected'":""?>>Covered</option>
                <option value="Uncovered">Uncovered</option>
                <?php }else if($lorry=="Uncovered")
{
?> <option value="Covered">Covered</option>
                  <option value="Uncovered" <?php echo ($lorry == "Uncovered")?"selected='selected'":""?>>Uncovered</option>
                       <?php }?>
                       
                       
                 
                        </select>
<!--<?php if ($error_lorry) { ?>
              <div class="text-danger"><?php echo $error_lorry; ?></div>
              <?php } ?>-->
            </div>
          </div>
                 <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_driver_name; ?></label>
            <div class="col-sm-10">
                     <input type="text"  name="driver_name" value="<?php if(isset($driver_name))echo $driver_name?>" id="input-driver_name" class="form-control"/>
                <?php if ($error_driver_name) { ?>
              <div class="text-danger"><?php echo $error_driver_name; ?></div>
              <?php } ?>
            </div>
          </div>
                <div class="form-group">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_labour; ?></label>
            <div class="col-sm-10">
                 <select name="labour" value="" class="form-control">
                <?php if($id=="")
{
?>
            
                       <option value="Yes">Yes</option>
                       <option value="No">No</option>
                 <?php } else if($labour=="Yes")
{
?>
                   <option value="Yes" <?php echo ($labour == "Yes")?"selected='selected'":""?>>Yes</option>
                <option value="No">No</option>
                <?php }else if($labour=="No")
{
?>              <option value="Yes">Yes</option>
                  <option value="No" <?php echo ($labour == "No")?"selected='selected'":""?>>No</option>
                       <?php }?>
              
                 
                        </select>
<!--<?php if ($error_labour) { ?>
              <div class="text-danger"><?php echo $error_labour; ?></div>
              <?php } ?>-->
            </div>
          </div>
               <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_mobile_no; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="mobile_no" maxlength="10" value="<?php if(isset($mobile_no))echo $mobile_no?>" placeholder="" id="input-number" class="form-control" />
                <?php if ($error_mobile_no) { ?>
              <div class="text-danger"><?php echo $error_mobile_no; ?></div>
              <?php } ?>
            </div>
          </div>
                 <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_licence_no; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="licence_no" value="<?php if(isset($licence_no))echo $licence_no?>" placeholder="" id="input-number" class="form-control" />
                <?php if ($error_licence_no) { ?>
              <div class="text-danger"><?php echo $error_licence_no; ?></div>
              <?php } ?>
            </div>
          </div>
<?php }else {
?>
   
            
            <h5><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transport Id</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $vendor_id;?></h5>
 <input type="hidden" name="transport_id" value="<?php echo $vendor_id;?>" class="form-control" />
              
         <div class="form-group required">
            
            <label class="col-sm-2 control-label" for="input-address"><?php echo $entry_vehicle_no; ?></label>
            <div class="col-sm-10">
              <input type="text" name="vehicle_no" value="<?php if(isset($vehicle_no))echo $vehicle_no?>" placeholder="" id="input-address" class="form-control" />
                <?php if ($error_vehicle_no) { ?>
              <div class="text-danger"><?php echo $error_vehicle_no; ?></div>
              <?php } ?>

          </div>
              </div>
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email"><?php echo $entry_vehicle_type; ?></label>
            <div class="col-sm-10">
              <select class="form-control" name="vehicle_type">
                    <option value="0">Select Vehicle Type</option>
                
               <?php  foreach ($all_vehicles as $vehicles) { 
?>
         <option value="<?php echo $vehicles['vehicle_type_id']; ?>" <?php if(isset($vehicle_id))echo ($vehicles['vehicle_type_id'] == $vehicle_id)?"selected='selected'":""?>><?php echo $vehicles['vehicle_type_id']?>. <?php echo $vehicles['vehicle_type_name']; ?></option>
    <?php } ?>
</select>
                 <?php if ($error_vehicle_type) { ?>
              <div class="text-danger"><?php echo $error_vehicle_type; ?></div>
              <?php } ?>

          </div>
              </div>
             <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_insurance_due_date; ?></label>
            <div class="col-sm-10">
                      <!-- <input type="text" style="height:35px;width:100%;display:block;border-radius:3px;border: 1px solid #cccccc;" name="insurance_due_date" id="input-insurance_due_date" class="date" />-->
                       <input type="text" style="height:35px;width:100%;display:block;border-radius:3px;border: 1px solid #cccccc;" name="insurance_due_date" value="<?php if(isset($date))echo $date; ?>" id="input-deliver" class="date" />
 <?php if ($error_insurance_due_date) { ?>
              <div class="text-danger"><?php echo $error_insurance_due_date; ?></div>
              <?php } ?>
            </div>
          </div>
<div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_area; ?></label>
            <div class="col-sm-10">
                              <select class="form-control" name="area" id="area" onchange="checkSubArea()">
                    <option value="0">Select Area</option>
                   <?php foreach ($all_areas as $area_now) { ?>
						  <option value="<?php echo $area_now['area_id']; ?>" <?php if(isset($area))echo ($area_now['area_id'] == $area)?"selected='selected'":""?>><?php echo $area_now['area_name']; ?></option>

                          <?php } ?>
</select>
<?php if ($error_area) { ?>
              <div class="text-danger"><?php echo $error_area; ?></div>
              <?php } ?>
            </div>
          </div>
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_subarea; ?></label>
            <div class="col-sm-10">
                         <select name="subarea" value="" class="form-control">
                             
                       <option>Select Subarea</option>
                              <?php foreach ($all_subareas as $subarea_now) { ?>
						  <option value="<?php echo $subarea_now['subarea_id']; ?>" <?php if(isset($subarea))echo ($subarea_now['subarea_id'] == $subarea)?"selected='selected'":""?>><?php echo $subarea_now['subarea_name']; ?></option>

                          <?php } ?>
                        </select>
                <?php if ($error_subarea) { ?>
              <div class="text-danger"><?php echo $error_subarea; ?></div>
              <?php } ?>
            </div>
          </div>
            
               <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_city; ?></label>
            <div class="col-sm-10">
                              <select class="form-control" name="city" id="city">
                    <option value="0">Select City</option>
               <?php foreach ($all_cities as $city_now) { ?>
						  <option value="<?php echo $city_now['city_id']; ?>" <?php if(isset($city))echo ($city_now['city_id'] == $city)?"selected='selected'":""?>><?php echo $city_now['city_name']; ?></option>

                          <?php } ?>
</select>
                   <?php if ($error_city) { ?>
              <div class="text-danger"><?php echo $error_city; ?></div>
              <?php } ?>
            </div>
          </div>
                <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_make; ?></label>
            <div class="col-sm-10">
                     <select class="form-control" name="make" id="make" onchange="checkModel()">
                    <option value="0">Select Make</option>
              <?php foreach ($all_makes as $make_now) { ?>
						  <option value="<?php echo $make_now['carmake_id']; ?>" <?php if(isset($make))echo ($make_now['carmake_id'] == $make)?"selected='selected'":""?>><?php echo $make_now['carmake_name']; ?></option>

                          <?php } ?>
</select>
                      <?php if ($error_make) { ?>
              <div class="text-danger"><?php echo $error_make; ?></div>
              <?php } ?>
            </div>
          </div>
                   <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_model; ?></label>
            <div class="col-sm-10">
                    <select name="model" value="" class="form-control">
                       <option>Select Model</option>
                        <?php foreach ($all_models as $model_now) { ?>
						  <option value="<?php echo $model_now['carmodel_id']; ?>" <?php if(isset($model))echo ($model_now['carmodel_id'] == $model)?"selected='selected'":""?>><?php echo $model_now['carmodel_name']; ?></option>

                          <?php } ?>
                        </select>
                         <?php if ($error_model) { ?>
              <div class="text-danger"><?php echo $error_model; ?></div>
              <?php } ?>
            </div>
          </div>
                   <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_lorry; ?></label>
            <div class="col-sm-10">

              <select name="lorry" value="" class="form-control">
                  
<?php if($id=="")
{
?>
            
                       <option value="Covered">Covered</option>
                       <option value="Uncovered">Uncovered</option>
                 <?php } else if($lorry=="Covered")
{
?>
                   <option value="Covered" <?php echo ($lorry == "covered")?"selected='selected'":""?>>Covered</option>
                <option value="Uncovered">Uncovered</option>
                <?php }else if($lorry=="Uncovered")
{
?> <option value="Covered">Covered</option>
                  <option value="Uncovered" <?php echo ($lorry == "Uncovered")?"selected='selected'":""?>>Uncovered</option>
                       <?php }?>
                       
                       
                 
                        </select>
<!--<?php if ($error_lorry) { ?>
              <div class="text-danger"><?php echo $error_lorry; ?></div>
              <?php } ?>-->
            </div>
          </div>
                 <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_driver_name; ?></label>
            <div class="col-sm-10">
                     <input type="text"  name="driver_name" value="<?php if(isset($driver_name))echo $driver_name?>" id="input-driver_name" class="form-control"/>
                <?php if ($error_driver_name) { ?>
              <div class="text-danger"><?php echo $error_driver_name; ?></div>
              <?php } ?>
            </div>
          </div>
                <div class="form-group">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_labour; ?></label>
            <div class="col-sm-10">
                 <select name="labour" value="" class="form-control">
                <?php if($id=="")
{
?>
            
                       <option value="Yes">Yes</option>
                       <option value="No">No</option>
                 <?php } else if($labour=="Yes")
{
?>
                   <option value="Yes" <?php echo ($labour == "Yes")?"selected='selected'":""?>>Yes</option>
                <option value="No">No</option>
                <?php }else if($labour=="No")
{
?>              <option value="Yes">Yes</option>
                  <option value="No" <?php echo ($labour == "No")?"selected='selected'":""?>>No</option>
                       <?php }?>
              
                 
                        </select>
<!--<?php if ($error_labour) { ?>
              <div class="text-danger"><?php echo $error_labour; ?></div>
              <?php } ?>-->
            </div>
          </div>
               <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_mobile_no; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="mobile_no" maxlength="10" value="<?php if(isset($mobile_no))echo $mobile_no?>" placeholder="" id="input-number" class="form-control" />
                <?php if ($error_mobile_no) { ?>
              <div class="text-danger"><?php echo $error_mobile_no; ?></div>
              <?php } ?>
            </div>
          </div>
                 <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_licence_no; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="licence_no" value="<?php if(isset($licence_no))echo $licence_no?>" placeholder="" id="input-number" class="form-control" />
                <?php if ($error_licence_no) { ?>
              <div class="text-danger"><?php echo $error_licence_no; ?></div>
              <?php } ?>
            </div>
          </div>
<?php }?>
              
</div>
</div>
 <button type="submit" form="form-product" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary">Submit</button>

<script type="text/javascript">
    $('.date').datetimepicker({
        format: "yyyy-mm-dd",
            minView: 2, 
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
      
    });

</script>
          <script type="text/javascript">
         
    function checkSubArea() {
                    var area_id=document.getElementById('area').value; 
                          $.ajax({
		url: 'index.php?route=details/vehicle_description/subarea&token=<?php echo $token; ?>&area_id=' + area_id,
		dataType: 'json',
		beforeSend: function() {
            $('#load').show();
			//$('select[name=\'country_id\']').before('<i class="fa fa-circle-o-notch fa-spin load">sjbsgkjsb</i>');
		},
		complete: function() {
           
			$('.fa-spin').remove();
            
		},
		success: function(json) {
           //alert(json['area']);
			if(json!='')
			{
			
			
			html = '<option value="">Please Select Sub Area</option>';
			if (json['area'] != '') {
              // alert(json['area'].length);
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
                        function checkModel() {
                    var make=document.getElementById('make').value; 
                          $.ajax({
		url: 'index.php?route=details/vehicle_description/model&token=<?php echo $token; ?>&make=' + make,
		dataType: 'json',
		beforeSend: function() {
            $('#load').show();
			//$('select[name=\'country_id\']').before('<i class="fa fa-circle-o-notch fa-spin load">sjbsgkjsb</i>');
		},
		complete: function() {
           
			$('.fa-spin').remove();
            
		},
		success: function(json) {
           //alert(json['area']);
			if(json!='')
			{
			
			
			html = '<option value="">Please Select Model</option>';
			if (json['make'] != '') {
              // alert(json['area'].length);
				for (i = 0; i < json['make'].length; i++) {              
					html += '<option value="' + json['make'][i]['carmodel_id'] + '"';
          
				
					html += '>' + json['make'][i]['carmodel_name'] + '</option>';
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
            $('select[name=\'model\']').html(html);
           
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
                     }
              
              </script>