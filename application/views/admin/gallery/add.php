<?$this->lg = $this->lang->lang();?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="fa fa-users"></i> gallery Management <small>Add / Edit gallery</small> </h1>
	<br/>
	<?
  $category_gal_record = $this->category_gal_model->getrecord($this->uri->segment(5));
  ?>
  <div class="row">
	 <div class="col-xs-12 text-left">
		<div class="form-group">
			<a class="btn btn-sm btn-info" href="<?php echo site_url(); ?>/admin/gallery/Listing/<?=$category_gal_record->id?>">Back To <?=$category_gal_record->title?></a>
			 </div>
		</div>
	</div>
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
            <h3 class="box-title">Enter Photo Details</h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start -->
          
          <form id="addForm" action="<?php echo site_url() ?>/admin/gallery/addNewrow/<?=$this->uri->segment(5)?>" enctype="multipart/form-data" method="post" role="form">
            <div class="box-body">
              <div class="row">
			  <div class="col-md-12">
                  <div class="form-group">
                    <label for="title">Photo Title</label>
                    <input type="text" class="form-control required" id="title" name="title">
                  </div>
                </div>
			</div>
			 <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control " id="image"  name="image">
                  </div>
                </div>
              </div>
              <?php
                    if(!empty($languages))
                    {
                        foreach($languages as $record)
                        {
							
							
                    ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="title_<?=$record->prefix?>">Title
                      <?=$record->prefix?>
                    </label>
                    <textarea class="form-control " id="title_<?=$record->prefix?>" name="title_<?=$record->prefix?>" ></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="date_<?=$record->prefix?>">Date
                      <?=$record->prefix?>
                    </label>
                    <input type="text" class="form-control " id="date_<?=$record->prefix?>" name="date_<?=$record->prefix?>">
                    </input>
                  </div>
                </div>
              </div>
              <?
						}
					} 
					?>
            </div>
            <!-- /.box-body -->
            
            <div class="box-footer">
              <input type="submit" class="btn btn-primary" value="Submit" />
              <input type="reset" class="btn btn-default" value="Reset" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script src="<?php echo base_url(); ?>assets/js/admin/gallery.js" type="text/javascript"></script> 