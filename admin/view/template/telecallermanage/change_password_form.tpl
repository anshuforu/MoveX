<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><!--<a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="submit" form="form-product" formaction="<?php echo $copy; ?>" data-toggle="tooltip" title="<?php echo $button_copy; ?>" class="btn btn-default"><i class="fa fa-copy"></i></button>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-product').submit() : false;"><i class="fa fa-trash-o"></i></button>-->
           <button type="submit" form="form-product" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $password_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $change_password?>" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">
                
            <!--<div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_old_password; ?></label>
            <div class="col-sm-10">
              <input type="password" name="old_password" value="" placeholder="<?php echo $entry_old_password; ?>" id="input-name" class="form-control" />
              
            </div>
          </div>-->
             <?php if ($error_password_match) { ?>
              <div class="text-danger"><?php echo $error_password_match; ?></div>
              <?php } ?>
                
                <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_new_password; ?></label>
            <div class="col-sm-10">
              <input type="password" name="new_password" value="" placeholder="<?php echo $entry_new_password; ?>" id="input-name" class="form-control" />
                  <?php if ($error_new_password) { ?>
              <div class="text-danger"><?php echo $error_new_password; ?></div>
              <?php } ?>
             
            </div>
          </div>  
            
                <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_confirm_password; ?></label>
            <div class="col-sm-10">
              <input type="password" name="confirm_password" value="" placeholder="<?php echo $entry_confirm_password; ?>" id="input-name" class="form-control" />
                <?php if ($error_confirm_password) { ?>
              <div class="text-danger"><?php echo $error_confirm_password; ?></div>
              <?php } ?>
             
            </div>
          </div> 
                  
            </div>
        </form>
      </div>
    </div>
  </div>
<?php echo $footer; ?>