<input type="hidden" id="site_url" value="<?=site_url('')?>"><input type="hidden" id="base_url" value="<?=base_url('')?>">
<section class="uk-margin-medium-bottom inner-page regulations<? if($this->lg == 'ar' || $this->lg == 'fa')echo ' regulations_rtl';?>">
	<div class="position-relative">
	<div class="layout__bg"></div>
	</div>
  <div class="uk-container">

    <div class="uk-grid uk-margin-medium-top">

      <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">
		
        <div class="layout__body">

          <div class="section">

            <div class="grid">

              <div class="col-12">

                <h1><center><?=$this->sm->getword('Secure Account Opening', $this->lg)?></center></h1>

              </div>

            </div>

          </div>
		<div class="uk-margin-medium-top basic-page" id="regulations" style="background-color:transparent">
					
				<!-- Begin/ Form wizard -->
				</div>
						<div class="col-md-12">                <?php                    $error = $this->session->flashdata('error');                    if($error)                    {                ?>                <div class="alert alert-danger alert-dismissable">                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    <?php echo $this->session->flashdata('error'); ?>                                    </div>                <?php } ?>                <?php                      $success = $this->session->flashdata('success');                    if($success)                    {                ?>                <div class="alert alert-success alert-dismissable">                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    <?php echo $this->session->flashdata('success'); ?>                </div>                <?php } ?>                                <div class="row">                    <div class="col-md-12">                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>                    </div>                </div>            </div>
				<?php echo form_open('#', 'class="email" id="example-form"');?>
					
					<div>
						<h3><?=$this->sm->getword('Create your profile', $this->lg)?></h3>

							<?php $this->load->view('about_us/step1')?>
						<h3><?=$this->sm->getword('Tell us more about you', $this->lg)?>.</h3>
						<?php $this->load->view('about_us/step2')?>
						<h3><?=$this->sm->getword('Appropriateness', $this->lg)?>.</h3>
						<?php $this->load->view('about_us/step3')?>
						<h3><?=$this->sm->getword('Trading Account Settings & Confirmation', $this->lg)?>.</h3>
						<?php $this->load->view('about_us/step4')?>					
					</div>					
				<?php echo form_close(); ?>			
			<!-- End/ Form wizard -->
			
</div>

			<?php /*<div class="container">
				<div class="stepwizard">
					<div class="stepwizard-row setup-panel">
						<div class="stepwizard-step col-xs-3"> 
							<a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
							<p><small>Create your profile.</small></p>
						</div>
						<div class="stepwizard-step col-xs-3"> 
							<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
							<p><small>Tell us more about you.</small></p>
						</div>
						<div class="stepwizard-step col-xs-3"> 
							<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
							<p><small>Appropriateness.</small></p>
						</div>
						<div class="stepwizard-step col-xs-3"> 
							<a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
							<p><small>Trading Account Settings & Confirmation.</small></p>
						</div>
					</div>
				</div>
				
				<form role="form">
					<div class="panel panel-primary setup-content" id="step-1">
						<div class="panel-heading">
							 <h3 class="panel-title">Create your profile.</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label">First Name</label>
								<input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name" />
							</div>
							<div class="form-group">
								<label class="control-label">Last Name</label>
								<input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
							</div>
							<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
						</div>
					</div>
					
					<div class="panel panel-primary setup-content" id="step-2">
						<div class="panel-heading">
							 <h3 class="panel-title">Tell us more about you.</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label">Company Name</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
							</div>
							<div class="form-group">
								<label class="control-label">Company Address</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
							</div>
							<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
						</div>
					</div>
					
					<div class="panel panel-primary setup-content" id="step-3">
						<div class="panel-heading">
							 <h3 class="panel-title">Appropriateness.</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label">Company Name</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
							</div>
							<div class="form-group">
								<label class="control-label">Company Address</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
							</div>
							<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
						</div>
					</div>
					
					<div class="panel panel-primary setup-content" id="step-4">
						<div class="panel-heading">
							 <h3 class="panel-title">Trading Account Settings & Confirmation.</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label">Company Name</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
							</div>
							<div class="form-group">
								<label class="control-label">Company Address</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
							</div>
							<button class="btn btn-success pull-right" type="submit">Finish!</button>
						</div>
					</div>
				</form>
			</div> */ ?>
			
		  </div>
        </div>
       </div>
     </div>
</section>