
<?php echo $header;?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">


       

        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>

            </div>
      <h1>Update Amount</h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"> Update Amount</a></li>
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
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Update Amount</h3>
      </div>
      <div class="panel-body">
          <?php //echo $action; ?>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">
               <div class="form-group">
            <label class="col-sm-2 control-label" for="input-eastimate"><?php echo $entry_b_id; ?></label>
            <div class="col-sm-10">
            <label class="col-sm-2 control-label" for="input-eastimate">#<?php echo $_GET['order_id']; ?></label>
          </div>
              </div>
                   <div class="form-group">
            <label class="col-sm-2 control-label" for="input-eastimate"><?php echo $entry_customer; ?></label>
            <div class="col-sm-10">
            <label class="col-sm-2 control-label" for="input-eastimate"><?php echo $customer; ?></label>
          </div>
              </div>
               <div class="form-group">
            <label class="col-sm-2 control-label" for="input-eastimate"><?php echo $entry_eastimate; ?></label>
            <div class="col-sm-10">
            <label class="col-sm-2 control-label" for="input-eastimate"><?php echo $eastimate_price; ?></label>
          </div>
              </div>
            
                    <div class="form-group">
            <label class="col-sm-2 control-label" for="input-margin"><?php echo $entry_margin; ?></label>
            <div class="col-sm-10">
            <label class="col-sm-2 control-label" for="input-margin"><?php echo $margin; ?>%</label>
          </div>
              </div>
            
         <div class="form-group">
            <label class="col-sm-2 control-label" for="input-customer"><?php echo $text_address; ?></label>
            <div class="col-sm-10">
              <input type="text" name="address" value="<?php //echo $address; ?>" placeholder="<?php echo $text_address; ?>" id="input-customer" class="form-control" />

          </div>
              </div>
     
<div class="form-group required">
            <label class="col-sm-2 control-label" for="input-trans"><?php echo $text_trans; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="number" value="<?php //echo $number; ?>" placeholder="<?php echo $text_trans; ?>" id="input-trans" class="form-control" onchange="TestOnTextChange()" />

            </div>
          </div>
            
                   <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-calcmar"><?php echo $text_margin; ?></label>
            <div class="col-sm-10">
              <input type="text" name="total_price" value="<?php //echo $address; ?>" placeholder="<?php echo $text_margin; ?>" id="input-total-mar" class="form-control" readonly/>

          </div>
              </div>
           <input type="hidden" name="booking_id" value="<?php echo $_GET['order_id']; ?>" placeholder="<?php echo $text_amount_pay; ?>" id="booking_id" class="form-control"/>
             <div class="col-sm-10">
                    <button type="submit" form="form-product" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><?php echo $submit; ?></button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
 function TestOnTextChange()
 {
    var transpoter_price = document.getElementById("input-trans").value;
     //alert(transpoter_price);
    var customer_price = document.getElementById("input-customer").value;
     var val = " <?php echo $margin ?> ";
     var per=(transpoter_price*(val/100));
     document.getElementById("input-total-mar").value =per;
    
 }
</script>
