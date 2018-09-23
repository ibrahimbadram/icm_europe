<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/lightbox.min.css">

<input type="hidden" value="campaigns" title="table" name="table" id="table" /> 

<?php



$id = '';

$title = '';

$image = '';

$active = '';



if(!empty($Info))

{

    foreach ($Info as $uf)

    {

        $id = $uf->id;

        $title = $uf->title;

        $campaign_id = $uf->campaign_id;

        $active = $uf->active;

    }

}





?>



<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-campaignss"></i> campaigns Management

        <small>Add / Edit campaigns</small>

      </h1>

    </section>

    

    <section class="content">

    

        <div class="row">

            <!-- left column -->

            <div class="col-md-8">

              <!-- general form elements -->

                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">Enter campaigns Details</h3>

                    </div><!-- /.box-header -->

                    <!-- form start -->

                    

                    <form role="form" action="<?php echo site_url() ?>/admin/campaigns/editrow" enctype="multipart/form-data" method="post" id="editForm" role="form">

                        <div class="box-body">

                            <div class="row">

                                <div class="col-md-6">                                

                                    <div class="form-group">

                                        <label for="title">Title</label>

<input type="text" name="title" class="form-control required" id="title" placeholder="Title" title="title" value="<?php echo $title; ?>" maxlength="128">

<input type="hidden" value="<?php echo $id; ?>" title="id" name="id" id="id" />    

                                    </div>

                                    

                                </div>

                                <div class="col-md-6">                                

                                    <div class="form-group">

                                        <label for="title">campaign id</label>

<input type="text" name="campaign_id" class="form-control required" readonly="readonly" id="campaign_id" placeholder="campaign_id" title="campaign_id" value="<?php echo $campaign_id; ?>" maxlength="128">

  

                                    </div>

                                    

                                </div>

                            </div>

                            <div class="row">

                            <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="active">Active</label>

                                        <select class="form-control required" id="active" name="active" title="active">

                                            <option value="">Select Role</option>

<option value="1" <?php if($active == 1) {echo "selected=selected";} ?>>Active</option>

<option value="0" <?php if($active == 0) {echo "selected=selected";} ?>>InActive</option>

                                        </select>

                                    </div>

                                </div>

                                </div>

                        </div><!-- /.box-body -->

    

                        <div class="box-footer">

                            <input type="submit" class="btn btn-primary" value="Submit" />

                        </div>

                    </form>

                </div>

            </div>

            <div class="col-md-4">

                <?php

                    $this->load->helper('form');

                    $error = $this->session->flashdata('error');

                    if($error)

                    {

                ?>

                <div class="alert alert-danger alert-dismissable">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                    <?php echo $this->session->flashdata('error'); ?>                    

                </div>

                <?php } ?>

                <?php  

                    $success = $this->session->flashdata('success');

                    if($success)

                    {

                ?>

                <div class="alert alert-success alert-dismissable">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                    <?php echo $this->session->flashdata('success'); ?>

                </div>

                <?php } ?>

                

                <div class="row">

                    <div class="col-md-12">

                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>

                    </div>

                </div>

            </div>

        </div>    

    </section>

</div>



<script src="<?php echo base_url(); ?>/assets/js/admin/campaigns.js" type="text/javascript"></script>