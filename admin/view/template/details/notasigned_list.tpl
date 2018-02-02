<?php $asined_list=isset($asined_list)?$asined_list:"";   
 ?>

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
                <label class="control-label" for="input-name"><?php echo $label_filter_name; ?></label>
                <input type="text" name="filter_name" value="<?php //echo $filter_name; ?>" placeholder="<?php echo $label_filter_name; ?>" id="input-name" class="form-control" />
              </div>
            </div>
                        <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-address"><?php echo $label_filter_address; ?></label>
                <input type="text" name="filter_address" value="<?php //echo $filter_address; ?>" placeholder="<?php echo $label_filter_address; ?>" id="input-address" class="form-control" />
              </div>
           
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-number"><?php echo $label_filter_number; ?></label>
                  
                <input type="text" name="filter_number" value="<?php //echo $filter_number; ?>" placeholder="<?php echo $label_filter_number; ?>" id="input-number" class="form-control date" />
              </div>
            <button type="button" id="button_filter" class="btn btn-info pull-right"><i class="fa fa-search"></i> <?php echo $button_filter; ?></button>
            </div>
           
				
              
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
                  <!--<td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>-->
                  <td class="text-left"><?php if ($sort == 'name') { ?>
                    <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
                    <?php } ?></td>
                    <td class="text-left"><?php if ($sort == 'name') { ?>
                    <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_from; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_name; ?>"><?php echo $column_from; ?></a>
                    <?php } ?></td>
                    <td class="text-left"><?php if ($sort == 'name') { ?>
                    <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_to; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_name; ?>"><?php echo $column_to; ?></a>
                    <?php } ?></td>
                     <td class="text-left"><?php if ($sort == 'address') { ?>
                    <a href="<?php echo $sort_address; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_address; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_address; ?>"><?php echo $column_address; ?></a>
                    <?php } ?></td>
                    <td class="text-left"><?php if ($sort == 'name') { ?>
                    <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_mobile_no; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_name; ?>"><?php echo $column_mobile_no; ?></a>
                    <?php } ?></td>
                     <td class="text-left"><?php if ($sort == 'number') { ?>
                    <a href="<?php echo $sort_number; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_number; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_number; ?>"><?php echo $column_number; ?></a>
                    <?php } ?></td>   
                    <td class="text-left" style="width:150px"><?php if ($sort == 'number') { ?>
                    <a href="<?php echo $sort_number; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_asign; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_number; ?>"><?php echo $column_asign; ?></a>
                    <?php } ?></td>
                
                  <!--<td class="text-right"><?php echo $column_action; ?></td>-->
                </tr>
              </thead>
              <tbody>
                <?php if ($asined_list) { ?>
                <?php foreach ($asined_list as $asign) {
                 
?>
                <tr>
                  <!--<td class="text-center"><?php if (in_array($asign['id'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $asign['id']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $asign['id']; ?>" />
                    <?php } ?></td>-->
                    <td class="text-left"><a href="<?php echo $asign['new_link']; ?>"><?php echo $asign['booking_id']; ?></a></td>
                       <td class="text-left"><?php echo $asign['from']; ?></td>
                       <td class="text-left"><?php echo $asign['to']; ?></td>
                    <td class="text-left"><?php echo $asign['telecaller']; ?></td>
                    <td class="text-left"><?php echo $asign['customer_mobile_no']; ?></td>
                    <td class="text-left"><?php echo date('d-m-Y H:m:s',strtotime($asign['customer'])); ?></td>
                    <td class="text-left">
                        <a href="<?php echo $asign['view']; ?>" data-toggle="tooltip" title="View" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;<input type="button" class="btn btn-primary" value="Assign" onclick="getCustomer('<?php echo $asign['booking_id']; ?>')"></td>
               
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
<script type="text/javascript">
$('#button_filter').on('click', function() {
  
	var url = 'index.php?route=details/notbooking_asigned&token=<?php echo $_GET["token"]; ?>';
    var filter_name = $('input[name=\"filter_name"]').val();
    var filter_address = $('input[name=\"filter_address"]').val();
    var filter_number = $('input[name=\"filter_number"]').val();
   if (filter_name) {
		url += '&filter_name=' + encodeURIComponent(filter_name);
	}
     if (filter_address) {
		url += '&filter_address=' + encodeURIComponent(filter_address);
	}
      if (filter_number) {
		url += '&filter_number=' + encodeURIComponent(filter_number);
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
