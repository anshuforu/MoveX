
<?php echo $header;?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">


       

        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>

            </div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
    
  <div class="container-fluid">
    <?php if ($error_balance) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_balance; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
     
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_data; ?></h3>
      </div>
      <div class="panel-body">
          <?php // echo $action; ?>
          
            <form method="post" action="<?php echo $action ?>" id="register-form" class="form-horizontal">
               <div class="form-group">
            <label class="col-sm-2 control-label" for="input-eastimate"><?php echo $entry_b_id; ?></label>
            <div class="col-sm-10">
            <label class="col-sm-2 control-label" for="input-eastimate">#<?php echo isset($_GET['order_id'])?$_GET['order_id']:""?></label>
          </div>
              </div>    
            <div class="form-group">
            <label class="col-sm-2 control-label" for="input-eastimate"><?php echo $entry_customer; ?></label>
            <div class="col-sm-10">
            <label class="col-sm-2 control-label" for="input-eastimate"><?php echo isset($customer)?$customer:""?></label>
          </div>
              </div>  
                    <div class="form-group">
            <label class="col-sm-2 control-label" for="input-margin"><?php echo $entry_margin; ?></label>
            <div class="col-sm-10">
            <label class="col-sm-2 control-label" for="input-margin"><?php echo isset($margin)?$margin:""?>%</label>
          </div>
              </div>
            <div class="form-group">
            <label class="col-sm-2 control-label" for="input-eastimate"><?php echo $entry_actual; ?> (Rs)</label>
            <div class="col-sm-10">
            <label class="col-sm-2 control-label" for="input-eastimate"><?php echo isset($amount_cal['amount_calc'])?$amount_cal['amount_calc']:""?></label>
          </div>
              </div>
            <div class="form-group">
            <label class="col-sm-2 control-label" for="input-margin"><?php echo $calcualted_amount_receive; ?></label>
            <div class="col-sm-10">
            <label class="col-sm-2 control-label" for="input-margin"><?php echo isset($balance)?$balance:""?></label>
                
          </div>
              </div>

     
<div class="form-group required">
            <label class="col-sm-2 control-label" for="input-trans"><?php echo $text_amount_pay; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="number" value="<?php //echo $total_payment['paid_payment']; ?>" placeholder="<?php echo $text_amount_pay; ?>" id="input-trans" class="form-control" onchange="TestOnTextChange()" />
               
  <?php if ($error_number) { ?>
              <div class="text-danger"><?php echo $error_number; ?></div>
              <?php } ?>
            </div>
          </div>
            
                   <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-calcmar"><?php echo $text_amount_bal; ?></label>
            <div class="col-sm-10">
              <input type="text" name="total_price" value="<?php //echo $total_payment['balance_payment']; ?>" placeholder="<?php echo $text_amount_bal; ?>" id="input-total-mar" class="form-control" />
              
          </div>
              </div>
                <input type="hidden" name="booking_id" value="<?php echo $_GET['order_id']; ?>" placeholder="<?php //echo $text_amount_pay; ?>" id="input-booking" class="form-control" />   
                 <input type="hidden" name="balance" value="<?php echo $balance; ?>" placeholder="<?php //echo $text_amount_pay; ?>" id="input-balance" class="form-control" />   
             <div class="col-sm-10">
                    <button type="submit" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><?php echo $submit; ?></button>
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
    var balance_payment = "<?php echo $total_payment['balance_payment']; ?>";
    var cal=balance_payment-transpoter_price;
     if(cal<0)
     {
         document.getElementById("input-total-mar").value =0.00;
     }else{
     document.getElementById("input-total-mar").value =cal;
     }
    
 }
</script>
