<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> <?php echo $heading_title; ?></h3>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <td class="text-right"><?php echo $column_booking_id; ?></td>
          <td><?php echo $column_customer; ?></td>
          <td><?php echo $column_status; ?></td>
          <td><?php echo $column_date_added; ?></td>
<!--<td class="text-right"><?php echo $column_total; ?></td>-->
          <td class="text-right"><?php echo $column_action; ?></td>
        </tr>
      </thead>
      <tbody>
        <?php if (isset($bookings)) { ?>
        <?php foreach ($bookings as $booking) { ?>
        <tr>
          <td class="text-right"><a href="<?php echo $booking['view']; ?>"><?php echo $booking['booking_status_id']; ?></a></td>
          <td><?php echo $booking['firstname']; ?></td>
          <td><?php echo $booking['status']; ?></td>
            <td><?php echo date('d-m-Y H:i:s',strtotime($booking['departure_time'])); ?></td>
    
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
