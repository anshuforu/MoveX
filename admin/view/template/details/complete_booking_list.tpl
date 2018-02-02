<?php //$orders=isset($orders)?$orders:""; ?>

<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <!--<button type="submit" id="button-shipping" form="form-order" formaction="<?php echo $shipping; ?>" data-toggle="tooltip" title="<?php echo $button_shipping_print; ?>" class="btn btn-info"><i class="fa fa-truck"></i></button>
        <button type="submit" id="button-invoice" form="form-order" formaction="<?php echo $invoice; ?>" data-toggle="tooltip" title="<?php echo $button_invoice_print; ?>" class="btn btn-info"><i class="fa fa-print"></i></button>-->
        <!--<a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>--></div>
      <h1>Completed Bookings</h1>
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
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i>Completed Bookings</h3>
      </div>
      <div class="panel-body">
        <div class="well">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-name-id"><?php echo $entry_name_id; ?></label>
                <input type="text" name="filter_name_id" value="<?php echo $filter_name_id; ?>" placeholder="<?php echo $entry_name_id; ?>" id="input-name-id" class="form-control" onkeypress="runAddress(event)"/>
              </div>
                  <div class="form-group">
                <label class="control-label" for="input-distance-id"><?php echo $entry_distance; ?></label>
                <input type="text" name="filter_distance" value="<?php echo $filter_distance; ?>" placeholder="<?php echo $entry_distance; ?>" id="input-distance-id" class="form-control" onkeypress="runAddress(event)"/>
              </div>
                     
          
            </div>
             <div class="col-sm-4">
            
           
                   <div class="form-group">
                <label class="control-label" for="input-form-address"><?php echo $entry_form_address; ?></label>
                <input type="text" name="filter_form_address" value="<?php echo $filter_form_address; ?>" placeholder="<?php echo $entry_form_address; ?>" id="input-form-address" class="form-control" onkeypress="runAddress(event)"/>
              </div>
                     <div class="form-group">
                <label class="control-label" for="input-booking-date"><?php echo $entry_booking_date; ?></label>
                <input type="text" name="filter_booking_date" value="<?php echo $filter_booking_date; ?>" placeholder="<?php echo $entry_booking_date; ?>" id="input-booking-date" class="form-control date" onkeypress="runAddress(event)"/>
                 
                       
                   
             
              <!--<div class="form-group">
                <label class="control-label" for="input-total"><?php echo $entry_total; ?></label>
                <input type="text" name="filter_total" value="<?php echo $filter_total; ?>" placeholder="<?php echo $entry_total; ?>" id="input-total" class="form-control" />
              </div>-->
            </div> 
         
                   
            </div>
              
            <div class="col-sm-4">
                
           
           
                 <div class="form-group">
                <label class="control-label" for="input-to-address"><?php echo $entry_to_address; ?></label>
                <input type="text" name="filter_to_address" value="<?php echo $filter_to_address; ?>" placeholder="<?php echo $entry_to_address; ?>" id="input-name-id" class="form-control" onkeypress="runAddress(event)"/>
              </div>
        
              <button type="button" id="button-filter" class="btn btn-info pull-right"><i class="fa fa-search"></i> <?php echo $button_filter; ?></button>
          </div>
        </div>
          </div>
        <form method="post" enctype="multipart/form-data" target="_blank" id="form-order">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                 <!-- <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>-->
                 <td class="text-right"><?php if ($sort == 'c.firstname') { ?>
                    <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $telecaller_id; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_order; ?>"><?php echo $telecaller_id; ?></a>
                    <?php } ?></td> <td class="text-right"><?php if ($sort == 'c.firstname') { ?>
                    <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $entry_name; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_order; ?>"><?php echo $entry_name; ?></a>
                    <?php } ?></td>
                  <td class="text-left"><?php if ($sort == 'bs.form_address') { ?>
                    <a href="<?php echo $sort_formaddress; ?>" class="<?php echo strtolower($order); ?>"><?php echo $entry_form_address; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_formaddress; ?>"><?php echo $entry_form_address; ?></a>
                    <?php } ?></td>
                  <td class="text-left"><?php if ($sort == 'bs.to_address') { ?>
                    <a href="<?php echo $sort_toaddress; ?>" class="<?php echo strtolower($order); ?>"><?php echo $entry_to_address; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_toaddress; ?>"><?php echo $entry_to_address; ?></a>
                    <?php } ?></td>
                  <td class="text-right"><?php if ($sort == 'bs.distance') { ?>
                    <a href="<?php echo $sort_distance; ?>" class="<?php echo strtolower($order); ?>"><?php echo $entry_distance; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_distance; ?>"><?php echo $entry_distance; ?></a>
                    <?php } ?></td>
                     <td class="text-right"><?php if ($sort == 'bs.distance') { ?>
                    <a href="<?php echo $sort_distance; ?>" class="<?php echo strtolower($order); ?>"><?php echo $entry_estimate; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_distance; ?>"><?php echo $entry_estimate; ?></a>
                    <?php } ?></td>
                   <!-- <td class="text-left"><?php if ($sort == 'vt.vehicle_type_name') { ?>
                    <a href="<?php echo $sort_vehicle; ?>" class="<?php echo strtolower($order); ?>"><?php echo $entry_vehicle; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_vehicle; ?>"><?php echo $entry_vehicle; ?></a>
                    <?php } ?></td>
                  <td class="text-left"><?php if ($sort == 'tbp.total_price') { ?>
                    <a href="<?php echo $sort_price; ?>" class="<?php echo strtolower($order); ?>"><?php echo $entry_price; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_price; ?>"><?php echo $entry_price; ?></a>
                    <?php } ?></td>-->
                 <td class="text-left"><?php if ($sort == 'bs.booking_time') { ?>
                    <a href="<?php echo $sort_bdate; ?>" class="<?php echo strtolower($order); ?>"><?php echo $entry_booking_date; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_bdate; ?>"><?php echo $entry_booking_date; ?></a>
                    <?php } ?></td>
                <!--<td class="text-left"><?php if ($sort == 'bs.delivering_time') { ?>
                    <a href="<?php echo $sort_ddate; ?>" class="<?php echo strtolower($order); ?>"><?php echo $entry_delivering_date; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_ddate; ?>"><?php echo $entry_delivering_date; ?></a>
                    <?php } ?></td>-->
                <td class="text-left"><?php if ($sort == 'os.name') { ?>
                    <a href="<?php echo $sort_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $entry_status; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_status; ?>"><?php echo $entry_status; ?></a>
                    <?php } ?></td>
                             <td class="text-right">Action</td>
                
                  
                </tr>
              </thead>
              <tbody>
                <?php //print_r($orders);die;
    
if ($orders) { ?>
                <?php foreach ($orders as $order) {
?>
                <tr>
                <!--  <td class="text-center"><?php if (in_array($order['order_id'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $order['order_id']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $order['order_id']; ?>" />
                    <?php } ?>-->
                   <td class="text-right"><a href="<?php echo $order['view']; ?>"><?php echo $order['order_id']; ?></a></td>
                   <td class="text-right"><?php echo $order['name']; ?></td>
                  <td class="text-left"><?php echo $order['form_address']; ?></td>
                  <td class="text-left"><?php echo $order['to_address']; ?></td>
                  <td class="text-right"><?php echo $order['distance']; ?></td>
                     <td class="text-right"><?php echo $order['distance_price']; ?></td>
                  <!--<td class="text-left"><?php echo $order['vehicle_type_name']; ?></td>
                  <td class="text-left"><?php echo $order['total_price']; ?></td>-->
                  <td class="text-left"><?php echo date('d-m-Y H:m:s',strtotime($order['deliver_time'])); ?></td>
                   
                   <!--<td class="text-left"><?php echo date('d-m-Y H:m:s',strtotime($order['deliver_time'])); ?></td>-->
                    <td class="text-left"><?php echo $order['status']; ?></td>
                     <td class="text-right"><a href="<?php echo $order['view']; ?>" data-toggle="tooltip" title="<?php echo $button_view; ?>" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
            
                 </tr>
                   <?php } }else { ?>
                <tr>
                  <td class="text-center" colspan="15"><?php echo $text_no_results; ?></td>
                </tr>
                  <?php } ?>
               
              </tbody>
            </table>
          </div>
        </form>
        <div class="row">
          <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
          <div class="col-sm-6 text-right"><?php echo $results; ?></div>
        </div>
      </div>
    </div>
  </div>
   <script>
    function runAddress(e) {
    if (e.keyCode == 13) {

url = 'index.php?route=telecallerbooking/total_booking&token=<?php echo $token; ?>';
	
	var filter_name_id = $('input[name=\'filter_name_id\']').val();
	
	if (filter_name_id) {
		url += '&filter_name_id=' + encodeURIComponent(filter_name_id);
	}
	
	var filter_form_address = $('input[name=\'filter_form_address\']').val();
	
	if (filter_form_address) {
		url += '&filter_form_address=' + encodeURIComponent(filter_form_address);
	}
    
    var filter_price1 = $('input[name=\'filter_price1\']').val();
	
	if (filter_price1) {
		url += '&filter_price1=' + encodeURIComponent(filter_price1);
	}
	

	var filter_to_address = $('input[name=\'filter_to_address\']').val();

	if (filter_to_address) {
		url += '&filter_to_address=' + encodeURIComponent(filter_to_address);
	}	
	
	var filter_vehicle = $('input[name=\'filter_vehicle\']').val();
	
	if (filter_vehicle) {
		url += '&filter_vehicle=' + encodeURIComponent(filter_vehicle);
	}
	
	var filter_booking_date = $('input[name=\'filter_booking_date\']').val();
	
	if (filter_booking_date) {
		url += '&filter_booking_date=' + encodeURIComponent(filter_booking_date);
	}
  	var filter_delivering_date = $('input[name=\'filter_delivering_date\']').val();
	
	if (   filter_delivering_date) {
		url += '&filter_delivering_date=' + encodeURIComponent(filter_delivering_date);
	}
    
    var filter_distance = $('input[name=\'filter_distance\']').val();
	
	if (filter_distance) {
		url += '&filter_distance=' + encodeURIComponent(filter_distance);
	}
   
  location = url;
}
}
    </script> 
  <script type="text/javascript"><!--
$('#button-filter').on('click', function() {
	url = 'index.php?route=telecallerbooking/total_booking&token=<?php echo $token; ?>';
	
	var filter_name_id = $('input[name=\'filter_name_id\']').val();
	
	if (filter_name_id) {
		url += '&filter_name_id=' + encodeURIComponent(filter_name_id);
	}
	
	var filter_form_address = $('input[name=\'filter_form_address\']').val();
	
	if (filter_form_address) {
		url += '&filter_form_address=' + encodeURIComponent(filter_form_address);
	}
    
    var filter_price1 = $('input[name=\'filter_price1\']').val();
	
	if (filter_price1) {
		url += '&filter_price1=' + encodeURIComponent(filter_price1);
	}
	

	var filter_to_address = $('input[name=\'filter_to_address\']').val();

	if (filter_to_address) {
		url += '&filter_to_address=' + encodeURIComponent(filter_to_address);
	}	
	
	var filter_vehicle = $('input[name=\'filter_vehicle\']').val();
	
	if (filter_vehicle) {
		url += '&filter_vehicle=' + encodeURIComponent(filter_vehicle);
	}
	
	var filter_booking_date = $('input[name=\'filter_booking_date\']').val();
	
	if (filter_booking_date) {
		url += '&filter_booking_date=' + encodeURIComponent(filter_booking_date);
	}
  	var filter_delivering_date = $('input[name=\'filter_delivering_date\']').val();
	
	if (   filter_delivering_date) {
		url += '&filter_delivering_date=' + encodeURIComponent(filter_delivering_date);
	}
    
    var filter_distance = $('input[name=\'filter_distance\']').val();
	
	if (filter_distance) {
		url += '&filter_distance=' + encodeURIComponent(filter_distance);
	}
   
  location = url;
});
//--></script> 

</div>
<?php echo $footer; ?>
<script type="text/javascript">
    $('.date').datetimepicker({
        format: "yyyy-mm-dd hh:ii",
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