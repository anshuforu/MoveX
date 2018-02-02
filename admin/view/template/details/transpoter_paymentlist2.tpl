<?php //print_r($asined_list);die; ?>

<?php echo $header; ?><?php echo $column_left; 
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
    <!--  <div class="pull-right"><a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-country').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>-->
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
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3>
      </div>
      <div class="panel-body">
           <div class="well">
          <div class="row">
                  <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-booking_id"><?php echo $label_filter_name; ?></label>
                <input type="text" name="filter_booking_id" value="<?php echo $filter_booking_id; ?>" placeholder="<?php echo $label_filter_name; ?>" id="input-booking-id" class="form-control" />
              </div> 
                <div class="form-group">
                <label class="control-label" for="input-bal"><?php echo $label_total_paid; ?></label>
                <input type="text" name="filter_total_balance" value="<?php echo $filter_total_balance; ?>" placeholder="<?php echo $label_total_paid; ?>" id="input-balance" class="form-control" />
              </div>
            </div>
                        <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-booking-total-amount"><?php echo $label_filter_address; ?></label>
                <input type="text" name="filter_total_amu" value="<?php echo $filter_total_balance; ?>" placeholder="<?php echo $label_filter_address; ?>" id="input-total-amount" class="form-control" />
              </div> 
                <div class="form-group">
                <label class="control-label" for="input-total-paid"><?php echo $label_total_bal; ?></label>
                <input type="text" name="filter_total_paid" value="<?php echo $filter_total_paid; ?>" placeholder="<?php echo $label_total_paid; ?>" id="input-total-paid" class="form-control" />
              </div>
           
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-margin-amount"><?php echo $label_filter_number; ?></label>
                <input type="text" name="filter_margin_amount" value="<?php echo $filter_margin_amount; ?>" placeholder="<?php echo $label_filter_number; ?>" id="input-margin-amount" class="form-control" />
              </div>
            <button type="button" id="button_filter" class="btn btn-primary pull-right"><i class="fa fa-search"></i> <?php echo $button_filter; ?></button>
            </div>
           
				
              
            </div>
          </div>
        </div>
        <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-country">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <!--<td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>-->
                  <td class="text-left"><?php if ($sort == 'name') { ?>
                    <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
                    <?php } ?></td>
                     <td class="text-left"><?php if ($sort == 'address') { ?>
                    <a href="<?php echo $sort_address; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_address; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_address; ?>"><?php echo $column_address; ?></a>
                    <?php } ?></td>
                     <td class="text-left"><?php if ($sort == 'number') { ?>
                    <a href="<?php echo $sort_number; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_number; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_number; ?>"><?php echo $column_number; ?></a>
                    <?php } ?></td>
                    <td class="text-left"><?php if ($sort == 'number') { ?>
                    <a href="<?php echo $sort_number; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_paid; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_number; ?>"><?php echo $column_paid; ?></a>
                    <?php } ?></td>
                    <td class="text-left"><?php if ($sort == 'number') { ?>
                    <a href="<?php echo $sort_number; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_balance; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_number; ?>"><?php echo $column_balance; ?></a>
                    <?php } ?></td>
                
                  <!--<td class="text-right"><?php echo $column_action; ?></td>-->
                </tr>
              </thead>
              <tbody>
                <?php if ($asined_list) { ?>
                <?php foreach ($asined_list as $asign) {
                       //print_r($asign);die;
                 
?>
                <tr>
                  <!--<td class="text-center"><?php if (in_array($asign['id'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $asign['id']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $asign['id']; ?>" />
                    <?php } ?></td>-->
               
                    <td class="text-left"><?php echo $asign['booking_id']; ?></td>
                    <td class="text-left"><?php echo $asign['booking_total_amount']; ?></td>
                    <td class="text-left"><?php echo $asign['margin_amount']; ?></td>
                    <td class="text-left"><?php echo $asign['paid_amount']; ?></td>
                    <td class="text-left"><?php echo $asign['balance_amount']; ?></td>
             
                 <!-- <td class="text-right"><a href="<?php echo $driver['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>-->
                </tr>
                <?php } ?>
                <?php } else { ?>
                <tr>
                  <td class="text-center" colspan="5"><?php echo $text_no_results; ?></td>
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
</div>
<?php echo $footer; ?>
<script type="text/javascript">
$('#button_filter').on('click', function() {
   // alert("hello");
    
	var url = 'index.php?route=details/customer_paymentdue&token=<?php echo $_GET["token"]; ?>';
    var filter_booking_id = $('input[name=\"filter_booking_id"]').val();
    var filter_total_balance = $('input[name=\"filter_total_balance"]').val();
    var filter_total_amu = $('input[name=\"filter_total_amu"]').val();
    var filter_total_paid = $('input[name=\"filter_total_paid"]').val();
    var filter_margin_amount = $('input[name=\"filter_margin_amount"]').val();
   if (filter_booking_id) {
		url += '&filter_booking_id=' + encodeURIComponent(filter_booking_id);
	}
     if (filter_total_balance) {
		url += '&filter_total_balance=' + encodeURIComponent(filter_total_balance);
	}
      if (filter_total_amu) {
		url += '&filter_total_amu=' + encodeURIComponent(filter_total_amu);
	}     
    if (filter_total_paid) {
		url += '&filter_total_paid=' + encodeURIComponent(filter_total_paid);
	} 
    if (filter_margin_amount) {
		url += '&filter_margin_amount=' + encodeURIComponent(filter_margin_amount);
	}
  
//    alert(url);
	location = url; 
});
//--></script> 
