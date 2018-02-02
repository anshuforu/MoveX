
<?php echo $header;?><?php echo $column_left; ?>
<?php //print_r($total_vehicle); ?>
  
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
     <button type="submit" form="form-customer" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
  <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="Back" class="btn btn-default"><i class="fa fa-reply"></i></a>

            </div>
      <h1>Add Booking</h1>
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
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">
                  <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-store"><?php echo $entry_customer_group; ?></label>
             
                <div class="col-sm-10">
                            <input type="text" name="customer_name" value="<?php if(isset($custname))echo $custname; ?>" placeholder="<?php echo $entry_customer_group; ?>" id="customer_name" class="form-control" />
                        <?php if ($error_name) { ?>
              <div class="text-danger"><?php echo $error_name; ?></div>
              <?php } ?>
                </div>
              </div> 
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-mobile"><?php echo $entry_mobile_number; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="mobile" maxlength="10" value="<?php if(isset($customer_mobile_no))echo $customer_mobile_no; ?>" placeholder="<?php echo $entry_mobile_number; ?>" id="mobile" class="form-control"  />
                  <?php if ($error_number_ph) { ?>
              <div class="text-danger"><?php echo $error_number_ph; ?></div>
              <?php } ?>    

            </div>
          </div>
            
                       <?php   if(isset($_GET['customer_id']))
                    { ?>
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-store"><?php echo $entry_customer_number; ?></label>
             
                <div class="col-sm-10">
      
 <input type="text" name="customer_number" value="<?php echo $username; ?>" placeholder="<?php echo $entry_customer_number; ?>" id="customer_name" class="form-control" maxlength="10" readonly="readonly"/>
                    
                 
                    <?php if ($error_number_ph) { ?>
              <div class="text-danger"><?php echo $error_number_ph; ?></div>
              <?php } ?>
                    
                </div>
              </div>
             <?php  } ?>
         <!--   <div id="addbtn">
                <a href="http://192.168.0.60/hirelorry/admin/index.php?route=sale/customer/add&token=d8e8aaa189121e4b08a50186bf41bc35">Add Customer</a>
            </div>-->
   
                  <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-vehicle"><?php echo $vehicle; ?></label>
             
                <div class="col-sm-10">
                    
						      <select name="vehicle_name" id="vehicle_type" class="form-control">
                                <option value="0">Select Vehicle </option>
                                    <?php  foreach ($total_vehicle as $vehicle) { 
?>
         <option value="<?php echo $vehicle['vehicle_type_id']; ?>" <?php if(isset($vehicle_id))echo ($vehicle['vehicle_type_id'] == $vehicle_id)?"selected='selected'":""?>><?php echo $vehicle['vehicle_type_name']; ?></option>
    <?php } ?>
                                <!--<?php foreach ($total_vehicle as $vehicle) { ?>
                                <?php if ($vehicle['vehicle_type_id'] == $vehicle_id) { ?>
                                <option value="<?php echo $vehicle['vehicle_type_id']; ?>" selected="selected"><?php echo $vehicle['vehicle_type_name']; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $vehicle['vehicle_type_id']; ?>"><?php echo $vehicle['vehicle_type_name']; ?></option>
                                <?php } ?>
                                <?php } ?>-->
                                </select>
                    <?php if ($error_vehicle) { ?>
              <div class="text-danger"><?php echo $error_vehicle; ?></div>
              <?php } ?>
                            </div>
                                    <input type="hidden" name="priceval" value="<?php //echo $form; ?>" placeholder="<?php echo $entry_name; ?>" id="priceval" class="form-control" onkeyup=getprice() />

                      </div> 
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-vehicle"><?php echo $service_type; ?></label>
             
                <div class="col-sm-10">
						      <select name="service_type" id="vehicle_type" class="form-control">
                                <option value="0">Select Service Type </option>
                                   <?php  foreach ($total_service as $service) { 
?>
         <option value="<?php echo $service['service_type_id']; ?>" <?php if(isset($service_id))echo ($service['service_type_id'] == $service_id)?"selected='selected'":""?>><?php echo $service['Name'];?></option>
    <?php } ?>
                                <!--<?php foreach ($total_service as $service) { ?>
                                <?php if ($service['service_type_id'] == $_GET['service_type']) { ?>
                                <option value="<?php if(isset($service))echo $service['service_type_id']; ?>" selected="selected"><?php echo $service['Name']; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $service['service_type_id']; ?>"><?php echo $service['Name']; ?></option>
                                <?php } ?>
                                <?php } ?>-->
                                </select>
                    <?php if ($error_service_type) { ?>
              <div class="text-danger"><?php echo $error_service_type; ?></div>
              <?php } ?>
                            </div>
                                    <input type="hidden" name="priceval" value="<?php //echo $form; ?>" placeholder="<?php echo $entry_name; ?>" id="priceval" class="form-control" onkeyup=getprice() />

                      </div>
         <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_name; ?></label>
            <div class="col-sm-10">
              <input type="text" name="form" value="<?php if(isset($from))echo $from; ?>" placeholder="<?php echo $entry_name; ?>" id="txtAutocomplete" class="form-control" onkeyup="initialize()" />
                <?php if ($error_from) { ?>
              <div class="text-danger"><?php echo $error_from; ?></div>
              <?php } ?>

          </div>
              </div>
            
         <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-address"><?php echo $entry_address; ?></label>
            <div class="col-sm-10">
              <input type="text" name="to" value="<?php if(isset($to))echo $to; ?>" placeholder="<?php echo $entry_address; ?>" id="txtAutocomplete_off" class="form-control" />
                 <?php if ($error_to) { ?>
              <div class="text-danger"><?php echo $error_to; ?></div>
              <?php } ?>
                <input type="hidden" name="cus" value="<?php echo $customer_id; ?>" placeholder="<?php echo $entry_address; ?>" id="txtAutocomplete_off" class="form-control" />
                


          </div>

               <div id="map"></div>
            
              </div>
                
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_number; ?></label>
            <div class="col-sm-10">
                      <input type="text" onfocus="initMap()" name="distance" value="<?php if(isset($distance))echo $distance; ?>" placeholder="<?php echo $entry_number; ?>" id="total" class="form-control" />
           <?php if ($error_distance) { ?>
              <div class="text-danger"><?php echo $error_distance; ?></div>
              <?php } ?>

            </div>
          </div>
    <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $distanceprice; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="price" value="<?php if(isset($price))echo $price; ?>" placeholder="<?php echo $distanceprice; ?>" id="input-price" class="form-control" onfocus="calcprice()"   />
                 <?php if ($error_price) { ?>
              <div class="text-danger"><?php echo $error_price; ?></div>
              <?php } ?>

            </div>
          </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $delivertime; ?></label>
            <div class="col-sm-10">
                      <input type="text" style="height:35px;width:100%;display:block;border-radius:3px;border: 1px solid #cccccc;" name="deliver_time" value="<?php if(isset($deliver_date))echo $deliver_date; ?>" placeholder="<?php echo $delivertime; ?>" id="input-deliver" class="date" />
          <?php if ($error_deliver_time) { ?>
              <div class="text-danger"><?php echo $error_deliver_time; ?></div>
              <?php } ?>  
            </div>
          </div>
            

             <!--  <div class="form-group">
                   <label class="col-sm-2 control-label" for="input-number"><?php echo $delivertime; ?></label>
                    <div class="col-sm-10">
                  <input type="text" name="filter_date_added" value="<?php //echo $filter_date_added; ?>" placeholder="<?php echo $delivertime; ?>" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control date" /></div>
              </div>
-->
        <br><p><b>Enter Exact Pick Up Location</b></p><br>

                 <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-add"><?php echo $entry_add; ?></label>
            <div class="col-sm-10">
                      <textarea name="add" value="<?php echo $address;?>" placeholder="<?php echo $entry_add; ?>" id="add" class="form-control"><?php echo $address;?></textarea>
                <?php if ($error_add) { ?>
              <div class="text-danger"><?php echo $error_add; ?></div>
              <?php } ?>


            </div>
          </div>
        
<div class="form-group required">
            <label class="col-sm-2 control-label" for="input-city"><?php echo $entry_city; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="city" value="Pune" placeholder="<?php echo $entry_city; ?>" id="city" class="form-control"  />
                        <?php if ($error_city) { ?>
              <div class="text-danger"><?php echo $error_city; ?></div>
              <?php } ?>

            </div>
          </div>
                      <div class="form-group">
                <label class="col-sm-2 control-label" for="input-state"><?php echo $entry_state; ?></label>
             
                <div class="col-sm-10">
                           <select name="state" id="state" class="form-control">
 <option value="Maharashtra">Maharashtra</option>

	<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
</select>	
                                             <?php if ($error_state_name) { ?>
              <div class="text-danger"><?php echo $error_state_name; ?></div>
              <?php } ?>
                </div>
              </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-pin"><?php echo $entry_pin; ?></label>
            <div class="col-sm-10">
                      <input type="text" maxlength="6" name="pin" value="<?php if(isset($pin))echo $pin; ?>" placeholder="<?php echo $entry_pin; ?>" id="pin" class="form-control"  />
                  <?php if ($error_pin) { ?>
              <div class="text-danger"><?php echo $error_pin; ?></div>
              <?php } ?>

            </div>
          </div>   
   

        </form>
      
      </div>
    </div>
    <button type="submit" form="form-product" data-toggle="tooltip" title="Submit" class="btn btn-primary">Submit</button>
  </div>
</div>



	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtsYdbuKc1iyHl2R6cWHKi1vrVe0GwCXU&libraries=places"></script>
<script type="text/javascript">
google.maps.event.addDomListener(window, 'load', initialize);
function initialize() {
var defaultBounds = new google.maps.LatLngBounds(
  new google.maps.LatLng(18.5203, 73.8567),
  new google.maps.LatLng(18.5203, 73.8567));
    var options = {
  bounds: defaultBounds,
 componentRestrictions: {country: 'in'}
};
var autocomplete = new google.maps.places.Autocomplete(document.getElementById('txtAutocomplete'),options);
autocomplete.addListener(autocomplete, 'place_changed', function () {
// Get the place details from the autocomplete object.
var place = autocomplete.getPlace();
document.getElementById('txtAutocomplete').value =place;
});
  var autocomplete_off = new google.maps.places.Autocomplete(document.getElementById('txtAutocomplete_off'),options);  
    autocomplete_off.addListener(autocomplete_off, 'place_changed', function () {
// Get the place details from the autocomplete object.
var place = autocomplete_off.getPlace();
document.getElementById('txtAutocomplete_off').value = place;
});
}
</script>
	    <script>
function initMap() {
    //alert();
  var directionsDisplay = new google.maps.DirectionsRenderer;
  var directionsService = new google.maps.DirectionsService;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 7,
    center: {lat: 41.85, lng: -87.65}
  });
     directionsDisplay.addListener('directions_changed', function() {
    computeTotalDistance(directionsDisplay.getDirections());
  });
  directionsDisplay.setMap(map);
 // directionsDisplay.setPanel(document.getElementById('right-panel'));

  /*var control = document.getElementById('floating-panel');
  control.style.display = 'block';
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
*/
  var onChangeHandler = function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  };
    onChangeHandler();
  document.getElementById('txtAutocomplete').addEventListener('onfocus', onChangeHandler);
  document.getElementById('txtAutocomplete_off').addEventListener('onfocus', onChangeHandler);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    //alert(document.getElementById('txtAutocomplete_off').value);
  var start = document.getElementById('txtAutocomplete').value;
  var end = document.getElementById('txtAutocomplete_off').value;
  directionsService.route({
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}
  var total = 0;       
        function computeTotalDistance(result) {
 
  var myroute = result.routes[0];
  for (var i = 0; i < myroute.legs.length; i++) {
    total += myroute.legs[i].distance.value;
  }
  total = total / 1000;
       var total1=Math.round(total)
  document.getElementById('total').value = total1; 
            calcprice();

        }       
            
    </script>


<script type="text/javascript">

    function calcprice()
    {
        
            <?php foreach ($total_vehicle as $vehicle) { 
      // $val=0;
       $val=$vehicle['vehicle_type_price'];
       $vehicle_base_fair=$vehicle['vehicle_base_fair'];
       $vehicle_base_km=$vehicle['vehicle_base_km'];
        ?>
        var distance=document.getElementById('total').value;
        var vehicle=document.getElementById('vehicle_type').value;
         var id = "<?= $vehicle['vehicle_type_id']; ?>";
       // alert(id);
         if(vehicle==id)
         {
           var price = "<?= $val; ?>";
           var vehicle_base_fair = "<?= $vehicle_base_fair; ?>";
           var vehicle_base_km_price = "<?= $vehicle_base_km; ?>";
         }
        
     <?php } ?>
           var distance=document.getElementById('total').value;
          if(distance > 10)
            {
           
                var distance_calculate1=distance-vehicle_base_fair;
            var total_price1=distance_calculate1*price;
            var total_price=(total_price1)+(total_price1/2)+ +vehicle_base_km_price;
            }
            else {
            var distance_calculate1=distance-vehicle_base_fair;
        var distance_calculate;
          if(distance_calculate1<0)
          {
              distance_calculate=0;
          }else{
              distance_calculate=distance_calculate1;
          }
        var total_price1=distance_calculate*price;
               
         var total_price=+total_price1 + +vehicle_base_km_price;
        
            
       /* var distance_calculate;
          if(distance_calculate1<0)
          {
              distance_calculate=0;
          }else{
              distance_calculate=distance_calculate1;
          }
        var total_price1=distance_calculate*price;
         var total_price=+total_price1 + +vehicle_base_km_price;*/
        
              // var total2=Math.round(total_price * 100) / 100
               }
       document.getElementById('input-price').value=total_price;
    }
     
</script>
<script type="text/javascript">

    function addbutton(id)
    {
       if(id=='A')
       {
           $("#addbtn").show();
       }else
       {
            $("#addbtn").hide();
       }
    }
     
</script>
<script type="text/javascript">
$("#addbtn").hide();
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