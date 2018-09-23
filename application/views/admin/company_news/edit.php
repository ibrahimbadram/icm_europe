<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/lightbox.min.css">
<input type="hidden" value="company_news" title="table" name="table" id="table" />
<?php

$id = '';
$title = '';
$image = '';
$active = '';
$website = '';

if(!empty($Info))
{
    foreach ($Info as $uf)
    {
        $id = $uf->id;
        $title = $uf->title;
        $image = $uf->image;    
        $website = $uf->website;       
		$file = $uf->file;
    }
}


?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="fa fa-company_newss"></i> company_news Management <small>Add / Edit company_news</small> </h1>
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
            <h3 class="box-title">Enter page Details</h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start -->
          
          <form action="<?php echo site_url() ?>/admin/company_news/editrow" enctype="multipart/form-data" method="post" id="editForm" role="form">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" readonly="readonly" class="form-control required" id="title" placeholder="Title" title="title" value="<?php echo $title; ?>">
                    <input type="hidden" value="<?php echo $id; ?>" title="id" name="id" id="id" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter image" title="image" value="" >
                    <? if ( $image ) { ?>
                    <span><a  class="example-image-link" data-lightbox="example-1" data-title="<?php echo $title ?>" href="<?php echo base_url() ?>uploads/company_news/<?php echo $image; ?>" > show image</a> | <a onclick="delete_image('<?php echo $id?>')" class="cursor" >Delete image</a></span>
                    <? } ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="image">File</label>
                    <input type="file" class="form-control" id="file" name="file" placeholder="Enter file" title="file" value="" >
                    <? if ( $file ) { ?>
                    <span><a  class="example-image-link"    target="_blank" href="<?php echo base_url() ?>uploads/company_news/<?php echo $file; ?>" > show file</a> | <a onclick="delete_file('<?php echo $id?>')" class="cursor">Delete file</a></span>
                    <? } ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="website">Website</label>
                    <select class="form-control required" id="website" name="website" title="website">
                      <option value="">Select website</option>
                      <option value="1" <?php if($website == 1) {echo "selected=selected";} ?>>www.icm.com</option>
                      <option value="2" <?php if($website == 2) {echo "selected=selected";} ?>>www.icmcapital.com</option>
                      <option value="3" <?php if($website == 3) {echo "selected=selected";} ?>>www.icmtrader.eu</option>
                    </select>
                  </div>
                </div>
              </div>
              <?php
                    if(!empty($languages))
                    {
                        foreach($languages as $record)
                        {
							$val = 'title_'.$record->prefix;
							$d_val = 'description_'.$record->prefix;                            $sub_title_val = 'sub_title_'.$record->prefix;                            $date_val = 'date_'.$record->prefix;
							
                    ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="title_<?=$record->prefix?>">Title
                      <?=$record->prefix?>
                    </label>
                    <textarea name="title_<?=$record->prefix?>" class="form-control" id="title_<?=$record->prefix?>" placeholder="Title" title="title_<?=$record->prefix?>" ><?php echo $uf->$val; ?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sub_title">Sub Title</label>
                    <select class="form-control" id="sub_title_<?=$record->prefix?>" name="sub_title_<?=$record->prefix?>">
                      <option value="">Select please</option>
                      <option value="<? echo $this->sm->getcontent('about_us/news/cat1','title_'.$record->prefix)?>" <?php if($uf->$sub_title_val == $this->sm->getcontent('about_us/news/cat1','title_'.$record->prefix)) {echo "selected='selected'";} ?>> <? echo $this->sm->getcontent('about_us/news/cat1','title_'.$record->prefix)?> </option>
                      <option value="<? echo $this->sm->getcontent('about_us/news/cat2','title_'.$record->prefix)?>" <?php if($uf->$sub_title_val == $this->sm->getcontent('about_us/news/cat2','title_'.$record->prefix)) {echo "selected=selected";} ?>> <? echo $this->sm->getcontent('about_us/news/cat2','title_'.$record->prefix)?> </option>
                      <option value="<? echo $this->sm->getcontent('about_us/news/cat3','title_'.$record->prefix)?>" <?php if($uf->$sub_title_val == $this->sm->getcontent('about_us/news/cat3','title_'.$record->prefix)) {echo "selected=selected";} ?>> <? echo $this->sm->getcontent('about_us/news/cat3','title_'.$record->prefix)?> </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="date_<?=$record->prefix?>">Date
                      <?=$record->prefix?>
                    </label>
                    <input type="text" class="form-control " id="date_<?=$record->prefix?>" name="date_<?=$record->prefix?>" value="<?=$uf->$date_val?>">
                    </input>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description_<?=$record->prefix?>">Description</label>
                    <textarea class="ckeditor" id="description_<?=$record->prefix?>" name="description_<?=$record->prefix?>" ><?php echo $uf->$d_val; ?></textarea>
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
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script src="<?php echo base_url(); ?>assets/js/admin/company_news.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/dist/js/lightbox-plus-jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js">