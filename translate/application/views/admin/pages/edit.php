<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/lightbox.min.css">
<input type="hidden" value="pages" title="table" name="table" id="table" />
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
    }
}


?>
<div class="content-wrapper" <?php
            if($role != ROLE_ADMIN )
            {
            ?>  style=" margin-left:0" <? } ?> > 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="fa fa-pagess"></i><?php echo $uf->title; ?></h1>
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
        
          <!-- /.box-header --> 
          <!-- form start -->
          
          <form action="<?php echo site_url() ?>/admin/pages/editrow" enctype="multipart/form-data" method="post" id="editForm" role="form">
          <input type="hidden" value="<?php echo $id; ?>" title="id" name="id" id="id" />
        <div class="box box-primary">
            <div class="box-body">
                  <!--<div class="form-group">
                    <input  class="form-control" readonly="readonly"  value="<?php echo $uf->title; ?>"  />
                  </div>-->
              <div class="row">
              <? if ($uf->title_en ) { ?>
                <div class="col-md-12">
                  <div class="form-group">
                    <h2 >Title need to translate :
                    </h2>
                    <article  ><?php echo $uf->title_en; ?></article>
                  </div>
                </div>
                <? } ?>
              <? if ($uf->sub_title_en ) { ?>
                <div class="col-md-6">
                  <div class="form-group">
                    <h2 >Sub Title need to translate :
                    </h2>
                    <article  ><?php echo $uf->sub_title_en; ?></article>
                  </div>
                </div>
                <? } ?>
              <? if ($uf->date_en ) { ?>
                <div class="col-md-6">
                  <div class="form-group">
                    <h2 >Date  need to translate :
                    </h2>
                    <article  ><?php echo $uf->date_en; ?></article>
                  </div>
                </div>
                <? } ?>
              <? if ($uf->description_en ) { ?>
                <div class="col-md-12">
                  <div class="form-group">
                    <h2 >Description need to translate :</h2>
                    <article   ><?php echo $uf->description_en; ?></article>
                  </div>
                </div>
                <? } ?>
              </div>
              </div>
              </div>
              <hr />
              <?php
                    if(!empty($languages))
                    {
                        foreach($languages as $record)
                        {
							if ( $record->prefix =='en' && $role != ROLE_ADMIN ) {} else {
							$val = 'title_'.$record->prefix;
							$d_val = 'description_'.$record->prefix;                           
							$sub_title_val = 'sub_title_'.$record->prefix;                            
							$date_val = 'date_'.$record->prefix;
							
                    ?>
        <div class="box box-primary">
              <div class="box-body">
                <div class="row">
                <div class="col-md-12">
                <strong><center><h1>Translation in <?=$record->title?></h1></center></strong>
                </div>
                </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="title_<?=$record->prefix?>">Title <?=$record->title?></label>
                    <textarea name="title_<?=$record->prefix?>" class="form-control" id="title_<?=$record->prefix?>" placeholder="Title" title="title_<?=$record->prefix?>" style="resize:none" ><?php echo $uf->$val; ?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sub_title">Sub Title <?=$record->title?></label>
                    
                    <input name="sub_title_<?=$record->prefix?>" class="form-control" id="sub_title_<?=$record->prefix?>" placeholder="Sub Title" title="sub_title_<?=$record->prefix?>" value="<?php echo $uf->$sub_title_val; ?>"  />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="date_<?=$record->prefix?>">Date
                      <?=$record->title?>
                    </label>
                    <input type="text" class="form-control " id="date_<?=$record->prefix?>" name="date_<?=$record->prefix?>" value="<?=$uf->$date_val?>">
                    </input>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description_<?=$record->prefix?>">Description <?=$record->title?></label>
                    <textarea class="ckeditor" id="description_<?=$record->prefix?>" name="description_<?=$record->prefix?>" ><?php echo $uf->$d_val; ?></textarea>
                  </div>
                </div>
              </div>
            
            <div class="box-footer">
              <input type="submit" class="btn btn-primary" value="Save <?=$record->title?>"  name="save_all"  />
            </div>
                </div>
              </div>
              <?
							}
						}
					}
					?>
            <!-- /.box-body -->
          </form>
        </div>
      </div>
  </section>
</div>
<script src="<?php echo base_url(); ?>assets/js/admin/pages.js" type="text/javascript"></script> 