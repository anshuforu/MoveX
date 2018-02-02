
<?php echo $header;?><?php echo $column_left; ?>
 <?php 
if(isset($_GET['id'])) 
{
$name=$_GET['name'];
$address=$_GET['address'];
$number=$_GET['number'];
}
else
{
$name="";
$address="";
$number="";
}
?>

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
    <?php /*if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php //echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } */?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">
       
          
            
          <div class="form-group required">
             
            <label class="col-sm-2 control-label" for="input-name"><?php echo $transporter_id; ?></label>
            <div class="col-sm-10">
                 <input type="hidden" name="id"  value="<?php echo $id;?>" placeholder="<?php echo $date; ?>" id="input-number" class="form-control" />
               <?php echo $id;?>
                

          </div>
              </div>
            
         <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-address"><?php echo $transporter_name; ?></label>
            <div class="col-sm-10">
                 <input type="hidden" name="name"  placeholder="<?php echo $tr_name; ?>"  value="<?php echo $tr_name;?>" id="input-number" class="form-control" />
             <?php echo $tr_name;?>

          </div>
              </div>
            <div class="form-group">
            <label class="col-sm-2 control-label" for="input-email"><?php echo $balance; ?></label>
            <div class="col-sm-10">
            <input type="hidden" name="balance"  value="<?php echo $final_balance;?>" placeholder="<?php echo $date; ?>" id="input-number" class="form-control" />
       <?php echo $final_balance;?>
          </div>
              </div>
<div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $date; ?></label>
                    <div class="col-sm-10">
                      <input type="text" name="date"  placeholder="<?php echo $date; ?>" id="datepicker" class="form-control date"   />


            </div>
          </div>
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $amount; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="amount"  placeholder="<?php echo $amount; ?>" id="input-number" class="form-control" />
<?php /* if ($error_company_name) { ?>
              <div class="text-danger"><?php //echo $error_company_name; ?></div>
              <?php }*/ ?>
            </div>
          </div>
            
               <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $collected_by; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="collected_by"  placeholder="<?php echo $collected_by; ?>" id="input-number" class="form-control" />
<?php /*if ($error_margin) { ?>
              <div class="text-danger"><?php //echo $error_margin; ?></div>
              <?php } */?>
            </div>
          </div>

              <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $comment; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="comment"  placeholder="<?php echo $comment; ?>" id="input-number" class="form-control" />
<?php /* if ($error_margin) { ?>
              <div class="text-danger"><?php //echo $error_margin; ?></div>
              <?php } */ ?>
            </div>
          </div>
  <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $receipt_no; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="receipt_no"  placeholder="<?php echo $receipt_no; ?>" id="input-number" class="form-control" />
<?php /*if ($error_margin) { ?>
              <div class="text-danger"><?php //echo $error_margin; ?></div>
              <?php } */?>
            </div>
          </div>



      
        </form>   
  </div>
        </div>
               <button type="submit" form="form-product" data-toggle="tooltip" class="btn btn-primary">Submit</button>
      </div>
    
</div>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="catalog/view/javascript/jquery/jquery-1.10.2.js"></script>
  <script src="catalog/view/javascript/jquery/jquery-ui.js"></script>
 
  
<script type="text/javascript">
    $('.date').datetimepicker({
        format: "yyyy-mm-dd hh:ii",
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
      
    });

</script>
//--></script>