<?
	$dir = 'ltr';
	if($this->lang->lang() == 'ar' || $this->lang->lang() == 'fa'){
		$dir = 'rtl';
	}
?>
<style>

.regulations .actions ul > li >a[href="#finish"] {
    width: 100%;
    text-align: center;
}

fieldset div[class^="col-"]{
	padding:0;
}

</style>
<section class="step1 form-horizontal LongRegisterForm wizard-card" id="step-1"> <a name="step1"></a>
  <?/*<input type="hidden" name="DST" value="9a6f90f2bb5fba427064cf16cd39df50">*/?>
  <input type="hidden" value="<?=$this->sm->getword('Next', $this->lg)?>" id="translated_next">
  <input type="hidden" value="<?=$this->sm->getword('Previous', $this->lg)?>" id="translated_previous">
  <input type="hidden" value="<?=$this->sm->getword('Submit', $this->lg)?>" id="translated_submit">
   
	
  <div class="col-md-10 col-lg-5">
	<div class="demo-regulators-block">
			<div id="block_jurisdiction">
			  <p class="h4">
				<?=$this->sm->getword('Create Your', $this->lg)?>
				<strong>
				<?=$this->sm->getword('ICM', $this->lg)?>
				</strong>
				<?=$this->sm->getword('Profile', $this->lg)?>
				<span class="reg-time">(
				<?=$this->sm->getword('in 30 seconds', $this->lg)?>
				)</span>
			   </p>
			   <fieldset>
			   <legend> 
				   <p class="h2 navy_color ">
					<b><?=$this->sm->getword('Choose your regulator', $this->lg)?></b>
				  </p>
				</legend>
			  <div class="row uk-margin-small-top" style="z-index: 12;margin-left:0;margin-right:0;" id="choose_regulator">
					<div class="col-md-12">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 imgfield-wrap-container" style="padding:0;">
						<div style="" class="imgfield-wrap imgfield-container" data-tab-id="CySEC">
							<div class="imgfield-wrap selected">    
								<img class="imagefield-img"  src="assets/images/about_us/cysec11.jpg" title="CySec">
								
								<div class="button-selected checked">
									<div class="button-selected-icon"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 imgfield-wrap-container" style="padding:0;">
						<div style="" class="imgfield-wrap imgfield-container" data-tab-id="FSA">
							<div class="imgfield-wrap" >    
								<img class="imagefield-img" src="assets/images/about_us/fsa11.jpg" title="FSA">
								
								<div class="button-selected unchecked">
									<div class="button-selected-icon"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 imgfield-wrap-container" style="padding:0;">
						<div style="" class="imgfield-wrap imgfield-container" data-tab-id="FCA">
							<div class="imgfield-wrap">    
								<img class="imagefield-img" src="assets/images/about_us/fca11.jpg" title="FCA">
								
								<div class="button-selected unchecked">
									<div class="button-selected-icon"></div>
								</div>
								</div>
						</div>
					</div>
					</div>
			</div>
		</fieldset>
				
	  </div>
			</div>
    <input type="hidden" name="pp_status" id="input_pp_status" value="">
    <input type="hidden" name="pwd_score" id="input_pwd_score" value="">
    <input type="hidden" name="from_entity" id="input_from_entity" value="CySEC">
    <div >
      <div class="col-md-12">
        <div class="control-group form-ttl">
          <div class="controls"></div>
        </div>
      </div>
      <div>
        <div class="form__field">
          <div class="input-field input-field_width_full input-field_name">
            <div class="input-field__wrapper">
              <label class="input-field__label input-field__label_placeholder">
                <?=$this->sm->getword('First Name', $this->lg)?>
              </label>
              <input type="text" name="name" id="name" class="input-field_name input-field__input" onkeyup="steps_check_name('#step-1')">
            </div>
          </div>
          <div class="input-tooltip input-tooltip_name input-tooltip_error" style="display:none" >
            <?=$this->sm->getword('Please enter your first name', $this->lg)?>.
          </div>
        </div>
        <div class="form__field">
          <div class="input-field input-field_width_full input-field_surname">
            <div class="input-field__wrapper">
              <label class="input-field__label input-field__label_placeholder">
                <?=$this->sm->getword('Last Name', $this->lg)?>
              </label>
              <input type="text" name="surname" id="surname" class="input-field_surname input-field__input" onkeyup="steps_check_surname('#step-1')">
            </div>
          </div>
          <div class="input-tooltip input-tooltip_surname input-tooltip_error" style="display:none" >
            <?=$this->sm->getword('Please enter your last name', $this->lg)?>.
          </div>
        </div>
        <div class="form__field">
          <div class="input-field input-field_width_full input-field_email">
            <div class="input-field__wrapper">
              <label class="input-field__label input-field__label_placeholder">
                <?=$this->sm->getword('Enter Your Email', $this->lg)?>
              </label>
              <input type="text" name="email" id="email"  class="input-field_email input-field__input" onkeyup="steps_check_email('#step-1')">
            </div>
          </div>
          <div class="input-tooltip input-tooltip_error input-tooltip_email" style="display:none" >
            <?=$this->sm->getword('Enter a valid email', $this->lg)?>
          </div>
          <input type="hidden" value="<?=$this->sm->getword('You have an existing profile under this email.', $this->lg)?>" id="email_already_exist">
        </div>
      
        <div class="form__field">
          <div class="input-field input-field_width_full input-field_password">
            <div class="input-field__wrapper">
              <label class="input-field__label input-field__label_placeholder">
                <?=$this->sm->getword('Create Password', $this->lg)?>
              </label>
              <input type="password" name="password" id="password"  class="input-field_password input-field__input" onkeyup="steps_check_password('#step-1')">
            </div>
          </div>
          <div class="input-tooltip input-tooltip_password input-tooltip_error" style="display:none" >
            <?=$this->sm->getword('Password must be at least 6 characters!', $this->lg)?>
          </div>
        </div>
       <div class="uk-grid">
       <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">
	   
	  <div class="full-width form__field phone_container">
			<input type="hidden" id="phone_code_label" value="<?=lang('code')?>"/>
			<div class="col-bmd-3">
			<div class="form-group">
			<!--<input class="form-control input-field_phone_code_popup input-field__input_is-number" type="text" placeholder="<? echo $this->sm->getword('country code',$this->lg)?>" id="phone_code_popup" name="phone_code_popup" onKeyUp="check_phone_code_popup()" >-->
			<select class="input-select__input select2-hidden-accessible" id="phone_code_popup" name="phone_code_popup" tabindex="-1" aria-hidden="true" onchange="check_phone_code_popup()">
			<option value="" selected="selected" ></option>
			<?php
			$contries = $this->sm->getAllrecords_nowebsite('country','','name');
			foreach ($contries as $row){
			?>
			<option value="<?=$row['iso']?>">
			<?=$row['name']?>
			</option>
			<?php } ?>
			</select>
			<input type="hidden" id="telephonecodeval" >
			<span class="select2 select2-container select2-container--default" <?=$dir?> style=""> <span class="selection"> <span class="select2-selection select2-selection--single " role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-container" onClick="showcountries('#open_an_account-form')" id="showcountries"> <span class="select2-selection__rendered" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-container" >
			<div id="change_country">
			<div class="flag-icon flag-icon_af" style="background:none" ><?=lang('code')?></div>
			</div>
			</span> <span class="select2-selection__arrow" role="presentation"> <b role="presentation"></b></span> </span> </span> <span class="dropdown-wrapper" aria-hidden="true"></span> <span class="select2-dropdown select2-dropdown--below" id="show_countries"  <?=$dir?> style="width: 413.333px;display:none"> <span class="select2-search select2-search--dropdown">
			<input class="select2-search__field" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" type="search" id="inputString">
			</span> <span class="select2-results">
			<ul class="select2-results__options" role="tree" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-results" aria-expanded="true" aria-hidden="false" <?=$dir?>>
			<?php
			foreach ($contries as $row){
			?>
			<li class="select2-results__option countyr-selected-<?=strtolower($row['name'])?>" id="countyr-selected-<?=strtolower($row['iso'] )?>" role="treeitem" aria-selected="false" onClick="choose_country('#open_an_account-form','<?=$row['iso']?>','<?=strtolower($row['iso'] )?>','+<?=strtolower($row['phonecode'] )?>')"><span>
			<div class="flag-icon flag-icon_<?=strtolower($row['iso'] )?>"></div>
			<?=$row['name']?>
			</span></li>
			<?php
			}
			?>
			</ul>
			</span> </span> </span> 

			<div class="input-tooltip input-tooltip_error input-tooltip_phone_code_popup" style="display:none" ><?=lang('home_phone_code_error_msg')?></div>
			</div>
			</div>
			<div class="col-bmd-4">
				  
				  <div class="form__field">
					  <div class="input-field input-field_width_full input-field_phone_popup">
						<div class="input-field__wrapper">
						  <label class="input-field__label input-field__label_placeholder">
							<?=lang('home_phone_placeholder')?>
						  </label>
						 <input type="text" name="phone" id="phone_steps"  class="input-field_phone_popup input-field__input input-field__input_is-number" onkeyup="steps_check_phone_popup('#step-1')">
						</div>
					  </div>
					  <div class="input-tooltip input-tooltip_phone_popup input-tooltip_error" style="display:none" >
						<?=$this->sm->getword('Password must be at least 6 characters!', $this->lg)?>
					  </div>
					</div>
			</div>
		</div>
        <div class="full-width form__field" >
			<input type="hidden" id="country_residence_label" value="<?=$this->sm->getword('Country of Residence', $this->lg)?>"/>
          <div class="input-select input-select_width_full input-field_country">
            <label class="input-select__label" id="country_label"> <?=$this->sm->getword('Country of Residence', $this->lg)?></label>
            <select class="input-select__input select2-hidden-accessible" id="addr_country2" name="addr_country2" tabindex="-1" aria-hidden="true">
              <option value="" selected="selected" ></option>
              <?php
$contries = $this->sm->getAllrecords_nowebsite('country','','name');
foreach ($contries as $row){
 ?>
              <option value="<?=$row['iso']?>">
              <?=$row['name']?>
              </option>
              <?php } ?>
            </select>
            <span class="select2 select2-container select2-container--default" <?=$dir?> style="    height: 55px;"> <span class="selection"> <span class="select2-selection select2-selection--single " role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId2-container" onClick="showcountries2('#open_an_account-form')" id="showcountries2"> <span class="select2-selection__rendered" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId2-container" >
            <div id="change_country2">
              <div class="flag-icon flag-icon_af" style="background:none" ></div>
            </div>
            </span> <span class="select2-selection__arrow" role="presentation"> <b role="presentation"></b></span> </span> </span> <span class="dropdown-wrapper" aria-hidden="true"></span> <span class="select2-dropdown select2-dropdown--below" id="show_countries2"  <?=$dir?> style="width: 413.333px;display:none"> <span class="select2-search select2-search--dropdown">
            <input class="select2-search__field" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" type="search" id="inputString2">
            </span> <span class="select2-results">
            <ul class="select2-results__options" role="tree" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId2-results" aria-expanded="true" aria-hidden="false" <?=$dir?>>
              <?php
foreach ($contries as $row){
 ?>
              <li class="select2-results__option countyr-selected-<?=strtolower($row['name'])?>" id="countyr-selected-<?=strtolower($row['iso'] )?>" role="treeitem" aria-selected="false" onClick="choose_country2('#open_an_account-form','<?=$row['iso']?>','<?=strtolower($row['iso'] )?>','+<?=strtolower($row['phonecode'] )?>')"><span>
                <div class="flag-icon flag-icon_<?=strtolower($row['iso'] )?>"></div>
                <?=$row['name']?>
                </span></li>
              <?php
}
 ?>
            </ul>
            </span> </span> </span> 
			</div>
          <div class="input-tooltip input-tooltip_error input-tooltip_country" style="display:none" >
            <?=$this->sm->getword('Country is required', $this->lg)?>.
          </div>
        </div>
		
		<!-- Submit button -->
		<div class="full-width form__field">
			  <div class="actions clearfix" >
				<ul role="menu" aria-label="Pagination" style="margin:0 auto;width:100;">
					<?/*<li class="disabled" aria-disabled="true"><a href="#previous" role="menuitem">Previous</a></li>
					<li aria-hidden="true" class="disabled" aria-disabled="true" style="display: none;"><a href="#next" role="menuitem">Next</a></li>*/ ?>
					<li aria-hidden="false"><a href="#finish" id="sendFirstStepform_btn" class="white_color relative floatleft light_blue_bg pointer padding-10 transition-5ms" role="menuitem"><?=$this->sm->getword('Submit', $this->lg)?></a></li>
				</ul>
			</div>
		</div>
		<!-- -->
	
		</div>
		</div>
      </div>
      <div class="col-md-12">
        <div class="delimeter"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="input-tooltip" style="display:none" id="finalresult" style="max-width:100%;">
      </div>
    </div>
  </div>
  
  </div>
  <div class="bottom-note-block"></div>
  <div class="steps-desktop-only uk-margin-medium-top">
		<? echo $this->load->view('account-real-step1-side');?>
		
  </div>
</section>

