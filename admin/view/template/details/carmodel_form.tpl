<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-country" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-country" class="form-horizontal">
               <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_name; ?></label>
            <div class="col-sm-10">
                <?php if(isset($_GET['id'])){ ?>
                  <select name="carmake" class="form-control" disabled>
               <option value=0>Select Carmake</option>
                          <?php foreach ($carmakes as $carmake) { ?>
                         <?php if ($carmake['carmake_id'] == $carmake['carmake_id']) { ?>
                          <option value="<?php echo $carmake['carmake_id']; ?>"  selected="selected"><?php echo $carmake['carmake_name']; ?></option>
							  <?php } else { ?>
							 <option value="<?php echo $carmake['carmake_id']; ?>"><?php echo $carmake['carmake_name']; ?></option>  
                        <?php } ?>
							  
                          <?php } ?>
                        </select>
                
                <?php }else{ ?>
            <select name="carmake" class="form-control" >
               <option value=0>Select Carmake</option>
                          <?php foreach ($carmakes as $carmake) { ?>
                         <?php if ($carmake['carmake_id'] == $carmake_id) { ?>
                          <option value="<?php echo $carmake['carmake_id']; ?>"  selected="selected"><?php echo $carmake['carmake_name']; ?></option>
							  <?php } else { ?>
							 <option value="<?php echo $carmake['carmake_id']; ?>"><?php echo $carmake['carmake_name']; ?></option>  
                        <?php } ?>
							  
                          <?php } ?>
                        </select>
                <?php } ?>
                <?php if ($error_name) { ?>
              <div class="text-danger"><?php echo $error_name; ?></div>
              <?php } ?>

            </div>
          </div>
        
         <!-- <div class="form-group">
            <label class="col-sm-2 control-label" for="input-iso-code-2"><?php echo $entry_iso_code_2; ?></label>
            <div class="col-sm-10">
              <input type="text" name="iso_code_2" value="<?php echo $iso_code_2; ?>" placeholder="<?php echo $entry_iso_code_2; ?>" id="input-iso-code-2" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-iso-code-3"><?php echo $entry_iso_code_3; ?></label>
            <div class="col-sm-10">
              <input type="text" name="iso_code_3" value="<?php echo $iso_code_3; ?>" placeholder="<?php echo $entry_iso_code_3; ?>" id="input-iso-code-3" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-address-format"><span data-toggle="tooltip" data-html="true" title="<?php echo htmlspecialchars($help_address_format); ?>"><?php echo $entry_address_format; ?></span></label>
            <div class="col-sm-10">
              <textarea name="address_format" rows="5" placeholder="<?php echo $entry_address_format; ?>" id="input-address-format" class="form-control"><?php echo $address_format; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_postcode_required; ?></label>
            <div class="col-sm-10">
              <label class="radio-inline">
                <?php if ($postcode_required) { ?>
                <input type="radio" name="postcode_required" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <?php } else { ?>
                <input type="radio" name="postcode_required" value="1" />
                <?php echo $text_yes; ?>
                <?php } ?>
              </label>
              <label class="radio-inline">
                <?php if (!$postcode_required) { ?>
                <input type="radio" name="postcode_required" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="postcode_required" value="0" />
                <?php echo $text_no; ?>
                <?php } ?>
              </label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="status" id="input-status" class="form-control">
                <?php if ($status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>-->
                    <?php if(isset($_GET['id'])){ ?>
              <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-subarea"><?php echo $entry_subarea; ?></label>
             <div class="col-sm-10">
              <input type="text" name="subarea" value="<?php echo $_GET['name']; ?>" placeholder="<?php echo $entry_subarea; ?>" id="txtAutocomplete_off" class="form-control" />
                  </div>
                  </div>
            <?php }else{ ?>
        
          
               <div class="tab-pane active" id="tab-general">
              <div class="table-responsive">
                <table id="discount" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
					<td class="text-left"><?php echo $entry_column_name;?></td>

            

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
                      <td colspan="1"></td>
                      <td class="text-left"><button type="button" onclick="addDiscount();" data-toggle="tooltip" title="<?php echo $button_discount_add; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <?php } ?>
        </form>
      </div>
    </div>
       <button type="submit" form="form-product" data-toggle="tooltip" title="Submit" class="btn btn-primary">Submit</button>    
  </div>
    
          
          
     <script type="text/javascript"><!--
var discount_row = <?php echo $discount_row; ?>;

function addDiscount() {
 	html  = '<tr>'; 


	 html += '  <td class="text-left">';
        html +='<input type="text" name="carmodel[' + discount_row + '][car_model]">';
    	html +='</td>';
    

	html += '  <td class="text-left"><button type="button" onclick="$(\'#discount-row' + discount_row + '\').fadeOut();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';

  	html += '</tr>';
	$('#discount tbody').append(html);

	discount_row++;
}
//--></script> 
</div>