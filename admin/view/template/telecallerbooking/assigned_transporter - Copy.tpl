<?php //print_r($transporter_names);die; ?>

<?php echo $header;?><?php echo $column_left; ?>
       
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
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $heading_title; ?></h3>
      </div>
      <div class="panel-body">
                      <label><b>Booking Id</b> </label>: #<b><?php echo $booking_id;?></b>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">

            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $column_vehicle; ?></label>
            <div class="col-sm-10">
     
                 <select id="vehicle_id" name="vehicle_id" value="" class="form-control" onchange="check()">
                     <option value=0>Select Vehicle Name</option>
                <?php //print_r($vehicle_type);
foreach ($all_vehicle as $vehicle) { ?>
                       
                          <option value="<?php echo $vehicle['vehicle_type_id']; ?>"><?php echo $vehicle['vehicle_type_name']; ?></option>
                          <?php } ?>    
                        
                 
                        </select>
              
            </div>
          </div>
            
 <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-vehicle"><?php echo $transporter_name; ?></label>
            <div class="col-sm-10">
               <div id="dataa">
                 <select id="transporter_id" name="transporter_id" value="" class="form-control" onchange="my(this.value)">
                     <option value=0>Select Transpoter</option>
                <?php 
foreach ($transporter_names as $transporter) { ?>
                       
                          <option value="<?php echo $transporter['vendor_id']; ?>"><?php echo $transporter['vendor_name']; ?></option>
                          <?php } ?>    
                        
                 
                     </select>
                   
              </div>
            </div>
          </div>
            
                  <div class="form-group required">
                      
            <label class="col-sm-2 control-label" for="input-vehicle"><?php echo $vehicle_no; ?></label>
            <div class="col-sm-10">
                <div id="vehicle_number">
                      <select id="vehicle_no" name="vehicle_no" value="" class="form-control" onchange="my(this.value)">
                     <option value=0>Select Vehicle</option>
                <?php 
foreach ($vehicle_number_da as $vehic) { ?>
                       
                          <option value="<?php echo $vehic['vehicle_no']; ?>"><?php echo $vehic['vehicle_no']; ?></option>
                          <?php } ?>    
                        
                 
                     </select>
              </div>
             
      
            </div>
          </div>
                  <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $licence_no; ?></label>
            <div class="col-sm-10">
              <input type="text" name="licence_no" value="" placeholder="<?php echo $licence_no; ?>" id="input-name" class="form-control" />
  >
      
            </div>
          </div>
                  <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $mobile_no; ?></label>
            <div class="col-sm-10">
              <input type="text" name="mobile_no" value="" placeholder="<?php echo $mobile_no; ?>" id="input-name" class="form-control" />
   
      
            </div>
          </div>
                  <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $vehicle_type; ?></label>
            <div class="col-sm-10">
              <input type="text" name="vehicle_type" value="" placeholder="<?php echo $vehicle_type; ?>" id="input-name" class="form-control" />
          
            </div>
          </div>
            <div id="dataa"></div>
                  <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $address; ?></label>
            <div class="col-sm-10">
              <input type="text" name="address" value="" placeholder="<?php echo $address; ?>" id="input-name" class="form-control" />
          
                <!--<select name="name" value="" class="form-control">
                <?php foreach ($car_center_list as $car_centers) { ?>
                        <?php if ($car_centers['id'] == $id) { ?>
						 <!-- <option value="<?php echo $car_centers['name']; ?>" selected="selected"><?php echo $car_centers['name']; ?></option>
                    <input type="text" name="name" value="<?php echo $name;?>" id="input-name" class="form-control">
                          <?php } else{ ?>
                          <option value=""><?php echo $car_centers['name']; ?></option>
                          <?php } ?>    
                          <?php } ?>
                 
                        </select>-->
      
            </div>
          </div>
         
                    </div>
                      </div>
   
           <!--<input type="button" class="btn btn-primary" value="Assign" onclick="loopForm(document.thisForm);" style="float:right;"> -->
              
            
    
          <tbody>
        
             </table>
              
              </form>
                 
               </div>
  </div>
             </div>
      
</form>
          </div>
            </div>
 <script type="text/javascript">
    $('select[name=\'vehicle_id\']').on('change', function() {
    $.ajax({
    type:'POST',
    data: 'id=' + this.value,
    url:'index.php?route=telecallerbooking/assigned_transporter/test&token=<?php echo $_GET["token"]; ?>',
    success:function(data){
        $("#dataa").html(data);
                  },
    error:function(data){
    alert("error: " + data);
   }
});
});
     </script>
<script type="text/javascript">
 function my(id)
    {
        $.ajax({
    type:'POST',
    data: 'id=' +id,
    url:'index.php?route=telecallerbooking/assigned_transporter/abc&token=<?php echo $_GET["token"]; ?>',
    success:function(data){
        $("#vehicle_number").html(data);
        //alert();
                  },
    error:function(data){
    alert("error: " + data);
   }
});
    
    }
     </script>
<?php echo $footer; ?> 