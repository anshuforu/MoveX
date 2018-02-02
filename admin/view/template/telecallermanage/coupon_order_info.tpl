 <?php 
/*foreach($order_statuses as $order_statuses) { 
if ($order_statuses['order_status_id'] == $booking_customer[0]['status']) 
{
} 

} */ ?>
                      <?php //if ($order_statuses['order_status_id'] == $order_status_id) {} ?>
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
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $heading_title; ?></h3>
      </div>
      <div class="panel-body">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-order" data-toggle="tab"><?php echo $tab_telecaller; ?></a></li>
          <li><a href="#tab-payment" data-toggle="tab"><?php echo $tab_booking; ?></a></li>
          <!--  <?php if ($shipping_method) { ?>
        <li><a href="#tab-shipping" data-toggle="tab"><?php echo $tab_shipping; ?></a></li>
          <?php } ?>-->
          <!--<li><a href="#tab-history" data-toggle="tab"><?php echo $tab_history; ?></a></li>-->
          <!--<?php if ($payment_action) { ?>
          <li><a href="#tab-action" data-toggle="tab"><?php echo $tab_action; ?></a></li>
          <?php } ?>
          <?php if ($maxmind_id) { ?>
          <li><a href="#tab-fraud" data-toggle="tab"><?php echo $tab_fraud; ?></a></li>
          <?php } ?>-->
        </ul>
          <?php //print_r($booking_customer);die; ?>
        <div class="tab-content">
          <div class="tab-pane active" id="tab-order">
            <table class="table table-bordered">
        
                
             <!-- <tr>
                <?php $invoice_no=$booking_customer[0]['invoice']; ?>
                 <td><?php echo $text_invoice_no; ?></td>
                <td><?php if ($invoice_no) { ?>
                  <?php echo $invoice_no; ?>
                  <?php } else { ?>
                  <button id="button-invoice" class="btn btn-success btn-xs"><i class="fa fa-cog"></i> <?php echo $button_generate; ?></button>
                  <?php } ?></td>
                </tr>-->
                <?php //print_r($order_info); ?>  
              <tr>
                <td><b><?php echo $text_store_name; ?></b></td>
                <td><?php echo $order_info['telecaller_name']; ?></td>
              </tr>
       
              <tr>
                <td><b><?php echo $text_email; ?></b></td>
                <td><?php echo $order_info['telecaller_email']; ?></td>
              </tr>
              <tr>
                <td><b><?php echo $text_telephone; ?></b></td>
                <td><?php echo $order_info['telecaller_ph_no']; ?></td>
              </tr>
           
                <td><b><?php echo $text_date_added; ?></b></td>
                <td><?php echo $order_info['telecaller_address']; ?></td>
              </tr>
             
            </table>
          </div>
          <div class="tab-pane" id="tab-payment">
            <table class="table table-bordered">
              <tr>
                <td><b><?php echo $text_firstname; ?></b></td>
                <td><b><?php echo $text_customer; ?></b></td>
                <td><b><?php echo $text_lastname; ?></b></td>
              </tr>  
                <?php foreach($booking_info as $booking) 
                 { ?>
                <tr>
                <td><?php echo $booking['booking_assigned_id']; ?></td>
                <td><?php echo $booking['firstname']." ".$booking['lastname']; ?></td>
                <td><?php echo date('d-m-Y',strtotime($booking['date'])); ?></td>
              </tr>
                <?php } ?>
            </table>
          </div>
         <!-- <?php if ($shipping_method) { ?>
          <div class="tab-pane" id="tab-shipping">
            <table class="table table-bordered">
              <tr>
                <td><?php echo $text_firstname; ?></td>
                <td><?php echo $shipping_firstname; ?></td>
              </tr>
              <tr>
                <td><?php echo $text_lastname; ?></td>
                <td><?php echo $shipping_lastname; ?></td>
              </tr>
              <?php if ($shipping_company) { ?>
              <tr>
                <td><?php echo $text_company; ?></td>
                <td><?php echo $shipping_company; ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td><?php echo $text_address_1; ?></td>
                <td><?php echo $shipping_address_1; ?></td>
              </tr>
              <?php if ($shipping_address_2) { ?>
              <tr>
                <td><?php echo $text_address_2; ?></td>
                <td><?php echo $shipping_address_2; ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td><?php echo $text_city; ?></td>
                <td><?php echo $shipping_city; ?></td>
              </tr>
              <?php if ($shipping_postcode) { ?>
              <tr>
                <td><?php echo $text_postcode; ?></td>
                <td><?php echo $shipping_postcode; ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td><?php echo $text_zone; ?></td>
                <td><?php echo $shipping_zone; ?></td>
              </tr>
              <?php if ($shipping_zone_code) { ?>
              <tr>
                <td><?php echo $text_zone_code; ?></td>
                <td><?php echo $shipping_zone_code; ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td><?php echo $text_country; ?></td>
                <td><?php echo $shipping_country; ?></td>
              </tr>
              <?php foreach ($shipping_custom_fields as $custom_field) { ?>
              <tr>
                <td><?php echo $custom_field['name']; ?>:</td>
                <td><?php echo $custom_field['value']; ?></td>
              </tr>
              <?php } ?>
              <?php if ($shipping_method) { ?>
              <tr>
                <td><?php echo $text_shipping_method; ?></td>
                <td><?php echo $shipping_method; ?></td>
              </tr>
              <?php } ?>
            </table>
          </div>
          <?php } ?>-->


       <!--<?php if ($payment_action) { ?>
          <div class="tab-pane" id="tab-action"> <?php echo $payment_action; ?> </div>
          <?php } ?>-->
         
          <div class="tab-pane" id="tab-fraud">
            <table class="table table-bordered">
              <?php if ($country_match) { ?>
              <tr>
                <td><?php echo $text_country_match; ?></td>
                <td><?php echo $country_match; ?></td>
              </tr>
              <?php } ?>
              <?php if ($country_code) { ?>
              <tr>
                <td><?php echo $text_country_code; ?></td>
                <td><?php echo $country_code; ?></td>
              </tr>
              <?php } ?>
              <?php if ($high_risk_country) { ?>
              <tr>
                <td><?php echo $text_high_risk_country; ?></td>
                <td><?php echo $high_risk_country; ?></td>
              </tr>
              <?php } ?>
              <?php if ($distance) { ?>
              <tr>
                <td><?php echo $text_distance; ?></td>
                <td><?php echo $distance; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_region) { ?>
              <tr>
                <td><?php echo $text_ip_region; ?></td>
                <td><?php echo $ip_region; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_city) { ?>
              <tr>
                <td><?php echo $text_ip_city; ?></td>
                <td><?php echo $ip_city; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_latitude) { ?>
              <tr>
                <td><?php echo $text_ip_latitude; ?></td>
                <td><?php echo $ip_latitude; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_longitude) { ?>
              <tr>
                <td><?php echo $text_ip_longitude; ?></td>
                <td><?php echo $ip_longitude; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_isp) { ?>
              <tr>
                <td><?php echo $text_ip_isp; ?></td>
                <td><?php echo $ip_isp; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_org) { ?>
              <tr>
                <td><?php echo $text_ip_org; ?></td>
                <td><?php echo $ip_org; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_asnum) { ?>
              <tr>
                <td><?php echo $text_ip_asnum; ?></td>
                <td><?php echo $ip_asnum; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_user_type) { ?>
              <tr>
                <td><?php echo $text_ip_user_type; ?></td>
                <td><?php echo $ip_user_type; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_country_confidence) { ?>
              <tr>
                <td><?php echo $text_ip_country_confidence; ?></td>
                <td><?php echo $ip_country_confidence; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_region_confidence) { ?>
              <tr>
                <td><?php echo $text_ip_region_confidence; ?></td>
                <td><?php echo $ip_region_confidence; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_city_confidence) { ?>
              <tr>
                <td><?php echo $text_ip_city_confidence; ?></td>
                <td><?php echo $ip_city_confidence; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_postal_confidence) { ?>
              <tr>
                <td><?php echo $text_ip_postal_confidence; ?></td>
                <td><?php echo $ip_postal_confidence; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_postal_code) { ?>
              <tr>
                <td><?php echo $text_ip_postal_code; ?></td>
                <td><?php echo $ip_postal_code; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_accuracy_radius) { ?>
              <tr>
                <td><?php echo $text_ip_accuracy_radius; ?></td>
                <td><?php echo $ip_accuracy_radius; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_net_speed_cell) { ?>
              <tr>
                <td><?php echo $text_ip_net_speed_cell; ?></td>
                <td><?php echo $ip_net_speed_cell; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_metro_code) { ?>
              <tr>
                <td><?php echo $text_ip_metro_code; ?></td>
                <td><?php echo $ip_metro_code; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_area_code) { ?>
              <tr>
                <td><?php echo $text_ip_area_code; ?></td>
                <td><?php echo $ip_area_code; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_time_zone) { ?>
              <tr>
                <td><?php echo $text_ip_time_zone; ?></td>
                <td><?php echo $ip_time_zone; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_region_name) { ?>
              <tr>
                <td><?php echo $text_ip_region_name; ?></td>
                <td><?php echo $ip_region_name; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_domain) { ?>
              <tr>
                <td><?php echo $text_ip_domain; ?></td>
                <td><?php echo $ip_domain; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_country_name) { ?>
              <tr>
                <td><?php echo $text_ip_country_name; ?></td>
                <td><?php echo $ip_country_name; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_continent_code) { ?>
              <tr>
                <td><?php echo $text_ip_continent_code; ?></td>
                <td><?php echo $ip_continent_code; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ip_corporate_proxy) { ?>
              <tr>
                <td><?php echo $text_ip_corporate_proxy; ?></td>
                <td><?php echo $ip_corporate_proxy; ?></td>
              </tr>
              <?php } ?>
              <?php if ($anonymous_proxy) { ?>
              <tr>
                <td><?php echo $text_anonymous_proxy; ?></td>
                <td><?php echo $anonymous_proxy; ?></td>
              </tr>
              <?php } ?>
              <?php if ($proxy_score) { ?>
              <tr>
                <td><?php echo $text_proxy_score; ?></td>
                <td><?php echo $proxy_score; ?></td>
              </tr>
              <?php } ?>
              <?php if ($is_trans_proxy) { ?>
              <tr>
                <td><?php echo $text_is_trans_proxy; ?></td>
                <td><?php echo $is_trans_proxy; ?></td>
              </tr>
              <?php } ?>
              <?php if ($free_mail) { ?>
              <tr>
                <td><?php echo $text_free_mail; ?></td>
                <td><?php echo $free_mail; ?></td>
              </tr>
              <?php } ?>
              <?php if ($carder_email) { ?>
              <tr>
                <td><?php echo $text_carder_email; ?></td>
                <td><?php echo $carder_email; ?></td>
              </tr>
              <?php } ?>
              <?php if ($high_risk_username) { ?>
              <tr>
                <td><?php echo $text_high_risk_username; ?></td>
                <td><?php echo $high_risk_username; ?></td>
              </tr>
              <?php } ?>
              <?php if ($high_risk_password) { ?>
              <tr>
                <td><?php echo $text_high_risk_password; ?></td>
                <td><?php echo $high_risk_password; ?></td>
              </tr>
              <?php } ?>
              <?php if ($bin_match) { ?>
              <tr>
                <td><?php echo $text_bin_match; ?></td>
                <td><?php echo $bin_match; ?></td>
              </tr>
              <?php } ?>
              <?php if ($bin_country) { ?>
              <tr>
                <td><?php echo $text_bin_country; ?></td>
                <td><?php echo $bin_country; ?></td>
              </tr>
              <?php } ?>
              <?php if ($bin_name_match) { ?>
              <tr>
                <td><?php echo $text_bin_name_match; ?></td>
                <td><?php echo $bin_name_match; ?></td>
              </tr>
              <?php } ?>
              <?php if ($bin_name) { ?>
              <tr>
                <td><?php echo $text_bin_name; ?></td>
                <td><?php echo $bin_name; ?></td>
              </tr>
              <?php } ?>
              <?php if ($bin_phone_match) { ?>
              <tr>
                <td><?php echo $text_bin_phone_match; ?></td>
                <td><?php echo $bin_phone_match; ?></td>
              </tr>
              <?php } ?>
              <?php if ($bin_phone) { ?>
              <tr>
                <td><?php echo $text_bin_phone; ?></td>
                <td><?php echo $bin_phone; ?></td>
              </tr>
              <?php } ?>
              <?php if ($customer_phone_in_billing_location) { ?>
              <tr>
                <td><?php echo $text_customer_phone_in_billing_location; ?></td>
                <td><?php echo $customer_phone_in_billing_location; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ship_forward) { ?>
              <tr>
                <td><?php echo $text_ship_forward; ?></td>
                <td><?php echo $ship_forward; ?></td>
              </tr>
              <?php } ?>
              <?php if ($city_postal_match) { ?>
              <tr>
                <td><?php echo $text_city_postal_match; ?></td>
                <td><?php echo $city_postal_match; ?></td>
              </tr>
              <?php } ?>
              <?php if ($ship_city_postal_match) { ?>
              <tr>
                <td><?php echo $text_ship_city_postal_match; ?></td>
                <td><?php echo $ship_city_postal_match; ?></td>
              </tr>
              <?php } ?>
              <?php if ($score) { ?>
              <tr>
                <td><?php echo $text_score; ?></td>
                <td><?php echo $score; ?></td>
              </tr>
              <?php } ?>
              <?php if ($explanation) { ?>
              <tr>
                <td><?php echo $text_explanation; ?></td>
                <td><?php echo $explanation; ?></td>
              </tr>
              <?php } ?>
              <?php if ($risk_score) { ?>
              <tr>
                <td><?php echo $text_risk_score; ?></td>
                <td><?php echo $risk_score; ?></td>
              </tr>
              <?php } ?>
              <?php if ($queries_remaining) { ?>
              <tr>
                <td><?php echo $text_queries_remaining; ?></td>
                <td><?php echo $queries_remaining; ?></td>
              </tr>
              <?php } ?>
              <?php if ($maxmind_id) { ?>
              <tr>
                <td><?php echo $text_maxmind_id; ?></td>
                <td><?php echo $maxmind_id; ?></td>
              </tr>
              <?php } ?>
              <?php if ($error) { ?>
              <tr>
                <td><?php echo $text_error; ?></td>
                <td><?php echo $error; ?></td>
              </tr>
              <?php } ?>
            </table>
          </div>
          
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript"><!--
 $('#button-invoice').on('click', function() {
$.ajax({
       //url: 'index.php?route=order/order/test&token=<?php echo $_GET['token']; ?>&booking=<?php echo $_GET['order_id'];?>',
        url: 'index.php?route=order/order/test&token=<?php echo $_GET['token']; ?>&order_id=<?php echo $_GET['order_id'];?>',
		type: 'POST',
         data:"id=3",
        dataType: 'html',
    success: function(json) {
				alert(json);
		},			

			error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		},
		
	});
       // data:"id=3",
        //dataType: 'html',
         
		//data: 'order_status_id=' + encodeURIComponent($('select[name=\'order_status_id\']').val()) + '&notify=' + ($('input[name=\'notify\']').prop('checked') ? 1 : 0) + '&append=' + ($('input[name=\'append\']').prop('checked') ? 1 : 0) + '&comment=' + encodeURIComponent($('textarea[name=\'comment\']').val()),
       
 });
   </script>
  <script type="text/javascript"><!--
  /* $('#button-invoice').on('click', function() {
   
    $.ajax({
         alert("fjdfjs");
		 /* url: 'index.php?route=order/order/createinvoiceno&token=<?php echo $_GET['token']; ?>&booking=<?php echo $_GET['order_id'];?>',
		type: 'post',
		beforeSend: function() {
			$('#button-invoice').button('loading');			
		},
		complete: function() {
			$('#button-invoice').button('reset');
		},
         alert(url);
		success: function(json) {
			$('.alert').remove();
						
			if (json['error']) {
				$('#tab-order').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
			}
			
			if (json['invoice_no']) {
				$('#button-invoice').replaceWith(json['invoice_no']);
			}
		},			
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            
		} */
	/* });
}); */
//$(document).delegate('#button-invoice', 'click', function() {
  //  alert();
	/*$.ajax({
		url: 'index.php?route=order/order/createinvoiceno&token=<?php echo $token; ?>&order_id=<?php echo $order_id; ?>',
		dataType: 'json',
		beforeSend: function() {
			$('#button-invoice').button('loading');			
		},
		complete: function() {
			$('#button-invoice').button('reset');
		},
		success: function(json) {
			$('.alert').remove();
						
			if (json['error']) {
				$('#tab-order').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
			}
			
			if (json['invoice_no']) {
				$('#button-invoice').replaceWith(json['invoice_no']);
			}
		},			
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});*/
//});

/*$(document).delegate('#button-reward-add', 'click', function() {
	$.ajax({
		url: 'index.php?route=sale/order/addreward&token=<?php echo $token; ?>&order_id=<?php echo $order_id; ?>',
		type: 'post',
		dataType: 'json',
		beforeSend: function() {
			$('#button-reward-add').button('loading');
		},
		complete: function() {
			$('#button-reward-add').button('reset');
		},									
		success: function(json) {
			$('.alert').remove();
						
			if (json['error']) {
				$('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
			}
			
			if (json['success']) {
                $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
				
				$('#button-reward-add').replaceWith('<button id="button-reward-remove" class="btn btn-danger btn-xs"><i class="fa fa-minus-circle"></i> <?php echo $button_reward_remove; ?></button>');
			}
		},			
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$(document).delegate('#button-reward-remove', 'click', function() {
	$.ajax({
		url: 'index.php?route=sale/order/removereward&token=<?php echo $token; ?>&order_id=<?php echo $order_id; ?>',
		type: 'post',
		dataType: 'json',
		beforeSend: function() {
			$('#button-reward-remove').button('loading');
		},
		complete: function() {
			$('#button-reward-remove').button('reset');
		},				
		success: function(json) {
			$('.alert').remove();
						
			if (json['error']) {
				$('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
			}
			
			if (json['success']) {
                $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
				
				$('#button-reward-remove').replaceWith('<button id="button-reward-add" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i> <?php echo $button_reward_add; ?></button>');
			}
		},			
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$(document).delegate('#button-commission-add', 'click', function() {
	$.ajax({
		url: 'index.php?route=sale/order/addcommission&token=<?php echo $token; ?>&order_id=<?php echo $order_id; ?>',
		type: 'post',
		dataType: 'json',
		beforeSend: function() {
			$('#button-commission-add').button('loading');
		},
		complete: function() {
			$('#button-commission-add').button('reset');
		},			
		success: function(json) {
			$('.alert').remove();
						
			if (json['error']) {
				$('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
			}
			
			if (json['success']) {
                $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
                
				$('#button-commission-add').replaceWith('<button id="button-commission-remove" class="btn btn-danger btn-xs"><i class="fa fa-minus-circle"></i> <?php echo $button_commission_remove; ?></button>');
			}
		},			
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$(document).delegate('#button-commission-remove', 'click', function() {
	$.ajax({
		url: 'index.php?route=sale/order/removecommission&token=<?php echo $token; ?>&order_id=<?php echo $order_id; ?>',
		type: 'post',
		dataType: 'json',
		beforeSend: function() {
			$('#button-commission-remove').button('loading');
		
		},
		complete: function() {
			$('#button-commission-remove').button('reset');
		},		
		success: function(json) {
			$('.alert').remove();
						
			if (json['error']) {
				$('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
			}
			
			if (json['success']) {
                $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');

				$('#button-commission-remove').replaceWith('<button id="button-commission-add" class="btn btn-success btn-xs"><i class="fa fa-minus-circle"></i> <?php echo $button_commission_add; ?></button>');
			}
		},			
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$('#history').delegate('.pagination a', 'click', function(e) {
	e.preventDefault();
	
	$('#history').load(this.href);
});			


$('#history').load('index.php?route=order/coupon_order/history&token=<?php echo $token; ?>&order_id=<?php echo $order_id; ?>');
*/
/*$('#button-history').on('click', function() {

 /* if(typeof verifyStatusChange == 'function'){
    if(verifyStatusChange() == false){
      return false;
    }else{
      addOrderInfo();
    }
  }else{
    addOrderInfo();
  }
*/
     /*      var cust_id=document.getElementById('input-order-status').value;
           var abc=document.getElementById('input-notify').value;
           var comment=document.getElementById('input-comment').value;
           
        var alldata= {
                        first:cust_id,
                        second:abc,
                        third:comment,
                    };
	$.ajax({
       url: 'index.php?route=order/coupon_order/insert&token=<?php echo $_GET['token']; ?>&booking=<?php echo $_GET['order_id'];?>',
		type: 'post',
        data:alldata,
        dataType: 'html',
         
		//data: 'order_status_id=' + encodeURIComponent($('select[name=\'order_status_id\']').val()) + '&notify=' + ($('input[name=\'notify\']').prop('checked') ? 1 : 0) + '&append=' + ($('input[name=\'append\']').prop('checked') ? 1 : 0) + '&comment=' + encodeURIComponent($('textarea[name=\'comment\']').val()),
		
		success: function(json) {
				location.reload();
		},			
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	}); 
});
*/
/*function changeStatus(){
  var status_id = $('select[name="order_status_id"]').val();

  $('#openbay-info').remove();

  $.ajax({
    url: 'index.php?route=extension/openbay/getorderinfo&token=<?php echo $token; ?>&order_id=<?php echo $order_id; ?>&status_id='+status_id,
    dataType: 'html',
    success: function(html) {
      $('#history').after(html);
    }
  });
}

function addOrderInfo(){
  var status_id = $('select[name="order_status_id"]').val();

  $.ajax({
    url: 'index.php?route=extension/openbay/addorderinfo&token=<?php echo $token; ?>&order_id=<?php echo $order_id; ?>&status_id='+status_id,
    type: 'post',
    dataType: 'html',
    data: $(".openbay-data").serialize()
  });
}

$(document).ready(function() {
  changeStatus();
});

$('select[name="order_status_id"]').change(function(){ changeStatus(); }); */
//--></script></div>
<?php echo $footer; ?> 