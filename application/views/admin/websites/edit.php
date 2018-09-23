<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/lightbox.min.css">
<input type="hidden" value="websites" title="table" name="table" id="table" />
<?php

$id = '';
$title = '';

if(!empty($Info))
{
    foreach ($Info as $uf)
    {
        $id = $uf->id;
        $title = $uf->title;
    }
}


?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="fa fa-websitess"></i> websites Management <small>Add / Edit websites</small> </h1>
  </section>
  <section class="content">
    <div class="row"> 
      <!-- left column -->
      <div class="col-md-12">
        <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $this->session->flashdata('error'); ?> </div>
        <?php } ?>
        <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $this->session->flashdata('success'); ?> </div>
        <?php } ?>
        <div class="row">
          <div class="col-md-12"> <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?> </div>
        </div>
      </div>
      <div class="col-md-12"> 
        <!-- general form elements -->
        
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Enter website Details</h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start -->
          
          <form action="<?php echo site_url() ?>/admin/websites/editrow" enctype="multipart/form-data" method="post" id="editForm" role="form">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control required" id="title" placeholder="Title" title="title" value="<?php echo $title; ?>">
                    <input type="hidden" value="<?php echo $id; ?>" title="id" name="id" id="id" />
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            
            <div class="box-footer">
              <input type="submit" class="btn btn-primary" value="Submit" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script src="<?php echo base_url(); ?>assets/js/admin/websites.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/dist/js/lightbox-plus-jquery.min.js"></script> 
