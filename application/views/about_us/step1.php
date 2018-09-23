<section class="step1 form-horizontal LongRegisterForm wizard-card"> <a name="step1"></a>
  <input type="hidden" name="DST" value="9a6f90f2bb5fba427064cf16cd39df50">	<input type="hidden" value="<?=$this->sm->getword('Next', $this->lg)?>" id="translated_next">	<input type="hidden" value="<?=$this->sm->getword('Previous', $this->lg)?>" id="translated_previous">
  <div class="col-md-12 col-lg-5">
  				<div class="row">
						<div class="demo-regulators-block">
							<div id="block_jurisdiction">
		<h2><?=$this->sm->getword('Create Your', $this->lg)?> <strong><?=$this->sm->getword('ICM', $this->lg)?></strong> <?=$this->sm->getword('Profile', $this->lg)?> <span class="reg-time">(<?=$this->sm->getword('in 3 minutes', $this->lg)?>)</span></h2>
						<p class="h2"><?=$this->sm->getword('Choose your regulator', $this->lg)?></p>
								<div id="jurBlock" class="uk-margin-small-top">
									<div class="btn-group">
										<input type="hidden" name="from_entity" id="input_from_entitty" value="CySEC">
																<button type="button" class="btn radio btn-blue active" id="jur_hq" value="CySEC"><?=$this->sm->getword('CySEC', $this->lg)?></button>
																					<button type="button" class="btn radio btn-blue passive" id="jur_uk" value="FCA"><?=$this->sm->getword('FCA', $this->lg)?></button>
																			</div>
									<span class="secure-icon"><?=$this->sm->getword('Secure site', $this->lg)?></span>
								</div>
							</div>
					
							<div class="jur_hq payment uk-margin-small-bottom">
								<img src="assets/images/img-cysec.jpg" id="ps_image">
							</div>
				</div>
                </div>
    <input type="hidden" name="pp_status" id="input_pp_status" value="">
    <input type="hidden" name="pwd_score" id="input_pwd_score" value="">
    <input type="hidden" name="from_entity" id="input_from_entity" value="CySEC">
    <div>
      <div class="col-md-12">
        <div class="control-group form-ttl">
          <div class="controls"></div>
        </div>
      </div>
      <div>
        <div class="control-group" id="block_email">
          <input type="text" value="" placeholder="<?=$this->sm->getword('Enter Your Email', $this->lg)?>" name="email" id="email"  class="input-field_email input-block-level" onkeyup="steps_check_email()">		  <div class="input-tooltip input-tooltip_error input-tooltip_email" style="display:none" ><?=$this->sm->getword('Enter a valid email', $this->lg)?></div>			<input type="hidden" value="<?=$this->sm->getword('You have an existing profile under this email.', $this->lg)?>" id="email_already_exist">
        </div>
        <div class="control-group" id="block_password">
     <input type="password" value="" placeholder="<?=$this->sm->getword('Create Password', $this->lg)?>" name="password" id="password"  class="input-field_password input-block-level" onkeyup="steps_check_password()">			<div class="input-tooltip input-tooltip_password input-tooltip_error" style="display:none" ><?=$this->sm->getword('Password must be at least 6 characters!', $this->lg)?></div>
        </div>
        <div class="control-group" id="block_name">
   <input type="text" value="" placeholder="<?=$this->sm->getword('Name', $this->lg)?>" name="name" id="name" class="input-field_name input-block-level" onkeyup="steps_check_name()">		 <? /* <div class="input-tooltip input-tooltip_name input-tooltip_error" style="display:none" ><?=$this->sm->getword('Name', $this->lg)?></div> */?>
        </div>
        <div class="control-group" id="block_surname">
          <input type="text" value="" placeholder="<?=$this->sm->getword('Last Name', $this->lg)?>" name="surname" id="surname" class="input-field_surname input-block-level" onkeyup="steps_check_surname()">					<? /*<div class="input-tooltip input-tooltip_surname input-tooltip_error" style="display:none" ><?=$this->sm->getword('Last Name', $this->lg)?></div> */?>
        </div>
        <div class="control-group" id="block_country">
          <label class="control-label tal" for="input_country"><?=$this->sm->getword('Country of Residence', $this->lg)?></label>
          <div class="controls">
            <select name="country" id="country" onchange="toggle_id3_uru();toggle_reasons();" class="input-field_country input-block-level">								<? 					$default_val = 'LB';					foreach($countries as $country){									?>				 <option value="<?=$country['iso']?>" <? if($default_val == $country['iso']) echo 'selected="selected"';?>><?=$country['name']?></option>				<? } ?>
             
            </select>			
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="delimeter"></div>
      </div>
    </div>		<div class="row">						<div class="col-md-12">							<div class="input-tooltip" style="display:none" id="finalresult" style="max-width:100%;"></div>						</div>					</div>
  </div>
  <div class="desktop-only col-lg-6 col-lg-offset-1 col-md-12 notes">
    <p class="h4 notes-title"><?=$this->sm->getword('step-1-msg', $this->lg)?></p>
    <ul class="advantage-notes-list">
      <li class="secure"><?=$this->sm->getword('step-1-2-msg', $this->lg)?> <span id="regulator_name"><?=$this->sm->getword('CySEC', $this->lg)?></span></li>
      <li class="lighting"><?=$this->sm->getword('step-1-3-msg', $this->lg)?></li>
      <li class="deposit"><?=$this->sm->getword('step-1-4-msg', $this->lg)?></li>
    </ul>
    <div class="bottom-note-block"></div>
  </div>	
</section>
