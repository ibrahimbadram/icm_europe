<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i> campaigns Management

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

                    

                    <form role="form" id="addForm" action="<?php echo site_url() ?>/admin/campaigns/addNewrow" method="post" role="form" enctype="multipart/form-data">

                        <div class="box-body">

                            <div class="row">

                                <div class="col-md-6">                                

                                    <div class="form-group">

                                        <label for="title">Title</label>

                                        <input type="text" class="form-control required" id="title" name="title" maxlength="128">

                                    </div>

                                    

                                </div>

                                <div class="col-md-6">                                

                                    <div class="form-group">

                                        <label for="title">campaign id</label>

                                        <input type="text" class="form-control " id="campaign_id" name="campaign_id" maxlength="128">

                                    </div>

                                    

                                </div>

                            </div>

                            <div class="row">

                            <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="active">Active</label>

                                        <select class="form-control required" id="active" name="active">

                                            <option value="">Select please</option>

                                                    <option value="1">Active</option>

                                                    <option value="0">InActive</option>

                                                   

                                        </select>

                                    </div>

                                </div>

                                </div>

                        </div><!-- /.box-body -->

    

                        <div class="box-footer">

                            <input type="submit" class="btn btn-primary" value="Submit" />

                            <input type="reset" class="btn btn-default" value="Reset" />

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