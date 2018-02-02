<?php echo $header; ?><?php echo $column_left; 
?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-country').submit() : false;"><i class="fa fa-trash-o"></i></button>
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
                <label class="control-label" for="input-booking"><?php echo $label_filter_booking; ?></label>
                <input type="text" name="filter_booking_id" value="<?php echo $filter_booking_id; ?>" placeholder="<?php echo $label_filter_booking; ?>" id="input-customer" class="form-control" onkeypress="runAddress(event)"/>
              </div> 
                      <div class="form-group">
                <label class="control-label" for="input-name"><?php echo $label_filter_name; ?></label>
                <input type="text" name="filter_customer" value="<?php echo $filter_customer; ?>" placeholder="<?php echo $label_filter_name; ?>" id="input-customer" class="form-control" onkeypress="runAddress(event)"/>
              </div>   
                      <!--<div class="form-group">
                <label class="control-label" for="input-name"><?php echo $label_distance; ?></label>
                <input type="text" name="filter_distance" value="<?php echo $filter_distance; ?>" placeholder="<?php echo $label_distance; ?>" id="input-distance" class="form-control" onkeypress="runAddress(event)"/>
              </div>-->
            </div>
                        <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-address"><?php echo $label_filter_address; ?></label>
                <input type="text" name="filter_form" value="<?php echo $filter_form; ?>" placeholder="<?php echo $label_filter_address; ?>" id="input-form" class="form-control" onkeypress="runAddress(event)"/>
              </div>  
            <div class="form-group">
                <label class="control-label" for="input-address"><?php echo $distanceprice; ?></label>
                <input type="text" name="filter_price" value="<?php echo $filter_price; ?>" placeholder="<?php echo $distanceprice; ?>" id="input-distance-price" class="form-control date" onkeypress="runAddress(event)"/>
              </div>
           
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-number"><?php echo $label_filter_number; ?></label>
                <input type="text" name="filter_to" value="<?php echo $filter_to; ?>" placeholder="<?php echo $label_filter_number; ?>" id="input-to" class="form-control" onkeypress="runAddress(event)"/>
              </div>  
            <div class="form-group">
                <label class="control-label" for="input-number"><?php echo $label_deliver; ?></label>
                  <input type="text" name="filter_deliver" value="<?php echo $filter_deliver; ?>" placeholder="<?php echo $label_deliver; ?>" id="input-deliver" class="form-control date" onkeypress="runAddress(event)"/>
              </div>
            <button type="button" id="button_filter" class="btn btn-primary pull-right"><i class="fa fa-search"></i> <?php echo $button_filter; ?></button>
            </div>
                <!-- <div class="form-group">
                <label class="control-label" for="input-deliver-date"><?php echo $entry_delivering_date; ?></label>
                <div class="input-group date">
                  <input type="text" name="filter_delivering_date" value="<?php //echo $filter_booking_date; ?>" placeholder="<?php echo $entry_delivering_date; ?>" data-date-format="YYYY-MM-DD" id="input-deliver-date" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span></div>
              </div>-->    
				
              
            </div>
          </div>
        </div>
           <div style="display:none;" id="dialog" class="window">
    <div class="button1" id="close" style="text-align:right"><!--<button onclick='alert()'>x</button>-->
        <input type="button" value="x" onclick="$('#dialog').hide()" class="btn btn-primary">
        </div>
      <h3>Select Telecaller:</h3> 
    <div class="button1" id="close">
               
              <div class="col-sm-10">
                  <input type="hidden" id="book_id" name="book_id">
						      <select name="telecaller_name" id="telecaller_name" class="form-control">
                                <option value="">Select Telecaller </option>
                                <?php foreach ($telecallers as $telecaller) { ?>
                                <option value="<?php echo $telecaller['telecaller_id']; ?>"><?php echo $telecaller['telecaller_name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
         <div id="dataa"></div>
           
        
        <input type="button" value="submit" onclick="myfunction()" class="btn btn-primary" >
        </div>
            
    <div class="event_viewbx">
    <div class="e_closebttn"></div>
    
    
    <div class="txt_bx">
   
    </div>
 
    </div>
</div>
        <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-country">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left"><?php if ($sort == 'sort_customer') { ?>
                    <a href="<?php echo $sort_customer; ?>" class="<?php echo strtolower($order); ?>"><?php echo $booking_id; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_customer; ?>"><?php echo $booking_id; ?></a>
                    <?php } ?></td>  
                    <td class="text-left"><?php if ($sort == 'sort_customer') { ?>
                    <a href="<?php echo $sort_customer; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_customer; ?>"><?php echo $column_name; ?></a>
                    <?php } ?></td>  
                    <td class="text-left"><?php if ($sort == 'sort_customer') { ?>
                    <a href="<?php echo $sort_customer; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_telephone; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_customer; ?>"><?php echo $column_telephone; ?></a>
                    <?php } ?></td>
                     <td class="text-left" style="width:160px;"><?php if ($sort == 'sort_customer') { ?>
                    <a href="<?php echo $sort_form; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_address; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_form; ?>"><?php echo $column_address; ?></a>
                    <?php } ?></td>
                     <td class="text-left" style="width:160px;"><?php if ($sort == 'sort_customer') { ?>
                    <a href="<?php echo $sort_to; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_number; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_to; ?>"><?php echo $column_number; ?></a>
                    <?php } ?></td>         <td class="text-left"><?php if ($sort == 'sort_distance') { ?>
                    <a href="<?php echo $sort_distance; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_number; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_distance; ?>"><?php echo $column_distance; ?></a>
                    <?php } ?></td>         
                    <td class="text-left"><?php if ($sort == 'sort_price') { ?>
                    <a href="<?php echo $sort_price; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_price; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_price; ?>"><?php echo $column_price; ?></a>
                    <?php } ?></td>     
                      <td class="text-left"><?php if ($sort == 'sort_deliver') { ?>
                    <a href="<?php echo $sort_booking; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_booking; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_booking; ?>"><?php echo $column_booking; ?></a>
                    <?php } ?></td>
                    <td class="text-left"><?php if ($sort == 'sort_deliver') { ?>
                    <a href="<?php echo $sort_deliver; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_deliver; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_deliver; ?>"><?php echo $column_deliver; ?></a>
                    <?php } ?></td>
                    <td class="text-left"><?php if ($sort == 'sort_deliver') { ?>
                    <a href="<?php echo $sort_deliver; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_status; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_deliver; ?>"><?php echo $column_status; ?></a>
                    <?php } ?></td>
                
                  <td class="text-right" style="width:350px;"><?php echo $column_action; ?></td>
                   
                </tr>
              </thead>
              <tbody>
                <?php if ($driver_list) { ?>
                <?php foreach ($driver_list as $driver) {
?>
                <tr>
                  <td class="text-center"><?php if (in_array($driver['id'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $driver['id']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $driver['id']; ?>" />
                    <?php } ?></td>
                  <td class="text-left"><a href="<?php echo $driver['view']; ?>" ><?php echo $driver['id']; ?></a></td>
                  <td class="text-left"><?php echo $driver['customer_name']; ?></td>
                  <td class="text-left"><?php echo $driver['customer_mobile_no']; ?></td>
                    <td class="text-left"><?php echo $driver['form']; ?></td>
                    <td class="text-left"><?php echo $driver['to']; ?></td>
                    <td class="text-left"><?php echo round($driver['distance']); ?></td>
                    <td class="text-left"><?php echo $driver['price']; ?></td>
                     <td class="text-left"><?php echo date('d-m-Y H:i:s',strtotime($driver['booking_date'])); ?></td>
                    <td class="text-left"><?php echo date('d-m-Y H:i:s',strtotime($driver['deliver_date'])); ?></td>
                    <td class="text-left"><?php echo $driver['status']; ?></td>
             
                  <td class="text-right"><a href="<?php echo $driver['view']; ?>" data-toggle="tooltip" title="<?php echo $button_view; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp;<a href="<?php echo $driver['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    <?php if($driver['assigned_to_telecaller']==1)
{
?>
                      <input type="button" disabled="disabled" class="btn btn-primary" value="Assign" onclick="getCustomer('<?php echo $driver['id']; ?>')"></td>
                    <?php }else {
?>
                      <input type="button" class="btn btn-primary" value="Assign" onclick="getCustomer('<?php echo $driver['id']; ?>')"></td>
                    <?php }?>
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

	var url = 'index.php?route=addbooking/addbooking&token=<?php echo $_GET["token"]; ?>';
    var filter_customer = $('input[name=\"filter_customer"]').val();
    var filter_distance = $('input[name=\"filter_distance"]').val();
    var filter_form = $('input[name=\"filter_form"]').val();
    var filter_price = $('input[name=\"filter_price"]').val();
    var filter_to = $('input[name=\"filter_to"]').val();
    var filter_deliver = $('input[name=\"filter_deliver"]').val();
    var filter_booking_id = $('input[name=\"filter_booking_id"]').val();
   if (filter_customer) {
		url += '&filter_customer=' + encodeURIComponent(filter_customer);
	}
     if (filter_distance) {
		url += '&filter_distance=' + encodeURIComponent(filter_distance);
	}
      if (filter_form) {
		url += '&filter_form=' + encodeURIComponent(filter_form);
	}  
    if (filter_price) {
		url += '&filter_price=' + encodeURIComponent(filter_price);
	}    
    if (filter_to) {
		url += '&filter_to=' + encodeURIComponent(filter_to);
	} 
    if (filter_deliver) {
		url += '&filter_deliver=' + encodeURIComponent(filter_deliver);
	} 
    if (filter_booking_id) {
		url += '&filter_booking_id=' + encodeURIComponent(filter_booking_id);
	}
  
//    alert(url);
	location = url; 
}
}
    </script> 
<script type="text/javascript">
$('#button_filter').on('click', function() {
   // alert("hello");
    
	var url = 'index.php?route=addbooking/addbooking&token=<?php echo $_GET["token"]; ?>';
    var filter_customer = $('input[name=\"filter_customer"]').val();
    var filter_distance = $('input[name=\"filter_distance"]').val();
    var filter_form = $('input[name=\"filter_form"]').val();
    var filter_price = $('input[name=\"filter_price"]').val();
    var filter_to = $('input[name=\"filter_to"]').val();
    var filter_deliver = $('input[name=\"filter_deliver"]').val();
    var filter_booking_id = $('input[name=\"filter_booking_id"]').val();
   if (filter_customer) {
		url += '&filter_customer=' + encodeURIComponent(filter_customer);
	}
     if (filter_distance) {
		url += '&filter_distance=' + encodeURIComponent(filter_distance);
	}
      if (filter_form) {
		url += '&filter_form=' + encodeURIComponent(filter_form);
	}  
    if (filter_price) {
		url += '&filter_price=' + encodeURIComponent(filter_price);
	}    
    if (filter_to) {
		url += '&filter_to=' + encodeURIComponent(filter_to);
	} 
    if (filter_deliver) {
		url += '&filter_deliver=' + encodeURIComponent(filter_deliver);
	} 
    if (filter_booking_id) {
		url += '&filter_booking_id=' + encodeURIComponent(filter_booking_id);
	}
  
//    alert(url);
	location = url; 
});
   
//--></script>
<script type="text/javascript">

    function getCustomer(id)
    {
        //alert(id);
     document.getElementById("dialog").style.display = "block";
     document.getElementById("book_id").value=id;
    }
     
</script>
<script type="text/javascript">

    function myfunction()
    {
        
     var telecaller_id=document.getElementById('telecaller_name').value;
     var book_id=document.getElementById('book_id').value;
      var alldata= {
                        first:telecaller_id,
                        second:book_id
                    };
         $.ajax({
    type:'POST',
    data: alldata,
    url:'index.php?route=details/notbooking_asigned/asign&token=<?php echo $_GET["token"]; ?>',
    success:function(data){
        $("#dataa").html(data);
    location.reload();

                  },
    
    error:function(data){
    alert("error: " + data);
   }
});
$('#dialog').hide()
//window.onload();
    }
     
</script>

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
<style>
 
 
.window {
  position:absolute;
  left:30%;
  top:10%;
  width:500px !important;
  min-height:160px !important;
  z-index:9999;
  padding:20px;
  border:10px #404040 solid;
  -moz-box-shadow:0px 0px 3px #000;
  -webkit-box-shadow:0px 0px 3px #000;
  box-shadow:0px 0px 15px #000;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
     background-color:white ;
}
.event_viewbx
{
    margin:0px;
    padding:20px;
    position:relative;
    background:url(images/grid_noise.png) repeat;
   
}
 
.txt_bx{ margin:0px; padding:5px 0px; width:440px;}
.txt_bx span
{
    color: #666666;
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 0.001em;
    padding:0px 5px;
}
.ui-corner-all 
{
    position:absolute;
    top:8px;
    right:0px;
    z-index:10000;
    color:#ed827c;
    font-size:12px;
 
 
}
.ui-corner-all a{text-indent:-999px !important; background:url(images/evnt_close.png) no-repeat !important;
    width:12px; height:12px;}
 
 
 
</style>