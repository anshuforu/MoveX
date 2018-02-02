<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Latest Bookings To Assign</h3>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <td class="text-right">Booking ID</td>
           <td class="text-right">Customer</td>
             <td class="text-right">Status</td>
               <td class="text-right">Departure Time</td>
              <td class="text-right">Action</td>
              <!--  <td class="text-right">Status</td>-->
<!--<td class="text-right">Action</td>-->
        </tr>
      </thead>
      <tbody>
        <?php if (isset($latest_bookings)) { ?>
        <?php foreach ($latest_bookings as $booking) { ?>
        <tr>
          <td class="text-right"><a href="<?php echo $booking['view']; ?>"><?php echo $booking['booking_status_id']; ?></a></td>
                <td class="text-right"><?php echo $booking['firstname']; ?></td>
             <td class="text-right"><?php echo $booking['status']; ?></td>
              <td class="text-right"><?php echo date('d-m-Y H:i:s',strtotime($booking['departure_time'])); ?></td>
            <!--  <td class="text-right"></td>-->
         <!-- <td class="text-right"><?php echo $order['total']; ?></td>-->
       <td class="text-right"><a href="<?php echo $booking['view']; ?>" data-toggle="tooltip" title="<?php echo $button_view; ?>" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
        </tr>
        <?php } ?>
        <?php } else { ?>
        <tr>
          <td class="text-center" colspan="6"><?php echo $text_no_results; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
