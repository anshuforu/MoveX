<?php echo $header;?><?php echo $column_left; ?>

</script>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">


       
        <button type="submit" form="form-product" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="Back" class="btn btn-default"><i class="fa fa-reply"></i></a>

            </div>
      <h1>Add Transporter</h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
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
       <?php
if(isset($message))
{?>
  <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $message; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
      <?php
}
?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Transporter</h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">
       <?php 
          if($id=="")
{
?>
            
          <div class="form-group required">
             
            <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_name; ?></label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?php if(isset($name))echo $name; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />
                 <?php if ($error_name) { ?>
              <div class="text-danger"><?php echo $error_name; ?></div>
              <?php } ?>

          </div>
              </div>
            
         <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-address"><?php echo $entry_address; ?></label>
            <div class="col-sm-10">
              <input type="text" name="address" value="<?php if(isset($address))echo $address; ?>" placeholder="<?php echo $entry_address; ?>" id="input-address" class="form-control" />
                <?php if ($error_address) { ?>
              <div class="text-danger"><?php echo $error_address; ?></div>
              <?php } ?>

          </div>
              </div>
            <div class="form-group">
            <label class="col-sm-2 control-label" for="input-email"><?php echo $entry_email; ?></label>
            <div class="col-sm-10">
              <input type="text" name="email" value="<?php if(isset($email_id))echo $email_id; ?>" placeholder="<?php echo $entry_email; ?>" id="input-email" class="form-control" />

          </div>
              </div>
<div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_number; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="number" value="<?php if(isset($number))echo $number; ?>" placeholder="<?php echo $entry_number; ?>" id="input-number" class="form-control" maxlength="10" />
<?php if ($error_mobile) { ?>
              <div class="text-danger"><?php echo $error_mobile; ?></div>
              <?php } ?>

            </div>
          </div>
            <div class="form-group">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_alternate_number; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="alternate_number" value="<?php if(isset($alternate_number))echo $alternate_number; ?>" placeholder="<?php echo $entry_alternate_number; ?>" id="input-alternate_number" class="form-control" maxlength="10" />
            </div>
          </div>
            <div class="form-group">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_company_name; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="company_name" value="<?php if(isset($company_name))echo $company_name; ?>" placeholder="<?php echo $entry_company_name; ?>" id="input-number" class="form-control" />
            </div>
          </div>
               <div class="form-group">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_margin; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="margin" value="<?php echo $default_margin['margin']; ?>" placeholder="<?php echo $entry_margin; ?>" id="input-number" class="form-control datePicker" />
<?php if ($error_margin) { ?>
              <div class="text-danger"><?php echo $error_margin; ?></div>
              <?php } ?>
            </div>
          </div>
            <?php }else {
?>
                   <div class="form-group required">
             
            <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_name; ?></label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?php if(isset($name))echo $name; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control"/>
                 <?php if ($error_name) { ?>
              <div class="text-danger"><?php echo $error_name; ?></div>
              <?php } ?>

          </div>
              </div>
            
         <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-address"><?php echo $entry_address; ?></label>
            <div class="col-sm-10">
              <input type="text" name="address" value="<?php if(isset($address))echo $address; ?>" placeholder="<?php echo $entry_address; ?>" id="input-address" class="form-control" />
                <?php if ($error_address) { ?>
              <div class="text-danger"><?php echo $error_address; ?></div>
              <?php } ?>

          </div>
              </div>
            <div class="form-group">
            <label class="col-sm-2 control-label" for="input-email"><?php echo $entry_email; ?></label>
            <div class="col-sm-10">
              <input type="text" name="email" value="<?php if(isset($email_id))echo $email_id; ?>" placeholder="<?php echo $entry_email; ?>" id="input-email" class="form-control" />

          </div>
              </div>
<div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_number; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="number" value="<?php if(isset($number))echo $number; ?>" placeholder="<?php echo $entry_number; ?>" id="input-number" class="form-control" maxlength="10" />
<?php if ($error_mobile) { ?>
              <div class="text-danger"><?php echo $error_mobile; ?></div>
              <?php } ?>

            </div>
          </div>
                <div class="form-group">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_alternate_number; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="alternate_number" value="<?php if(isset($alternate_number))echo $alternate_number; ?>" placeholder="<?php echo $entry_alternate_number; ?>" id="input-alternate_number" class="form-control" maxlength="10" />
            </div>
          </div>
            <div class="form-group">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_company_name; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="company_name" value="<?php echo $company_name; ?>" placeholder="<?php echo $entry_company_name; ?>" id="input-number" class="form-control" />
            </div>
          </div>
               <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_margin; ?></label>
            <div class="col-sm-10">
                      <input type="text" name="margin" value="<?php echo $margin['margin']; ?>" placeholder="<?php echo $entry_margin; ?>" id="input-number" class="form-control datePicker" />
<?php if ($error_margin) { ?>
              <div class="text-danger"><?php echo $error_margin; ?></div>
              <?php } ?>
            </div>
          </div>
            <?php }?>



</div>
          </div>
          <button type="submit" form="form-product" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary">Submit</button>