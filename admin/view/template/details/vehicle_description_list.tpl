<?php echo $header; ?><?php echo $column_left; 
//echo $userid;die;
?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
        <?php if($userid==1){ ?>
      <div class="pull-right"><a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-country').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
     <?php } ?>
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
    <?php }
else{if (isset($id)){
if ($update) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $update; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php }}} ?>
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
                <input type="text" name="filter_name" value="<?php echo $filter_name; ?>" placeholder="<?php echo $label_filter_name; ?>" id="input-name" class="form-control" onkeypress="runAddress(event)"/>
              </div>
                       
              <div class="form-group">
                <label class="control-label" for="input-number"><?php echo $label_filter_area; ?></label>
                <input type="text" name="filter_area" value="<?php echo $filter_area; ?>" placeholder="<?php echo $label_filter_area; ?>" id="input-area" class="form-control" onkeypress="runAddress(event)"/>
              </div>
                          <div class="form-group">
                <label class="control-label" for="input-make"><?php echo $label_filter_make; ?></label>
                <input type="text" name="filter_make" value="<?php echo $filter_make; ?>" placeholder="<?php echo $label_filter_make; ?>" id="input-make" class="form-control" onkeypress="runAddress(event)"/>
   
                                  </div>
              
            </div>
                        <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-address"><?php echo $label_filter_vehicle_no; ?></label>
                <input type="text" name="filter_vehicle_no" value="<?php echo $filter_vehicle_no; ?>" placeholder="<?php echo $label_filter_vehicle_no; ?>" id="input-vehicle_no" class="form-control" onkeypress="runAddress(event)"/>
              </div>
                  
              <div class="form-group">
                <label class="control-label" for="input-number"><?php echo $label_filter_subarea; ?></label>
                <input type="text" name="filter_subarea" value="<?php echo $filter_subarea; ?>" placeholder="<?php echo $label_filter_subarea; ?>" id="input-subarea" class="form-control" onkeypress="runAddress(event)"/>
              </div>
                        <div class="form-group">
                <label class="control-label" for="input-model"><?php echo $label_filter_model; ?></label>
                <input type="text" name="filter_model" value="<?php echo $filter_model; ?>" placeholder="<?php echo $label_filter_model; ?>" id="input-model" class="form-control" onkeypress="runAddress(event)"/>
   
                                  </div>      
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-number"><?php echo $label_filter_vehicle_type; ?></label>
                <input type="text" name="filter_vehicle_type" value="<?php echo $filter_vehicle_type; ?>" placeholder="<?php echo $label_filter_vehicle_type; ?>" id="input-vehicle_type" class="form-control" onkeypress="runAddress(event)"/>
              </div>
                       
              <div class="form-group">
                <label class="control-label" for="input-number"><?php echo $label_filter_city; ?></label>
                <input type="text" name="filter_city" value="<?php echo $filter_city; ?>" placeholder="<?php echo $label_filter_city; ?>" id="input-city" class="form-control" onkeypress="runAddress(event)"/>
   
                                  </div>
           
				
              
            </div>
                 <button type="button" id="button_filter" class="btn btn-primary pull-right"><i class="fa fa-search"></i> <?php echo $button_filter; ?></button>                     
           
            </div>
               
           
          </div>
        </div>
        <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-country">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                    <?php if($userid==1){ ?>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                    <?php } ?>
                           <td class="text-left"><?php if ($sort == 'id') { ?>
                    <a href="<?php echo $sort_id; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_id; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_id; ?>"><?php echo $column_id; ?></a>
                    <?php } ?></td>
                      <td class="text-left"><?php if ($sort == 'name') { ?>
                    <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name_new; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_name; ?>"><?php echo $column_name_new; ?></a>
                    <?php } ?></td>
                  <td class="text-left"><?php if ($sort == 'no') { ?>
                    <a href="<?php echo $sort_number; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_number; ?>"><?php echo $column_name; ?></a>
                    <?php } ?></td>
                     <td class="text-left"><?php if ($sort == 'type') { ?>
                    <a href="<?php echo $sort_vehicle_type; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_address; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_vehicle_type; ?>"><?php echo $column_address; ?></a>
                    <?php } ?></td>
                     <td class="text-left"><?php if ($sort == 'email') { ?>
                    <a href="<?php echo $sort_make; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_make; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_make; ?>"><?php echo $column_make; ?></a>
                    <?php } ?></td>
                     <td class="text-left"><?php if ($sort == 'number') { ?>
                    <a href="<?php echo $sort_model; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_model; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_model; ?>"><?php echo $column_model; ?></a>
                    <?php } ?></td>
                     <td class="text-left"><?php if ($sort == 'number') { ?>
                    <a href="<?php echo $sort_area; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_area; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_area; ?>"><?php echo $column_area; ?></a>
                    <?php } ?></td>
                              <td class="text-left"><?php if ($sort == 'number') { ?>
                    <a href="<?php echo $sort_subarea; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_subarea; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_subarea; ?>"><?php echo $column_subarea; ?></a>
                    <?php } ?></td>
                              <td class="text-left"><?php if ($sort == 'number') { ?>
                    <a href="<?php echo $sort_city; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_city; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_city; ?>"><?php echo $column_city; ?></a>
                    <?php } ?></td>
                
                  <td class="text-right"><?php echo $column_action; ?></td>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($vehicle_list)) { 
                 foreach ($vehicle_list as $vehicle) {

?>
                <tr>
                    <?php if($userid==1){ ?>
                  <td class="text-center"><?php if (in_array($vehicle['vehicle_description_id'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $vehicle['vehicle_description_id']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $vehicle['vehicle_description_id']; ?>" />
                    <?php } ?></td>
                    <?php } ?>
                  <td class="text-left"><a href="<?php echo $vehicle['view']; ?>"><?php echo $vehicle['id']; ?></a></td>
                      <td class="text-left"><?php echo $vehicle['name']; ?></td>
                    <td class="text-left"><?php echo $vehicle['vehicle_no']; ?></td>
                    <td class="text-left"><?php echo $vehicle['vehicle_type']; ?></td>
                    <td class="text-left"><?php echo $vehicle['make']; ?></td>
                    <td class="text-left"><?php echo $vehicle['model']; ?></td>
                      <td class="text-left"><?php echo $vehicle['area']; ?></td>
                    <td class="text-left"><?php echo $vehicle['subarea']; ?></td>
                      <td class="text-left"><?php echo $vehicle['city']; ?></td>
                    
                             <td class="text-right"><a href="<?php echo $vehicle['info']; ?>" data-toggle="tooltip" title="<?php echo $button_view; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>  
                                 <?php if($userid==1){ ?>
                                 &nbsp;&nbsp;&nbsp;<a href="<?php echo $vehicle['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                  <?php } ?>
                    </td>
                   
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
   // alert("hello");
    
	var url = 'index.php?route=details/vehicle_description&token=<?php echo $_GET["token"]; ?>';
    var filter_name = $('input[name=\"filter_name"]').val();
    var filter_address = $('input[name=\"filter_vehicle_no"]').val();
    var filter_number = $('input[name=\"filter_vehicle_type"]').val();
     var filter_area = $('input[name=\"filter_area"]').val();
     var filter_subarea = $('input[name=\"filter_subarea"]').val();
     var filter_city = $('input[name=\"filter_city"]').val();
       var filter_make = $('input[name=\"filter_make"]').val();
       var filter_model = $('input[name=\"filter_model"]').val();
   if (filter_name) {
		url += '&filter_name=' + encodeURIComponent(filter_name);
	}
     if (filter_address) {
		url += '&filter_address=' + encodeURIComponent(filter_address);
	}
      if (filter_number) {
		url += '&filter_number=' + encodeURIComponent(filter_number);
	}
        if (filter_area) {
		url += '&filter_area=' + encodeURIComponent(filter_area);
	}
      if (filter_subarea) {
		url += '&filter_subarea=' + encodeURIComponent(filter_subarea);
	}
       if (filter_city) {
		url += '&filter_city=' + encodeURIComponent(filter_city);
	}
    
     if (filter_make) {
		url += '&filter_make=' + encodeURIComponent(filter_make);
	}
    
     if (filter_model) {
		url += '&filter_model=' + encodeURIComponent(filter_model);
	}
  
//    alert(url);
	location = url; 
});
//--></script> 
<script>
    function runAddress(e) {
    if (e.keyCode == 13) {

	var url = 'index.php?route=details/vehicle_description&token=<?php echo $_GET["token"]; ?>';
      var filter_name = $('input[name=\"filter_name"]').val();
    var filter_address = $('input[name=\"filter_vehicle_no"]').val();
    var filter_number = $('input[name=\"filter_vehicle_type"]').val();
     var filter_area = $('input[name=\"filter_area"]').val();
     var filter_subarea = $('input[name=\"filter_subarea"]').val();
     var filter_city = $('input[name=\"filter_city"]').val();
       var filter_make = $('input[name=\"filter_make"]').val();
       var filter_model = $('input[name=\"filter_model"]').val();
		
  if (filter_name) {
		url += '&filter_name=' + encodeURIComponent(filter_name);
	}
     if (filter_address) {
		url += '&filter_address=' + encodeURIComponent(filter_address);
	}
      if (filter_number) {
		url += '&filter_number=' + encodeURIComponent(filter_number);
	}
        if (filter_area) {
		url += '&filter_area=' + encodeURIComponent(filter_area);
	}
      if (filter_subarea) {
		url += '&filter_subarea=' + encodeURIComponent(filter_subarea);
	}
       if (filter_city) {
		url += '&filter_city=' + encodeURIComponent(filter_city);
	}
    
     if (filter_make) {
		url += '&filter_make=' + encodeURIComponent(filter_make);
	}
    
     if (filter_model) {
		url += '&filter_model=' + encodeURIComponent(filter_model);
	}
  
//    alert(url);
	location = url; 
}
}
    </script> 
<script type="text/javascript"><!--
$('input[name=\'filter_name\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: 'index.php?route=details/vendor/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
			dataType: 'json',
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['name'],
						value: item['product_id']
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'filter_name\']').val(item['label']);
	}
});
    </script>
