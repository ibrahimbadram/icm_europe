<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="fa fa-users"></i> groups Management <small>Add / Edit groups</small> </h1>
  </section>
  <section class="content">
    <div class="row"> 
      <!-- left column -->
      <div class="col-md-8"> 
        <!-- general form elements -->
        
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Enter groups Details</h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start -->
          
          <form role="form" id="addForm" action="<?php echo site_url() ?>/admin/groups/addNewrow" method="post" role="form" enctype="multipart/form-data">
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
                  <label for="all_languages">Language</label>
                  <select  class="form-control required" id="all_languages" onchange="slidelanguages(this.value)"  name="all_languages" >
                    <option value="" >Select please</option>
                    <option value="1" >All Languages</option>
                    <option value="0" >Choose languages</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 languages" style="display:none">
                <div class="form-group">
                  <select multiple="multiple" size="5" class="form-control" id="languages"  name="languages[]" >
                    <?php
                    if(!empty($languages))
                    {
                        foreach($languages as $record)
                        {
                    ?>
                    <option value="<?php echo $record->id ?>" ><?php echo $record->title ?></option>
                    <?php
                        }
                    }
                    ?>
                  </select>
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
              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Type</label>
                  <select  class="form-control required" id="type" onchange="slidetable(this.value)"  name="type" >
                    <option value="" >Select please</option>
                    <option value="1" >All website</option>
                    <option value="0" >Choose pages</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row pages_table" style="display:none">
              <div class="col-md-12">
                <div class="form-group">
                  <table width="100%" align="center" cellpadding="5" cellspacing="5" border="1" class="table_padding"  >
                    <thead>
                      <tr>
                        <td>Table</td>
                        <td align="center" ><input type="checkbox" name="read_all" value="read_all" id="read_all" autocomplete="off" onchange="checkall('read')">
                          <div class="[ btn-group ]">
                            <label for="read_all" class="[ btn btn-primary ]"> <span class="[ glyphicon glyphicon-ok ]"></span> <span>&nbsp;</span> </label>
                            <label for="read_all" class="[ btn btn-default active ]"> All </label>
                          </div></td>
                        <td align="center" ><input type="checkbox" name="write_all" value="write_all" id="write_all" autocomplete="off" onchange="checkall('write')">
                          <div class="[ btn-group ]">
                            <label for="write_all" class="[ btn btn-primary ]"> <span class="[ glyphicon glyphicon-ok ]"></span> <span>&nbsp;</span> </label>
                            <label for="write_all" class="[ btn btn-default active ]"> All </label>
                          </div></td>
                        <td align="center" ><input type="checkbox" name="delete_all" value="delete_all" id="delete_all" autocomplete="off" onchange="checkall('delete')">
                          <div class="[ btn-group ]">
                            <label for="delete_all" class="[ btn btn-primary ]"> <span class="[ glyphicon glyphicon-ok ]"></span> <span>&nbsp;</span> </label>
                            <label for="delete_all" class="[ btn btn-default active ]"> All </label>
                          </div></td>
                      </tr>
                    </thead>
                    <tbody>
                      <?
$tables = $this->db->list_tables();
foreach ($tables as $table)
{
if ( $table == 'tbl_groups' || $table == 'tbl_groups_permissions' || $table == 'tbl_items' || $table == 'tbl_languages'  || $table == 'tbl_reset_password' || $table == 'tbl_roles' || $table == 'tbl_users' ||  $table == 'tbl_groups_languages' ) {} else {
$table1 =str_replace('_',' ',$table);	
$table2 =str_replace('tbl ','',$table1);
?>
                      <tr>
                        <td><div class="[ form-group ]">
                            <input type="checkbox" class="<? echo $table; ?>_label" onchange="checkallrow(this.value)" value="<? echo $table; ?>" id="<? echo $table; ?>_label" autocomplete="off">
                            <div class="[ btn-group ]">
                              <label for="<? echo $table; ?>_label" class="[ btn btn-primary ]"> <span class="[ glyphicon glyphicon-ok ]"></span> <span>&nbsp;</span> </label>
                              <label for="<? echo $table; ?>_label" class="[ btn btn-default active ]"> <? echo $table2; ?> </label>
                            </div>
                          </div></td>
                        <td align="center" ><div class="[ form-group ]">
                            <input type="checkbox" name="read[]" class="read_input <? echo $table; ?>_input checkinputs" value="<? echo $table; ?>" id="read_<? echo $table; ?>" autocomplete="off">
                            <div class="[ btn-group ]">
                              <label for="read_<? echo $table; ?>" class="[ btn btn-primary ]"> <span class="[ glyphicon glyphicon-ok ]"></span> <span>&nbsp;</span> </label>
                              <label for="read_<? echo $table; ?>" class="[ btn btn-default active ]"> read </label>
                            </div>
                          </div></td>
                        <td align="center" ><div class="[ form-group ]">
                            <input type="checkbox" name="write[]" class="write_input <? echo $table; ?>_input checkinputs" value="<? echo $table; ?>" id="write_<? echo $table; ?>" autocomplete="off">
                            <div class="[ btn-group ]">
                              <label for="write_<? echo $table; ?>" class="[ btn btn-primary ]"> <span class="[ glyphicon glyphicon-ok ]"></span> <span>&nbsp;</span> </label>
                              <label for="write_<? echo $table; ?>" class="[ btn btn-default active ]"> write </label>
                            </div>
                          </div></td>
                        <td align="center" ><div class="[ form-group ]">
                            <input type="checkbox" name="delete[]" class="delete_input <? echo $table; ?>_input checkinputs" value="<? echo $table; ?>" id="delete_<? echo $table; ?>" autocomplete="off">
                            <div class="[ btn-group ]">
                              <label for="delete_<? echo $table; ?>" class="[ btn btn-primary ]"> <span class="[ glyphicon glyphicon-ok ]"></span> <span>&nbsp;</span> </label>
                              <label for="delete_<? echo $table; ?>" class="[ btn btn-default active ]"> delete </label>
                            </div>
                          </div></td>
                      </tr>
                      <? }} ?>
                    </tbody>
                  </table>
                  <input type="text" value="" class="" id="checkboxesval" style="opacity:0; width:0"  />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12" >
                <div class="form-group">
                  <label for="users">Users</label>
                  <select multiple="multiple" size="5" class="form-control required" id="users"  name="users" >
                    <?php
                    if(!empty($users))
                    {
                        foreach($users as $user)
                        {
							if( $user->roleId  > 2 ) {
                    ?>
                    <option value="<?php echo $user->userId ?>" ><?php echo $user->name ?></option>
                    <?php
                        }
                    }
					}
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          
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
    </div>
  </section>
</div>
<script src="<?php echo base_url(); ?>/assets/js/admin/groups.js" type="text/javascript"></script>