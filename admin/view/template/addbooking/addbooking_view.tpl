<?php echo $header; ?><?php echo $column_left; ?>
 <div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
   <div class="tab-pane" id="tab-fraud">
            <table class="table table-bordered">
             <tr>
                 <?php //print_r($view_data); ?>
              <td><?php echo $booking_id; ?></td>
               <td><?php echo $view_data['booking_status_id']; ?></td>
                </tr>
                <tr>
                 <td><?php echo $customer; ?></td>
               <td><?php echo $view_data['firstname']." ".$view_data['lastname']; ?></td>
                </tr> 
                <tr>
                 <td><?php echo $form_address; ?></td>
               <td><?php echo $view_data['form_address']; ?></td>
                </tr>  
                <tr>
                 <td><?php echo $to_address; ?></td>
               <td><?php echo $view_data['to_address']; ?></td>
                </tr>
                <tr>
                 <td><?php echo $distance; ?></td>
               <td><?php echo $view_data['distance']; ?></td>
                </tr> 
                <tr>
                 <td><?php echo $distance_price; ?></td>
               <td><?php echo $view_data['distance_price']; ?></td>
                </tr>
                <tr>
                 <td><?php echo $labour_count; ?></td>
               <td><?php echo $view_data['labour_count']; ?></td>
                </tr>
                <tr>
                 <td><?php echo $vehicle_type_name; ?></td>
               <td><?php echo $view_data['vehicle_type_name']; ?></td>
                </tr>
              <tr>
                 <td><?php echo $booking_time; ?></td>
               <td><?php echo $view_data['booking_time']; ?></td>
                </tr>
          <tr>
                 <td><?php echo $delivering_time; ?></td>
               <td><?php echo $view_data['delivering_time']; ?></td>
                </tr>
     
            </table>
          </div>
          
        </div>
      </div>

<?php echo $footer; ?> 