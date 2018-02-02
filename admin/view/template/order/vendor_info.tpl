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
       <!-- <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-order" data-toggle="tab"><?php echo $tab_transport_details; ?></a></li>
          <li><a href="#tab-payment" data-toggle="tab"><?php echo $tab_vehicle_details; ?></a></li>
          <!--<li><a href="#tab-order" data-toggle="tab"><?php echo $tab_transport_details; ?></a></li>
          <!--  <?php if ($shipping_method) { ?>
        <li><a href="#tab-shipping" data-toggle="tab"><?php echo $tab_shipping; ?></a></li>
          <?php } ?>
                   <!--<?php if ($payment_action) { ?>
          <li><a href="#tab-action" data-toggle="tab"><?php echo $tab_action; ?></a></li>
          <?php } ?>
          <?php if ($maxmind_id) { ?>
          <li><a href="#tab-fraud" data-toggle="tab"><?php echo $tab_fraud; ?></a></li>
          <?php } ?>
        </ul>-->
          <?php //print_r($transport_details); ?>
        <div class="tab-content">
          <!--<div class="tab-pane active" id="tab-order">-->
            <table class="table table-bordered">
                      <tr>
                <th><b><?php echo $transport_id; ?></b></th>
                   <th><b><?php echo $transport_name; ?></b></th>
                    <th><b><?php echo $email_id; ?></b></th>
                    <th><b><?php echo $mobile_number; ?></b></b></th>
                  <th><b><?php echo $company_name; ?></b></th>
                  <th><b><?php echo $no_of_vehicles; ?></b></th>
            <th><b><?php echo $margin; ?></b></th>
                  
               
              </tr>
                
   <tr>
       <td><?php echo $transport_info['vendor_id']; ?></td>
               <td><?php echo $transport_info['vendor_name']; ?></td>
                   <td><?php echo $transport_info['email_id']; ?></td>
                         <td><?php echo $transport_info['vendor_number']; ?></td>
                        <td><?php echo $transport_info['company_name']; ?></td>
                  <td><?php echo $total_vehicles; ?></td>
                    <td><?php echo $transport_info['margin']; ?></td>
           
              </tr>
                     
            </table>
          </div>

          <!--<div class="tab-pane" id="tab-payment">-->
              <table class="table table-bordered">
                
              <tr>
                <th><b><?php echo $vehicle_no; ?></b></th>
                   <th><b><?php echo $vehicle_insurance; ?></b></th>
                    <th><b><?php echo $vehicle_area; ?></b></th>
                    <th><b><?php echo $vehicle_subarea; ?></b></th>
                  <th><b><?php echo $vehicle_city; ?></b></th>
                  <th><b><?php echo $vehicle_lorry; ?></b></th>
                  <th><b><?php echo $vehicle_type; ?></b></th>
                   <th><b><?php echo $vehicle_make; ?></b></th>
                  <th><b><?php echo $vehicle_model; ?></b></th>
                   <th><b><?php echo $driver_name; ?></b></th>
                   <th><b><?php echo $driver_mobile_number; ?></b></th>
                        <th><b><?php echo $licence_no; ?></b></th>
                  <th><b><?php echo $labour; ?></b></th>
                  
               
              </tr>
                                      <?php 
if(isset($transport_details))
{
foreach ($transport_details as $transport)
{

//print_r($transport);
?>
              <tr>
               <td><b><?php echo $transport['vehicle_no']; ?></b></td>
                   <td><?php echo $transport['insurance_date']; ?></td>
                         <td><?php echo $transport['area']; ?></td>
                        <td><?php echo $transport['subarea']; ?></td>
                  <td><?php echo $transport['city']; ?></td>
                    <td><?php echo $transport['lorry']; ?></td>
                          <td><?php echo $transport['vehicle_type']; ?></td>
                    <td><?php echo $transport['make']; ?></td>
                   <td><?php echo $transport['model']; ?></td>
                  <td><?php echo $transport['driver_name']; ?></td>
                      <td><?php echo $transport['mobile_no']; ?></td>
                   <td><?php echo $transport['licence_no']; ?></td>
                     <td><?php echo $transport['labour']; ?></td>
              </tr>
                                     <?php 
}}
else {if(!isset($transport_details))
{
?>
 <tr><th>
              
                
                   No Records Found
              </th></tr>
                    <?php }}
?>
   
           </table>


     
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
$('#button-history').on('click', function() {

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
           var cust_id=document.getElementById('input-order-status').value;
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