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
                <label class="control-label" for="input-name"><?php echo $label_name; ?></label>
                <input type="text" name="label_filter_name" value="<?php echo $label_filter_name; ?>" placeholder="<?php echo $label_name; ?>" id="input-name" class="form-control" onkeypress="runScript(event)"  />
              </div>             <div class="form-group">
                <label class="control-label" for="input-email"><?php echo $label_email; ?></label>
                <input type="text" name="label_filter_email" value="<?php echo $label_filter_email; ?>" placeholder="<?php echo $label_email; ?>" id="input-email" class="form-control" onkeypress="runEmail(event)"  />
              </div>
            </div>
                        <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-address"><?php echo $label_address; ?></label>
                <input type="text" name="label_filter_address" value="<?php echo $label_filter_address; ?>" placeholder="<?php echo $label_address; ?>" id="input-address" class="form-control" onkeypress="runAddress(event)" />
              </div>
           
            </div>
            <div class="col-sm-4">
                 <div class="form-group">
                <label class="control-label" for="input-ph-no"><?php echo $label_num; ?></label>
                <input type="text" name="label_filter_num" value="<?php echo $label_filter_num; ?>" placeholder="<?php echo $label_num; ?>" id="input-number" class="form-control" onkeypress="runNumber(event)" maxlength="10" />
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
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left"><?php if ($sort == 'name') { ?>
                    <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $label_name; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_name; ?>"><?php echo $label_name; ?></a>
                    <?php } ?></td>
                    <td class="text-left"><?php if ($sort == 'number') { ?>
                    <a href="<?php echo $sort_number; ?>" class="<?php echo strtolower($order); ?>"><?php echo $label_num; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_number; ?>"><?php echo $label_num; ?></a>
                    <?php } ?></td>
                    
                     <td class="text-left"><?php if ($sort == 'email') { ?>
                    <a href="<?php echo $sort_email; ?>" class="<?php echo strtolower($order); ?>"><?php echo $label_email; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_email; ?>"><?php echo $label_email; ?></a>
                    <?php } ?></td> 
                     <td class="text-left"><?php if ($sort == 'address') { ?>
                    <a href="<?php echo $sort_address; ?>" class="<?php echo strtolower($order); ?>"><?php echo $label_address; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_address; ?>"><?php echo $label_address; ?></a>
                    <?php } ?></td>
                    
                
                  <td class="text-right"><?php echo $column_action; ?></td>
                </tr>
              </thead>
              <tbody>
                <?php 
                    if ($orders) { ?>
                <?php foreach ($orders as $tele) {
                 
?>
                <tr>
                  <td class="text-center"><?php if (in_array($tele['telecaller_id'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $tele['telecaller_id']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $tele['telecaller_id']; ?>" />
                    <?php } ?></td>
                  <td class="text-left"><?php echo $tele['telecaller_name']; ?></td>
                    <td class="text-left"><?php echo $tele['telecaller_ph_no']; ?></td>
                    <td class="text-left"><?php echo $tele['telecaller_email']; ?></td>
                    <td class="text-left"><?php echo $tele['telecaller_address']; ?></td>
                   
                  <td class="text-right"><a href="<?php echo $tele['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a href="<?php echo $tele['view']; ?>" data-toggle="tooltip" title="<?php echo $button_view; ?>" class="btn btn-info"><i class="fa fa-eye"></i></a> </td>
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
<?php echo $footer; ?>
<script type="text/javascript">
$('#button_filter').on('click', function() {
    var url = 'index.php?route=telecallermanage/telecallermanage&token=<?php echo $_GET["token"]; ?>';
    var label_filter_name = $('input[name=\"label_filter_name"]').val();
    var label_filter_address = $('input[name=\"label_filter_address"]').val();
    var label_filter_email = $('input[name=\"label_filter_email"]').val();
    var label_filter_num = $('input[name=\"label_filter_num"]').val();
   if (label_filter_name) {
		url += '&label_filter_name=' + encodeURIComponent(label_filter_name);
	}
     if (label_filter_address) {
		url += '&label_filter_address=' + encodeURIComponent(label_filter_address);
	}
      if (label_filter_email) {
		url += '&label_filter_email=' + encodeURIComponent(label_filter_email);
	} 
    if (label_filter_num) {
		url += '&label_filter_num=' + encodeURIComponent(label_filter_num);
	}
 
//    alert(url);
	location = url; 
});
//--></script> 
<script type="text/javascript">
function runScript(e) {
    if (e.keyCode == 13) {

	var url = 'index.php?route=telecallermanage/telecallermanage&token=<?php echo $_GET["token"]; ?>';
    var label_filter_name = $('input[name=\"label_filter_name"]').val();
    var label_filter_address = $('input[name=\"label_filter_address"]').val();
    var label_filter_email = $('input[name=\"label_filter_email"]').val();
    var label_filter_num = $('input[name=\"label_filter_num"]').val();
   if (label_filter_name) {
		url += '&label_filter_name=' + encodeURIComponent(label_filter_name);
	}
     if (label_filter_address) {
		url += '&label_filter_address=' + encodeURIComponent(label_filter_address);
	}
      if (label_filter_email) {
		url += '&label_filter_email=' + encodeURIComponent(label_filter_email);
	} 
    if (label_filter_num) {
		url += '&label_filter_num=' + encodeURIComponent(label_filter_num);
	}
  
//    alert(url);
	location = url; 
}
}
//--></script> 
<script type="text/javascript">
function runEmail(e) {
    if (e.keyCode == 13) {

	var url = 'index.php?route=telecallermanage/telecallermanage&token=<?php echo $_GET["token"]; ?>';
    var label_filter_name = $('input[name=\"label_filter_name"]').val();
    var label_filter_address = $('input[name=\"label_filter_address"]').val();
    var label_filter_email = $('input[name=\"label_filter_email"]').val();
    var label_filter_num = $('input[name=\"label_filter_num"]').val();
   if (label_filter_name) {
		url += '&label_filter_name=' + encodeURIComponent(label_filter_name);
	}
     if (label_filter_address) {
		url += '&label_filter_address=' + encodeURIComponent(label_filter_address);
	}
      if (label_filter_email) {
		url += '&label_filter_email=' + encodeURIComponent(label_filter_email);
	} 
    if (label_filter_num) {
		url += '&label_filter_num=' + encodeURIComponent(label_filter_num);
	}
  
//    alert(url);
	location = url; 
}
}
//--></script>
<script type="text/javascript">
function runAddress(e) {
    if (e.keyCode == 13) {

	var url = 'index.php?route=telecallermanage/telecallermanage&token=<?php echo $_GET["token"]; ?>';
    var label_filter_name = $('input[name=\"label_filter_name"]').val();
    var label_filter_address = $('input[name=\"label_filter_address"]').val();
    var label_filter_email = $('input[name=\"label_filter_email"]').val();
    var label_filter_num = $('input[name=\"label_filter_num"]').val();
   if (label_filter_name) {
		url += '&label_filter_name=' + encodeURIComponent(label_filter_name);
	}
     if (label_filter_address) {
		url += '&label_filter_address=' + encodeURIComponent(label_filter_address);
	}
      if (label_filter_email) {
		url += '&label_filter_email=' + encodeURIComponent(label_filter_email);
	} 
    if (label_filter_num) {
		url += '&label_filter_num=' + encodeURIComponent(label_filter_num);
	}
  
//    alert(url);
	location = url; 
}
}
//--></script> 
<script type="text/javascript">
function runNumber(e) {
    if (e.keyCode == 13) {

	var url = 'index.php?route=telecallermanage/telecallermanage&token=<?php echo $_GET["token"]; ?>';
    var label_filter_name = $('input[name=\"label_filter_name"]').val();
    var label_filter_address = $('input[name=\"label_filter_address"]').val();
    var label_filter_email = $('input[name=\"label_filter_email"]').val();
    var label_filter_num = $('input[name=\"label_filter_num"]').val();
   if (label_filter_name) {
		url += '&label_filter_name=' + encodeURIComponent(label_filter_name);
	}
     if (label_filter_address) {
		url += '&label_filter_address=' + encodeURIComponent(label_filter_address);
	}
      if (label_filter_email) {
		url += '&label_filter_email=' + encodeURIComponent(label_filter_email);
	} 
    if (label_filter_num) {
		url += '&label_filter_num=' + encodeURIComponent(label_filter_num);
	}
  
//    alert(url);
	location = url; 
}
}
//--></script> 
