<?php echo $header; ?><?php echo $column_left; ?>
<?php //print_r($customer_groups);die; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-customer" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
    <!--<?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>-->
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
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-customer" class="form-horizontal">
         
              <div class="row">
           
                <div class="col-sm-10">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab-customer">
                     <!-- <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-customer-group"><?php echo $entry_customer_group; ?></label>
                        <div class="col-sm-10">
                          <select name="customer_group_id" id="input-customer-group" class="form-control">
                            <?php foreach ($customer_groups as $customer_group) { ?>
                            <?php if ($customer_group['customer_group_id'] == $customer_group_id) { ?>
                            <option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                          </select>
                        </div>
                      </div>-->
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname"><?php echo $entry_firstname; ?></label>
                        <div class="col-sm-10">
                          <input type="text" name="firstname" value="<?php if(isset($firstname))echo $firstname; ?>" placeholder="<?php echo $entry_firstname; ?>" id="input-firstname" class="form-control" />
                          <?php if ($error_firstname) { ?>
                          <div class="text-danger"><?php echo $error_firstname; ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <!--<div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-lastname"><?php echo $entry_lastname; ?></label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="<?php echo $lastname; ?>" placeholder="<?php echo $entry_lastname; ?>" id="input-lastname" class="form-control" />
                          <?php if ($error_lastname) { ?>
                          <div class="text-danger"><?php echo $error_lastname; ?></div>
                          <?php } ?>
                        </div>
                      </div>-->
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-email"><?php echo $entry_email; ?></label>
                        <div class="col-sm-10">
                          <input type="text" name="email" value="<?php if(isset($email))echo $email; ?>" placeholder="<?php echo $entry_email; ?>" id="input-email" class="form-control" />
                        </div>
                      </div>
                  <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-telephone"><?php echo $entry_telephone; ?></label>
                        <div class="col-sm-10">
                          <input type="text" name="telephone" value="<?php if(isset($telephone))echo $telephone; ?>" placeholder="<?php echo $entry_telephone; ?>" id="input-telephone" class="form-control" maxlength="10" />
                          <?php if ($error_telephone) { ?>
                          <div class="text-danger"><?php echo $error_telephone; ?></div>
                          <?php  } ?>
                        </div>
                      </div> 
                        <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-user"><?php echo $entry_username; ?></label>
                        <div class="col-sm-10">
                          <input type="text" name="username" value="<?php if(isset($username))echo $username; ?>" placeholder="<?php echo $entry_username; ?>" id="input-user" class="form-control" maxlength="10" readonly="readonly" />
                        </div>
                      </div>
            
             <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-password"><?php echo $entry_password; ?></label>
                        <div class="col-sm-10">
                            <input type="password" name="password" value="<?php if(isset($password))echo $password; ?>" placeholder="<?php echo $entry_password; ?>" id="input-password" class="form-control"/>
                          <?php if ($error_password) { ?>
                          <div class="text-danger"><?php echo $error_password; ?></div>
                          <?php  } ?>
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-confirm"><?php echo $entry_confirm; ?></label>
                        <div class="col-sm-10">
                            <input type="password" name="confirm" value="<?php if(isset($confirm))echo $confirm; ?>" placeholder="<?php echo $entry_confirm; ?>" id="input-confirm" class="form-control"/>
                          <?php if ($error_confirm) { ?>
                          <div class="text-danger"><?php echo $error_confirm; ?></div>
                          <?php  } ?>
                        </div>
                      </div>  
                        <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-street"><?php echo $entry_street; ?></label>
                        <div class="col-sm-10">
                          <input type="text" name="street" value="<?php if(isset($address))echo $address; ?>" placeholder="<?php echo $entry_street; ?>" autocomplete="off" id="input-confirm" class="form-control" />
                       </div>
                      </div>   
                   <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-city"><?php echo $entry_city; ?></label>
                        <div class="col-sm-10">
                          <select name="city" id="city" class="form-control">
                               <option value="">Select City</option>
                            <?php //print_r($customer_groups);die;
foreach ($customer_groups as $customer_group) { ?>
                            <?php if ($customer_group['city_id'] == $city_id) { ?>
                            <option value="<?php echo $customer_group['city_id']; ?>" selected="selected"><?php echo $customer_group['city_name']; ?>                           </option>
                            <?php } else { ?>
                            <option value="<?php echo $customer_group['city_id']; ?>"><?php echo $customer_group['city_name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                                              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-state"><?php echo $entry_state; ?></label>
             
                <div class="col-sm-10">
                           <select name="state" id="state" class="form-control">
                               <option value="">Select State</option>
 <option value="1493">Maharashtra</option>
        <?php foreach ($state as $states) { ?>
                            <?php if ($states['zone_id'] == $state_id) { ?>
                            <option value="<?php echo $states['zone_id']; ?>" selected="selected"><?php echo $states['name']; ?>                           </option>
                            <?php } else { ?>
                            <option value="<?php echo $states['zone_id']; ?>"><?php echo $states['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
</select>	
                                
                </div>
              </div>
                         <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-pin"><?php echo $entry_pin; ?></label>
                        <div class="col-sm-10">
                          <input type="text" name="pin" maxlength="6" value="<?php if(isset($pincode))echo $pincode; ?>" placeholder="<?php echo $entry_pin; ?>" autocomplete="off" id="input-pin" class="form-control" />
                       </div>
                      </div>   
        </form>
      </div>
    </div>
  </div>
             
  <script type="text/javascript"><!--
$('select[name=\'customer_group_id\']').on('change', function() {
	$.ajax({
		url: 'index.php?route=sale/customer/customfield&token=<?php echo $token; ?>&customer_group_id=' + this.value,
		dataType: 'json',
		success: function(json) {
			$('.custom-field').hide();
			$('.custom-field').removeClass('required');

			for (i = 0; i < json.length; i++) {
				custom_field = json[i];

				$('.custom-field' + custom_field['custom_field_id']).show();

				if (custom_field['required']) {
					$('.custom-field' + custom_field['custom_field_id']).addClass('required');
				}
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$('select[name=\'customer_group_id\']').trigger('change');
//--></script> 
  <script type="text/javascript"><!--

	$('.date').datetimepicker({
		pickTime: false
	});
	
	$('.datetime').datetimepicker({
		pickDate: true,
		pickTime: true
	});
	
	$('.time').datetimepicker({
		pickDate: false
	});	

	address_row++;
}
//--></script> 
</div>
          </div>
        </div>
          <button type="submit" form="form-customer" data-toggle="tooltip" title="Submit" class="btn btn-primary">Submit</button>