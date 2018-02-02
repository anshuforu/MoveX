<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
   <!-- <?php if ($error_install) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_install; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>-->
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-7"><?php echo $booking; ?></div>
            <div class="col-lg-3 col-md-3 col-sm-7"><?php echo $order; ?></div>
              <div class="col-lg-3 col-md-3 col-sm-7"><?php echo $online; ?></div>
      

    </div>
   
    <div class="row">
      <div class="col-lg-5 col-md-12 col-sm-12 col-sx-12"><?php echo $today_bookings; ?></div>
      <div class="col-lg-7 col-md-12 col-sm-12 col-sx-12"> <?php echo $recent_bookings; ?> </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>