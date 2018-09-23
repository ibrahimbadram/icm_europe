<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/lightbox.min.css">
<input type="hidden" value="gallery" title="table" name="table" id="table" /> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-gallerys"></i> Gallery Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
		  <div class="col-xs-12 text-left">
                <div class="form-group">
					<a class="btn btn-sm btn-info" href="<?php echo site_url(); ?>/admin/category_gallery/Listing">Back To Category List</a>
				 </div>
            </div>
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo site_url(); ?>/admin/gallery/addNew/<?=$this->uri->segment(5)?>"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Gallery List</h3>
                    <div class="box-tools">
                        <form action="<?php echo site_url('admin/gallery/Listing') ?>" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Title</th>
					  <th>Category</th>
                      <th>image</th>
					 
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($Records))
                    {
                        foreach($Records as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->title ?></td>
					   <td>
						<?php 
							$category_gal = $this->category_gal_model->getrecord($record->category_gal);
							echo $category_gal->title ?>
					  </td>
                      <td><?php if (  $record->image != '' ) { ?> <a class="example-image-link" data-lightbox="example-1" data-title="<?php echo $record->title ?>" href="<?php echo base_url().'uploads/gallery/'.$record->image; ?>">show image</a> <? } else { echo 'NULL'; } ?></td>
					 
					 
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo site_url().'/admin/gallery/editOld/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleterow" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/gallery.js" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/lightbox-plus-jquery.min.js"></script>

