<?php $asined_list=isset($asined_list)?$asined_list:""; ?>

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
                <input type="text" name="filter_transporter_id" value="<?php echo $filter_transporter_id; ?>" placeholder="<?php echo $label_filter_name; ?>" id="input-booking-id" class="form-control" onkeypress="runAddress(event)"/>
              </div> 
                  <!--         <div class="form-group">
                <label class="control-label" for="input-bal"><?php echo $label_total_paid; ?></label>
                <input type="text" name="filter_total_paid" value="<?php echo $filter_total_paid; ?>" placeholder="<?php echo $label_total_paid; ?>" id="input-balance" class="form-control" />
              </div>-->
                  
                
            </div>
                        <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-booking-total-amount"><?php echo $label_transporter; ?></label>
                <input type="text" name="filter_transporter_name" value="<?php echo $filter_transporter_name; ?>" placeholder="<?php echo $label_transporter; ?>" id="input-total-amount" class="form-control" onkeypress="runAddress(event)"/>
              </div> 
                       
                
          <!-- 
            </div>
            <div class="col-sm-4">
                 <div class="form-group">
                <label class="control-label" for="input-margin-amount"><?php echo $label_transporter_total; ?></label>
                <input type="text" name="filter_total" value="<?php echo $filter_total; ?>" placeholder="<?php echo $label_transporter_total; ?>" id="input-margin-amount" class="form-control" />
              </div>
-->
               
         
            </div>
           
				 <div class="col-sm-4">
                         <div class="form-group"></div>
            <button type="button" id="button_filter" class="btn btn-info pull-right"><i class="fa fa-search"></i> <?php echo $button_filter; ?></button>
                     </div>
              
            </div>
          </div>
        </div>
                <div class="panel-body">
          
          
             
          <div class="row" style="font-size:14px;">
              <div class="form-group">
                  
                <label class="control-label" for="total_amount"><?php echo $total_amount; ?></label>
                  <?php if ($asined_list) { $total=0;
$margin=0;
$paid=0;
$balance=0;
foreach ($asined_list as $asign) {
 $total=$total+$asign['booking_total_amount'];
$margin=$margin+$asign['margin_amount'];
$paid=$paid+$asign['paid_amount'];
$balance=$balance+$asign['balance_amount'];
}
}
else
{$total=0;
$margin=0;
$paid=0;
$balance=0;}
echo "&nbsp;&nbsp;Rs. ".$total;
?>
                  &nbsp; &nbsp; &nbsp; &nbsp;
                <label class="control-label" for="total_amount"><?php echo $total_margin; ?></label>
                  <?php echo "&nbsp; &nbsp;Rs. ".$margin; ?>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                   <label class="control-label" for="total_paid"><?php echo $total_paid; ?></label>
                  <?php echo "&nbsp; &nbsp;Rs. ".$paid; ?>
                    
                    &nbsp; &nbsp; &nbsp; &nbsp;
                   <label class="control-label" for="total_balance"><?php echo $total_balance; ?></label>
                  <?php echo "&nbsp; &nbsp;Rs. ".$balance; ?>
              
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
                    <a href="<?php echo $sort_address; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_vendor; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_address; ?>"><?php echo $column_vendor; ?></a>
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
                <?php if ($asined_list) { 
?>
                <?php foreach ($asined_list as $asign) {
                       //print_r($asign);die;
                 
?>
                <tr>
                  <!--<td class="text-center"><?php if (in_array($asign['id'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $asign['id']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $asign['id']; ?>" />
                    <?php } ?></td>-->
             
                    <td class="text-left"><a href="<?php echo $asign['view']; ?>" ><?php echo $asign['booking_id']; ?></a></td>
                      <td class="text-left"><?php echo $asign['vendor']; ?></td>
                    <td class="text-left"><?php echo $asign['booking_total_amount']; ?></td>
                    <td class="text-left"><?php echo $asign['margin_amount']; ?></td>
                    <td class="text-left"><?php echo $asign['paid_amount']; ?></td>
                    <td class="text-left"><?php echo $asign['balance_amount']; ?></td>
                     <td class="text-right"><a href="<?php echo $asign['edit']; ?>" data-toggle="tooltip" title="<?php echo $pay; ?>" class="btn btn-info"><?php echo $pay; ?></a>
                      </td>
             
                 <!-- <td class="text-right"><a href="<?php echo $driver['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>-->
                </tr>
                <?php } ?>
                <?php } else { ?>
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
</div>
<?php echo $footer; ?>
<script>
    function runAddress(e) {
    if (e.keyCode == 13) {

var url = 'index.php?route=details/compound_transporter&token=<?php echo $_GET["token"]; ?>';
    var filter_transporter_id = $('input[name=\"filter_transporter_id"]').val();
     var filter_transporter_name = $('input[name=\"filter_transporter_name"]').val();
    var filter_total_balance = $('input[name=\"filter_transporter_name"]').val();
    var filter_total = $('input[name=\"filter_total"]').val();
    var filter_total_paid = $('input[name=\"filter_total_paid"]').val();
   
   if (filter_transporter_id) {
		url += '&filter_transporter_id=' + encodeURIComponent(filter_transporter_id);
	}
     if (filter_transporter_name) {
		url += '&filter_transporter_name=' + encodeURIComponent(filter_transporter_name);
	}
      if (filter_total) {
		url += '&filter_total=' + encodeURIComponent(filter_total);
	}     
    if (filter_total_paid) {
		url += '&filter_total_paid=' + encodeURIComponent(filter_total_paid);
	} 
    
  
//    alert(url);
	location = url; 
}
}
    </script> 
<script type="text/javascript">
$('#button_filter').on('click', function() {
   // alert("hello");
    
	var url = 'index.php?route=details/compound_transporter&token=<?php echo $_GET["token"]; ?>';
    var filter_transporter_id = $('input[name=\"filter_transporter_id"]').val();
     var filter_transporter_name = $('input[name=\"filter_transporter_name"]').val();
    var filter_total_balance = $('input[name=\"filter_transporter_name"]').val();
    var filter_total = $('input[name=\"filter_total"]').val();
    var filter_total_paid = $('input[name=\"filter_total_paid"]').val();
   
   if (filter_transporter_id) {
		url += '&filter_transporter_id=' + encodeURIComponent(filter_transporter_id);
	}
     if (filter_transporter_name) {
		url += '&filter_transporter_name=' + encodeURIComponent(filter_transporter_name);
	}
      if (filter_total) {
		url += '&filter_total=' + encodeURIComponent(filter_total);
	}     
    if (filter_total_paid) {
		url += '&filter_total_paid=' + encodeURIComponent(filter_total_paid);
	} 
    
  
//    alert(url);
	location = url; 
});
//--></script> 