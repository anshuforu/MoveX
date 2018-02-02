
<?php echo $header;?><?php echo $column_left; ?>
 <?php 
if(isset($_GET['id'])) 
{
$name=$_GET['name'];
$address=$_GET['address'];
$number=$_GET['number'];
}
else
{
$name="";
$address="";
$number="";
}
?>          

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
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">
       
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_name; ?></label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?php echo $name; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />

          </div>
              </div>
            
         <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-address"><?php echo $entry_address; ?></label>
            <div class="col-sm-10">
              <input type="text" name="address" value="<?php echo $address; ?>" placeholder="<?php echo $entry_address; ?>" id="input-address" class="form-control" />

          </div>
              </div>
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email"><?php echo $entry_email; ?></label>
            <div class="col-sm-10">
              <input type="text" name="email" value="<?php echo $email_id; ?>" placeholder="<?php echo $entry_email; ?>" id="input-email" class="form-control" />

          </div>
              </div>
<div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_number; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="number" value="<?php echo $number; ?>" placeholder="<?php echo $entry_number; ?>" id="input-number" class="form-control" />

            </div>
          </div>
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_company_name; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="company_name" value="<?php echo $company_name; ?>" placeholder="<?php echo $entry_company_name; ?>" id="input-number" class="form-control" />

            </div>
          </div>
            
               <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_margin; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="margin" value="<?php echo $margin; ?>" placeholder="<?php echo $entry_margin; ?>" id="input-number" class="form-control" />

            </div>
          </div>



      
    
       <div class="tab-pane active" id="tab-general">
              <div class="table-responsive">
                <table id="discount" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
					<td class="text-left"><?php echo $entry_area;?></td>
                      <td class="text-left"><?php echo $entry_sub_area;?></td>
					  <td class="text-right"><?php echo $entry_city;?></td>
                    <td class="text-right"><?php echo $entry_covered_uncovered;?></td>
                    <td class="text-right"><?php echo $entry_vehicle_no;?></td>
                    <td class="text-right"><?php echo $entry_vehicle_type;?></td>
                    <td class="text-right"><?php echo $entry_model;?></td>
                    <td class="text-right"><?php echo $entry_driver_name;?></td>
                    <td class="text-right"><?php echo $entry_mobile_no;?></td>
                    <td class="text-right"><?php echo $entry_licence_no;?></td>
                    <td class="text-right"><?php echo $entry_vehicle_insurance;?></td>



                    </tr>
                  </thead>
                  <tbody>
                    <?php $discount_row = 0; 
//print_r($car_center_list);
?>
                 <!--   <?php foreach ($car_price_list as $car_price) { ?>
                    <tr id="discount-row<?php echo $discount_row; ?>">
						  <td class="text-left"><select name="car_price[<?php echo $discount_row; ?>][id]" class="form-control">
                          <?php foreach ($car_center_list as $car_centers) { ?>
                        <?php if ($car_centers['id'] == $car_price['id']) { ?>
						  <option value="<?php echo $car_centers['id']; ?>" selected="selected"><?php echo $car_centers['name']; ?></option>
                          <?php } else { ?>
                          <option value="<?php echo $car_centers['id']; ?>"><?php echo $car_centers['name']; ?></option>
                          <?php } ?>    
                          <?php } ?>
                        </select>
						</td>
						
                      <td class="text-left"><select name="car_price[<?php echo $discount_row; ?>][car_make_id]" class="form-control">
                          <?php foreach ($car_make_list as $car_makes) { ?>
                        <?php if ($car_makes['car_make_id'] == $car_price['car_make_id']) { ?>
						  <option value="<?php echo $car_makes['car_make_id']; ?>" selected="selected"><?php echo $car_makes['car_make_name']; ?></option>
                          <?php } else { ?>
                          <option value="<?php echo $car_makes['car_make_id']; ?>"><?php echo $car_makes['car_make_name']; ?></option>
                          <?php } ?>    
                          <?php } ?>
                        </select>
						</td>
						  <td class="text-left"><select name="car_price[<?php echo $discount_row; ?>][car_model_id]" class="form-control">
                          <?php foreach ($car_model_list as $car_models) { ?>
                         <?php if ($car_models['car_model_id'] == $car_price['car_model_id']) { ?>
                          <option value="<?php echo $car_models['car_model_id']; ?>"  selected="selected"><?php echo $car_models['car_model_name']; ?></option>
							  <?php } else { ?>
							 <option value="<?php echo $car_models['car_model_id']; ?>"><?php echo $car_models['car_model_name']; ?></option>  
                        <?php } ?>
							  
                          <?php } ?>
                        </select>
						</td>
                     <td class="text-right"><input type="text" name="car_price[<?php echo $discount_row; ?>][price]" value="<?php echo $car_price['price']; ?>" placeholder="<?php echo $entry_price; ?>" class="form-control" /></td>
                     
                      <td class="text-left"><button type="button" onclick="$('#discount-row<?php echo $discount_row; ?>').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                    </tr>
                    <?php $discount_row++; ?>
                    <?php } ?>
                      -->
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="11"></td>
                      <td class="text-left"><button type="button" onclick="addDiscount();" data-toggle="tooltip" title="<?php echo $button_discount_add; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
        </form>   
  </div>
        </div>
      </div>
     <script type="text/javascript"><!--
var discount_row = <?php echo $discount_row; ?>;

function addDiscount() {
  
	html  = '<tr>'; 

    html +='<td class="text-left"><select name="vendor[' + discount_row + '][area]" class="form-control" style="width:120px">';
    html +='<option value="0">Select Area</option>';
   
        
       html +='</select></td>';
	
   html +='<td class="text-left"><select name="vendor[' + discount_row + '][subarea]" class="form-control" style="width:140px">';
    html +='<option value="0">Select Sub Area</option>';
       html +='</select></td>';
    
    html +='<td class="text-left"><select name="vendor[' + discount_row + '][city]" class="form-control" style="width:120px">';
    html +='<option value="0">Select City</option>';

 <?php foreach ($all_zones as $all_zone) { ?>
    html += '    <option value="<?php echo $all_zone['zone_id']; ?>" style="max-width:50px;"><?php echo addslashes($all_zone['name']); ?></option>';
    <?php } ?>
       html +='</select></td>';
    
    
    	 html +='<td class="text-left"><select name="vendor[' + discount_row + '][type]" class="form-control style="width:120px">'
    html +='<option value="0">Select Lorry Type</option>';


    html += '    <option value="Covered">Covered</option>';
       html += '    <option value="Uncovered">Uncovered</option>';

       html +='</select></td>';
    
    	 html += '  <td class="text-left">';
        html +='<input type="text" name="vendor[' + discount_row + '][vehicle_no]">';
    	html +='';
	
    html +='<td class="text-left"><select name="vendor[' + discount_row + '][vehicle_type]" class="form-control" style="width:160px">';
    html +='<option value="0">Select Vehicle Type</option>';

 <?php foreach ($all_vehicles as $all_vehicle) { ?>
    html += '    <option value="<?php echo $all_vehicle['vehicle_type_id']; ?>"><?php echo addslashes($all_vehicle['vehicle_type_name']); ?></option>';
    <?php } ?>
       html +='</select></td>';
    
    	 html += '  <td class="text-left">';
        html +='<input type="text" name="vendor[' + discount_row + '][vehicle_model]">';
    	html +='';
	
    html += '  </td>';
    	 html += '  <td class="text-left">';
        html +='<input type="text" name="vendor[' + discount_row + '][driver_name]">';
    	html +='';
	
    html += '  </td>';
    	 html += '  <td class="text-left">';
        html +='<input type="text" name="vendor[' + discount_row + '][mobile_no]">';
    	html +='';
	
    html += '  </td>';
    	 html += '  <td class="text-left">';
        html +='<input type="text" name="vendor[' + discount_row + '][licence_no]">';
    	html +='';
	
    html += '  </td>';
    	 html += '  <td class="text-left">';
        html +='<input type="text" name="vendor[' + discount_row + '][insurance_due_date]">';
    	html +='';
	
    html += '  </td>';
	html += '  <td class="text-left"><button type="button" onclick="$(\'#discount-row' + discount_row + '\').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
	html += '</tr>';	
	
	$('#discount tbody').append(html);

	discount_row++;
}
//--></script> 
    
</div>
