 <?php 
/*foreach($order_statuses as $order_statuses) { 
if ($order_statuses['order_status_id'] == $booking_customer[0]['status']) 
{
} 

} */ ?>
<?php //print_r($book_details);die; ?>
                      <?php //if ($order_statuses['order_status_id'] == $order_status_id) {} ?>
<?php //print_r($trans_details);
      //print_r($telecaller_details); ?>
<?php echo $header; ?><?php echo $column_left; ?>
 
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><!--<a href="<?php echo $invoice; ?>" target="_blank" data-toggle="tooltip" title="<?php echo $button_invoice_print; ?>" class="btn btn-info"><i class="fa fa-print"></i></a> <a href="<?php echo $shipping; ?>" target="_blank" data-toggle="tooltip" title="<?php echo $button_shipping_print; ?>" class="btn btn-info"><i class="fa fa-truck"></i></a>--> <!--<a href="<?php echo $edit; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>--> <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $head_view; ?></h3>
      </div>
      <div class="panel-body">
      
        
        <div class="tab-content">
                    <table class="table table-bordered">
        <tr><?php //print_r($all); ?>
                <td><b><?php echo $text_order_id; ?></b></td>
                <td>#<?php echo $all['customer_id']; ?></td>
              </tr> 
                <tr>
                <td><b><?php echo $text_customer; ?></b></td>
                <td><?php echo $all['firstname']; ?></td>
              </tr>
                           <tr>
                <td><b><?php echo $text_user; ?></b></td>
                <td><?php echo $all['username']; ?></td>
              </tr> 
                           <tr>
                <td><b><?php echo $text_form; ?></b></td>
                <td><?php echo $all['telephone']; ?></td>
              </tr> 
            <tr>
                <td><b><?php echo $text_status; ?></b></td>
                <td><?php echo $all['email']; ?></td>
              </tr>
            
              
              <tr>
                <td><b><?php echo $text_to; ?></b></td>
                <td><?php echo $all['address']; ?></td>
              </tr>     
                <tr>
                <td><b><?php echo $exact_pickup; ?></b></td>
                <td><?php echo $all['city_name']; ?></td>
              </tr>    
                 <tr>
                <td><b><?php echo $text_booking; ?></b></td>
                <td><?php echo $all['name']; ?></td>
              </tr> 
                <tr>
                <td><b><?php echo $delivering_time; ?></b></td>
                <td><?php echo $all['pincode']; ?></td>
              </tr>    
               
            <!--   <tr>
                <td><b><?php echo $text_vehicle; ?></b></td>
                <td><?php echo $book_details['vehicle_type_name']; ?></td>
              </tr> 
                <tr>
                <td><b><?php echo $text_distance; ?></b></td>
                <td><?php echo $book_details['distance']; ?>.km</td>
              </tr>
            <tr>
                <td><b><?php echo $text_disprice; ?></b></td>
                <td>Rs. <?php echo $book_details['vehicle_type_price']; ?></td>
              </tr>  
                <tr>
                <td><b><?php echo $text_totdisprice; ?></b></td>
                <td>Rs. <?php echo $book_details['distance']*$book_details['vehicle_type_price']; ?></td>
              </tr> 
                <tr>
                <td><b><?php echo $text_labour; ?></b></td>
                <td><?php echo $book_details['labour_count']; ?></td>
              </tr> 
                <tr>
                <td><b><?php echo $text_labour_price; ?></b></td>
                <td>Rs. <?php echo $book_details['labour_count']*$book_details['labour_price']; ?></td>
              </tr>   
            <tr>
                <td><b><?php echo $total_price; ?></b></td>
                <td>Rs. <?php echo $book_details['distance']*$book_details['vehicle_type_price']+$book_details['labour_count']*$book_details['labour_price']; ?></td>
              </tr>  -->
         
            </table>
          </div>
<?php echo $footer; ?> 