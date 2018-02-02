<?php echo $header; ?><?php echo $column_left; ?>
 <div id="content">
  <div class="page-header">
    <div class="container-fluid">
     <!-- <div class="pull-right"><a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>-->
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
     
 
            <!--<table class="table table-bordered" style="max-width:650px;float:left;">
                 <?php foreach ($view as $view_detail) {
?>
     
        <div class="tab-content">
          <!--<div class="tab-pane active" id="tab-order">-->

           
          <tr>
             <!-- <h2 style="text-align:center">Action</h2>-->
              </tr>
       <?php foreach ($view as $view_detail) {

?>
       
          <div style="float:right;position:relative;bottom:90px;right:20px;">
          <?php  if($view_detail['assigned_to_transporter']=='') {
?>
      <tr>
             <td><h3 style="text-align:center">&nbsp;</h3></td>
                 <td style="width:10px;"><a href="<?php echo $view_detail['href']; ?>" data-toggle="tooltip"  title="Assign" class="btn btn-info">Assign To Transporter</a></td>
              
                 <td style="width:10px;"><a href="<?php echo $view_detail['update']; ?>" data-toggle="tooltip" disabled="disabled" title="Update" class="btn btn-info">Update Amount</a></td>
             
                 <td style="width:10px;"><a href="<?php echo $view_detail['payment']; ?>" data-toggle="tooltip" disabled="disabled" title="Payment" class="btn btn-info">Make Payment</a></td>
               
              <?php } ?>
          <?php if(($view_detail['assigned_to_transporter']==1) && ($view_detail['amount_cal']==0.00) && ($view_detail['status']!=5)) { ?>
       <tr>
            <td ><h3 style="text-align:center">&nbsp;</h3></td>
           <td style="width:10px;"><a href="<?php echo $view_detail['href']; ?>" data-toggle="tooltip" title="Assign" class="btn btn-info" disabled="disabled">Assign To Transporter</a>
                      </td>
           
                    <td style="width:10px;"><a href="<?php echo $view_detail['update']; ?>" data-toggle="tooltip" title="Update" class="btn btn-info">Update Amount</a>
                      </td> 
          
                    <td style="width:10px;"><a href="<?php echo $view_detail['payment']; ?>" data-toggle="tooltip" title="Payment" class="btn btn-info" disabled="disabled">Make Payment</a>
                      </td>
              </tr>
             
          <?php }else if($view_detail['assigned_to_transporter']==1 && $view_detail['status']==5){ ?>
     <tr>
         <td ><h3 style="text-align:center">&nbsp;</h3></td>
      <td style="width:10px;"><a href="<?php echo $order['href']; ?>" data-toggle="tooltip" title="<?php echo $button_view; ?>" class="btn btn-info" disabled="disabled">Assigned To Transporter</a>
                      </td>
                    <td style="width:10px;"><a href="<?php echo $order['update']; ?>" data-toggle="tooltip" title="<?php echo $button_view; ?>" class="btn btn-info" disabled="disabled">Update Amount</a>
                      </td> 
              
                    <td style="width:10px;"><a href="<?php echo $order['delete']; ?>" data-toggle="tooltip" title="<?php echo $button_view; ?>" class="btn btn-info" disabled="disabled">Make Payment</a>
                      </td>
         </tr>
                    <?php }else if($view_detail['amount_cal']!=0.00 && $view_detail['assigned_to_transporter']==1) { ?>
          <tr>
             <td ><h3 style="text-align:center">&nbsp;</h3></td>
        
                      <td style="width:10px;"><a href="<?php echo $view_detail['href']; ?>" data-toggle="tooltip" title="Assign" class="btn btn-info" disabled="disabled">Assign To Transporter</a>
                      </td>
           
<td style="width:10px;"><a href="<?php echo $view_detail['update']; ?>" data-toggle="tooltip" title="Update" class="btn btn-info" disabled="disabled">Update Amount</a>
                        </td>
           
       
                   <td style="width:10px;"><a href="<?php echo $view_detail['payment']; ?>" data-toggle="tooltip" title="Payment" class="btn btn-info">Make Payment</a>
                      </td>
              </tr>
                
                    <?php }  ?>
              </div>
      <div class="container-fluid">
      <div class="panel panel-default">
         <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i><?php echo $heading_title; ?></h3>
      </div>
         <div class="panel-body">
            <table class="table table-bordered">

       <h3>Booking Details</h3><br>

                      <tr>
                    
                <th><b><?php echo $booking_id; ?></b></th>
                   <th><b><?php echo $customer; ?></b></th>
                    <th><b><?php echo $customer_mobile_no; ?></b></th>
                          <th><b><?php echo $booking_time; ?></b></th>
                          <th><b><?php echo $departure_time; ?></b></th>
                    <th><b><?php echo $form_address; ?></b></th>
                    <th><b><?php echo $to_address; ?></b></b></th>
                     <th><b><?php echo $distance; ?> (Km)</b></b></th>
                         <th><b><?php echo $distance_price; ?> (Rs)</b></b></th>
        <th><b><?php echo $vehicle_type; ?></b></b></th>
                    <th><b><?php echo $state; ?></b></th>
                          <th><b><?php echo $city; ?></b></th>
                          <th><b><?php echo $pincode ?></b></th>
                    <th><b><?php echo $exact_address; ?></b></th>
                  
               
              </tr>
                
   <tr>
       <td><?php echo isset($view_detail['id'])?$view_detail['id']:""; ?></td>
               <td><?php echo isset($view_detail['customer_name'])?$view_detail['customer_name']:""; ?></td>
          <td><?php echo isset($view_detail['customer_mobile_no'])?$view_detail['customer_mobile_no']:""; ?></td>
        <td><?php echo isset($view_detail['booking_time'])?date('d-m-Y H:i:s',strtotime($view_detail['booking_time'])):""; ?></td>
        <td><?php echo isset($view_detail['departure_time'])?date('d-m-Y H:i:s',strtotime($view_detail['departure_time'])):""; ?></td>
        <td><?php echo isset($view_detail['from_address'])?$view_detail['from_address']:""; ?></td>
        <td><?php echo isset($view_detail['to_address'])?$view_detail['to_address']:""; ?></td>
       <td><?php echo isset($view_detail['distance'])?round($view_detail['distance']):""; ?></td>
          <td><?php echo isset($view_detail['distance_price'])?$view_detail['distance_price']:""; ?></td>
        <td><?php echo isset($view_detail['vehicle_type_name'])?$view_detail['vehicle_type_name']:""; ?></td>
        <td><?php echo isset($view_detail['state'])?$view_detail['state']:""; ?></td>
        <td><?php echo isset($view_detail['booking_city'])?$view_detail['booking_city']:""; ?></td>
                   <td><?php echo isset($view_detail['pincode'])?$view_detail['pincode']:""; ?></td>
                         <td><?php echo isset($view_detail['address'])?$view_detail['address']:""; ?></td>
       
           
              </tr>
                     
            </table>
    <?php  if($view_detail['assigned_to_transporter']==1) {
?>
       
          <table class="table table-bordered">
                  <h3>Vehicle Details</h3><br>
                      <tr>
                           
                <th><b><?php echo $tarnspoter; ?></b></th>
                   <th><b><?php echo $Vehicle_no; ?></b></th>
                    <th><b><?php echo $vehicle_area; ?></b></th>
                    <th><b><?php echo $vehicle_subarea; ?></b></b></th>
                  <th><b><?php echo $vehicle_city; ?></b></th>
                  <th><b><?php echo $vehicle_lorry; ?></b></th>
                <!--<th><b><?php echo $vehicle_type; ?></b></th>-->
                <th><b><?php echo $vehicle_make; ?></b></b></th>
                  <th><b><?php echo $vehicle_model; ?></b></th>
                  <th><b><?php echo $vehicle_driver; ?></b></th>
                <th><b><?php echo $vehicle_driver_no; ?></b></th>
                    <th><b><?php echo $vehicl_li; ?></b></th>
                <th><b><?php echo $vehicle_p_labour; ?></b></th>
                  
               
              </tr>
                
   <tr>
        <td><?php echo isset($view_detail['vendor_name'])?$view_detail['vendor_name']:""; ?></td>
         <td><?php echo isset($view_detail['vehicle_no'])?$view_detail['vehicle_no']:""; ?></td>
               <td><?php echo isset($view_detail['area_name'])?$view_detail['area_name']:""; ?></td>
       <td><?php echo isset($view_detail['subarea_name'])?$view_detail['subarea_name']:""; ?></td>
                   <td><?php echo isset($view_detail['city'])?$view_detail['city']:""; ?></td>
                         <td><?php echo isset($view_detail['lorry'])?$view_detail['lorry']:""; ?></td>
     <!--  <td><?php echo isset($view_detail['vehicle_type_name'])?$view_detail['vehicle_type_name']:""; ?></td>-->
               <td><?php echo isset($view_detail['make'])?$view_detail['make']:""; ?></td>
                   <td><?php echo isset($view_detail['model'])?$view_detail['model']:""; ?></td>
                         <td><?php echo isset($view_detail['driver_name'])?$view_detail['driver_name']:""; ?></td>
                        <td><?php echo isset($view_detail['mobile_no'])?$view_detail['mobile_no']:""; ?></td>
                  <td><?php echo isset($view_detail['licence_no'])?$view_detail['licence_no']:""; ?></td>
                     <td><?php echo isset($view_detail['labour'])?$view_detail['labour']:""; ?></td>
           
              </tr>

            </table>
 <div class="container-fluid">
     <!-- <div class="pull-right"><a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>-->
        
  
    </div>
          <table class="table table-bordered">
                 <h3>Payment Details</h3><br>
                      <tr>
                           
                <th><b><?php echo $column_amount; ?></b></th>
                   <th><b><?php echo $column_paid; ?></b></th>
                    <th><b><?php echo $column_balance; ?></b></th>
                  
               
              </tr>
                
   <tr>
        <td><?php echo isset($total_amount['amount_calc'])?$total_amount['amount_calc']:""; ?></td>
       <?php $balance_amount=($total_amount['amount_calc']) - ($payment_details['total']);?>
        <td><?php echo isset($payment_details['total'])?$payment_details['total']:""; ?></td>
         <td><?php echo isset($balance_amount)?$balance_amount:""; ?></td>
              
           
              </tr>

            </table>
<?php } }?>
 

          </div>
</div>
</div>
          
        </div>
      <div class="container-fluid">
   <div class="tab-pane" id="tab-fraud">

    <!--  <table class="table table-bordered" style="max-width:200px;margin-left:800px;position:absolute;bottom:490px;text-align:center">
           
          <tr>
              <td><h2>Action</h2></td>
              </tr>
          
          <?php  if($view_detail['assigned_to_transporter']=='') {
?>
          <tr>
                 <td><a href="<?php echo $view_detail['href']; ?>" data-toggle="tooltip"  title="Assign" class="btn btn-info"><h4>Assign To Transporter</h4></a></td>
                 </tr>
            <tr>
                 <td><a href="<?php echo $view_detail['update']; ?>" data-toggle="tooltip" disabled="disabled" title="Update" class="btn btn-info"><h4>Update Amount</h4></a></td>
                 </tr>
            <tr>
                 <td><a href="<?php echo $view_detail['payment']; ?>" data-toggle="tooltip" disabled="disabled" title="Payment" class="btn btn-info"><h4>Make Payment</h4></a></td>
                 </tr>
              <?php } ?>
          <?php if(($view_detail['assigned_to_transporter']==1) && ($view_detail['amount_cal']==0.00)) { ?>
          <tr>
           <td><a href="<?php echo $view_detail['href']; ?>" data-toggle="tooltip" title="Assign" class="btn btn-info" disabled="disabled"><h4>Assign To Transporter</h4></a>
                      </td>
              </tr>
          <tr>
                    <td><a href="<?php echo $view_detail['update']; ?>" data-toggle="tooltip" title="Update" class="btn btn-info"><h4>Update Amount</h4></a>
                      </td> 
              </tr>
          <tr>
                    <td><a href="<?php echo $view_detail['payment']; ?>" data-toggle="tooltip" title="Payment" class="btn btn-info" disabled="disabled"><h4>Make Payment</h4></a>
                      </td>
              </tr>
          <?php } ?>
            <?php if($view_detail['amount_cal']!=0.00 && $view_detail['assigned_to_transporter']==1) { ?>
          
          <tr>
                      <td><a href="<?php echo $view_detail['href']; ?>" data-toggle="tooltip" title="Assign" class="btn btn-info" disabled="disabled"><h4>Assign To Transporter</h4></a>
                      </td>
              </tr>
          <tr>
<td><a href="<?php echo $view_detail['update']; ?>" data-toggle="tooltip" title="Update" class="btn btn-info" disabled="disabled"><h4>Update Amount</h4></a>
                        </td>
              </tr>
          <tr>
       
                   <td><a href="<?php echo $view_detail['payment']; ?>" data-toggle="tooltip" title="Payment" class="btn btn-info"><h4>Make Payment</h4></a>
                      </td>
              </tr>
                
                    <?php } } ?>
            </table>-->
      </div>
          </div>
     </div>

<?php echo $footer; ?> 