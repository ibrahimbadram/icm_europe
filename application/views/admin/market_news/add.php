<?$this->lg = $this->lang->lang();?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="fa fa-users"></i> market_news Management <small>Add / Edit market_news</small> </h1>
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
            <h3 class="box-title">Enter Page Details</h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start -->
          
          <form id="addForm" action="<?php echo site_url() ?>/admin/market_news/addNewrow" enctype="multipart/form-data" method="post" role="form">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="title">URL</label>
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="website">Website</label>
                    <select class="form-control required" id="website" name="website" title="website">
                      <option value="">Select website</option>
                      <option value="1" >www.icm.com</option>
                      <option value="2" >www.icmcapital.com</option>
                      <option value="3" >www.icmtrader.eu</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control " id="image"  name="image" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control " id="file"  name="file" >
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="title_<?=$record->prefix?>">Title
                      <?=$record->prefix?>
                    </label>
                    <textarea class="form-control " id="title_<?=$record->prefix?>" name="title_<?=$record->prefix?>" ></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sub_title_<?=$record->prefix?>">Sub Title</label>
                    <select class="form-control" id="sub_title_<?=$record->prefix?>" name="sub_title_<?=$record->prefix?>">
                      <option value="">Select please</option>
                      <option value="<? echo $this->sm->getcontent('about_us/news/cat1','title_'.$record->prefix)?>"><? echo $this->sm->getcontent('about_us/news/cat1','title_'.$record->prefix)?></option>
                      <option value="<? echo $this->sm->getcontent('about_us/news/cat2','title_'.$record->prefix)?>"><? echo $this->sm->getcontent('about_us/news/cat2','title_'.$record->prefix)?></option>
                      <option value="<? echo $this->sm->getcontent('about_us/news/cat3','title_'.$record->prefix)?>"><? echo $this->sm->getcontent('about_us/news/cat3','title_'.$record->prefix)?></option>
                    </select>
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description_<?=$record->prefix?>">Description
                      <?=$record->prefix?>
                    </label>
                    <textarea class="ckeditor" id="description_<?=$record->prefix?>" name="description_<?=$record->prefix?>"></textarea>
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
<script src="<?php echo base_url(); ?>assets/js/admin/market_news.js" type="text/javascript"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js">