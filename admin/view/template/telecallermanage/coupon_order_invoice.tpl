<?php //print_r($invoice_data);
     // print_r($address_info); ?>
<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<head>
<meta charset="UTF-8" />
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<link href="view/javascript/bootstrap/css/bootstrap.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="view/javascript/bootstrap/js/bootstrap.min.js"></script>
<link href="view/javascript/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<link type="text/css" href="view/stylesheet/stylesheet.css" rel="stylesheet" media="all" />
</head>
<body>
<div class="container">

  <div style="page-break-after: always;">
    <h1><?php echo $text_invoice; ?> #<?php echo $order_infor['id']; ?></h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td colspan="2"><?php echo $text_order_detail; ?></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="width: 50%;"><address>
            <strong><?php //echo $order['store_name']; ?></strong><br />
            <?php //echo $order['store_address']; ?>
            </address>
            <b><?php //echo $text_telephone; ?></b> <?php //echo $order['store_telephone']; ?><br />
            <b><?php //echo $text_email; ?></b> <?php //echo $order['store_email']; ?><br />
            <b><?php //echo $text_website; ?></b> <a href="<?php echo $order['store_url']; ?>"><?php //echo $order['store_url']; ?></a></td>
          <td style="width: 50%;"><b><?php //echo $text_date_added; ?></b> <?php //echo $order['date_added']; ?><br />
            <b><?php //echo $text_order_id; ?></b> <?php //echo $order['order_id']; ?><br />
            <b><?php //echo $text_payment_method; ?></b> <?php //echo $order['payment_method']; ?><br />
        </td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td style="width: 50%;"><b><?php echo $text_to; ?></b></td>
          <td style="width: 50%;"><b><?php echo $text_ship_to; ?></b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><address>
            <?php //    print_r($order_infor);
echo $order_infor['form_address'];
//echo $address_info[0]['firstname']." ".$address_info[0]['lastname']; ?><br>
            <?php //echo $address_info[0]['address_1']; ?>
            <?php //echo $address_info[0]['address_2']; ?>
            <?php //echo $address_info[0]['city']." ".$address_info[0]['postcode']; ?><br>
            </address></td>
          <td><address>
            <?php echo $order_infor['to_address']; ?>
            </address></td>
        </tr>
      </tbody>
    </table>
       <?php // print_r($order_infor); ?>
     <table class="table table-bordered">
      <thead>
        <tr>
          <td><b><?php echo $column_model; ?></b></td>
          <td><b><?php echo $column_model1; ?></b></td>
          <td><b><?php echo $column_product; ?></b></td>
          <td class="text-right"><b><?php echo $column_quantity; ?></b></td>
         <td class="text-right"><b><?php echo $column_tax; ?></b></td>
         <td class="text-right"><b><?php echo $column_price; ?></b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $order_infor['vehicle_type_name']; ?></td>
          <td><?php echo $order_infor['vehicle_type_price']; ?></td>
          <td class="text-right"><?php echo $order_infor['distance']; ?> Km </td>
          <td class="text-right"><?php echo $order_infor['labour_count']; ?></td>
           <td class="text-right"><?php echo $order_infor['tax_amount']; ?></td>
          <td class="text-right"><?php echo $order_infor['price']; ?></td>
       
        </tr>
        <tr>
       
     <tr>
         
          <td class="text-right" colspan="5"><b><?php echo $column_total; ?></b></td>
          <td class="text-right"><?php echo $order_infor['total_price']; ?></td>

        </tr>
    </tbody>
    </table>
   
  </div>
 
</div>
</body>
</html>