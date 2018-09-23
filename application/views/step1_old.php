
<section class="step1 form-horizontal LongRegisterForm wizard-card"> <a name="step1"></a>
  <input type="hidden" name="DST" value="9a6f90f2bb5fba427064cf16cd39df50">
  <input type="hidden" value="<?=$this->sm->getword('Next', $this->lg)?>" id="translated_next">
  <input type="hidden" value="<?=$this->sm->getword('Previous', $this->lg)?>" id="translated_previous">
  <input type="hidden" value="<?=$this->sm->getword('Submit', $this->lg)?>" id="translated_submit">
  <div class="col-md-12 col-lg-5">
    <div class="row">
      <div class="demo-regulators-block">
        <div id="block_jurisdiction">
          <p class="h4">
            <?=$this->sm->getword('Create Your', $this->lg)?>
            <strong>
            <?=$this->sm->getword('ICM', $this->lg)?>
            </strong>
            <?=$this->sm->getword('Profile', $this->lg)?>
            <span class="reg-time">(
            <?=$this->sm->getword('in 3 minutes', $this->lg)?>
            )</span>
		   </p>
          <p class="h2">
            <?=$this->sm->getword('Choose your regulator', $this->lg)?>
          </p>
          <div id="jurBlock" class="uk-margin-small-top">
            <div class="btn-group">
              <input type="hidden" name="from_entity" id="input_from_entitty" value="CySEC">
              <button type="button" class="btn radio btn-blue active" id="CySEC" value="CySEC">
              <?=$this->sm->getword('CySEC', $this->lg)?>
              </button>
              <button type="button" class="btn radio btn-blue passive" id="FCA" value="FCA">
              <?=$this->sm->getword('FCA', $this->lg)?>
              </button>
			  <button type="button" class="btn radio btn-blue passive" id="FSA" value="FSA"><?=$this->sm->getword('FSA', $this->lg)?></button>
            </div>
            <span class="secure-icon">
            <?=$this->sm->getword('Secure site', $this->lg)?>
            </span> </div>
        </div>
        <div class="jur_hq payment uk-margin-small-bottom"> <img src="assets/images/img-cysec.jpg" id="ps_image"> </div>
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
        <div class="form__field">
          <div class="input-field input-field_width_full input-field_name">
            <div class="input-field__wrapper">
              <label class="input-field__label input-field__label_placeholder">
                <?=$this->sm->getword('First Name', $this->lg)?>
              </label>
              <input type="text" name="name" id="name" class="input-field_name input-field__input" onkeyup="steps_check_name()">
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
              <input type="text" name="surname" id="surname" class="input-field_surname input-field__input" onkeyup="steps_check_surname()">
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
              <input type="text" name="email" id="email"  class="input-field_email input-field__input" onkeyup="steps_check_email()">
            </div>
          </div>
          <div class="input-tooltip input-tooltip_error input-tooltip_email" style="display:none" >
            <?=$this->sm->getword('Enter a valid email', $this->lg)?>
          </div>
          <input type="hidden" value="<?=$this->sm->getword('You have an existing profile under this email.', $this->lg)?>" id="email_already_exist">
        </div>
        <? /* <div class="control-group" id="block_email">
          <input type="text" value="" placeholder="<?=$this->sm->getword('Enter Your Email', $this->lg)?>" name="email" id="email"  class="input-field_email input-block-level" onkeyup="steps_check_email()">		 
		  <div class="input-tooltip input-tooltip_error input-tooltip_email" style="display:none" ><?=$this->sm->getword('Enter a valid email', $this->lg)?></div>			
		  <input type="hidden" value="<?=$this->sm->getword('You have an existing profile under this email.', $this->lg)?>" id="email_already_exist">
        </div> */?>
        <div class="form__field">
          <div class="input-field input-field_width_full input-field_password">
            <div class="input-field__wrapper">
              <label class="input-field__label input-field__label_placeholder">
                <?=$this->sm->getword('Create Password', $this->lg)?>
              </label>
              <input type="password" name="password" id="password"  class="input-field_password input-field__input" onkeyup="steps_check_password()">
            </div>
          </div>
          <div class="input-tooltip input-tooltip_password input-tooltip_error" style="display:none" >
            <?=$this->sm->getword('Password must be at least 6 characters!', $this->lg)?>
          </div>
        </div>
        <? /* <div class="control-group" id="block_password">
     <input type="password" value="" placeholder="<?=$this->sm->getword('Create Password', $this->lg)?>" name="password" id="password"  class="input-field_password input-block-level" onkeyup="steps_check_password()">			<div class="input-tooltip input-tooltip_password input-tooltip_error" style="display:none" ><?=$this->sm->getword('Password must be at least 6 characters!', $this->lg)?></div>
        </div> */ ?>
        <? /* <div class="control-group" id="block_name">
   <input type="text" value="" placeholder="<?=$this->sm->getword('Name', $this->lg)?>" name="name" id="name" class="input-field_name input-block-level" onkeyup="steps_check_name()">		 <? /* <div class="input-tooltip input-tooltip_name input-tooltip_error" style="display:none" ><?=$this->sm->getword('Name', $this->lg)?></div> */?>
        <? /* </div> */ ?>
        <? /*<div class="control-group" id="block_surname">
          <input type="text" value="" placeholder="<?=$this->sm->getword('Last Name', $this->lg)?>" name="surname" id="surname" class="input-field_surname input-block-level" onkeyup="steps_check_surname()">					<? /*<div class="input-tooltip input-tooltip_surname input-tooltip_error" style="display:none" ><?=$this->sm->getword('Last Name', $this->lg)?></div> */?>
        <? /* </div> */?>
        <? /* <div class="control-group" id="block_country">
          <label class="control-label tal" for="input_country"><?=$this->sm->getword('Country of Residence', $this->lg)?></label>
          <div class="controls">
            <select name="country" id="country" onchange="toggle_id3_uru();toggle_reasons();" class="input-field_country input-block-level">								<? 					$default_val = 'LB';					foreach($countries as $country){									?>				 <option value="<?=$country['iso']?>" <? if($default_val == $country['iso']) echo 'selected="selected"';?>><?=$country['name']?></option>				<? } ?>
             
            </select>			
          </div>
        </div> */?>
        <? /*<div class="form__field">
               <div class="input-field input-field_select input-field_width_full">
					<div class="input-field__wrapper input-field_select__wrapper">
						<label class="input-field__label input-field__select_label input-field__label_placeholder"><?=$this->sm->getword('Country of Residence', $this->lg)?></label>
					  <select name="country" id="country" onchange="toggle_id3_uru();toggle_reasons();" class="input-field__input input-field__input">								
					  <? 
						$default_val = 'LB';					
						foreach($countries as $country){?>
							<option value="<?=$country['iso']?>" <? if($default_val == $country['iso']) echo 'selected="selected"';?>>
							
							<?=$country['name']?></option>				
							<? } ?>
					
					  </select> 
					  </div>
				  </div>
              </div>
      </div> */ ?>
	  <div class="full-width form__field">
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
			<span class="select2 select2-container select2-container--default" dir="ltr" style=""> <span class="selection"> <span class="select2-selection select2-selection--single " role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-container" onClick="showcountries()" id="showcountries"> <span class="select2-selection__rendered" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-container" >
			<div id="change_country">
			<div class="flag-icon flag-icon_af" style="background:none" >Code</div>
			</div>
			</span> <span class="select2-selection__arrow" role="presentation"> <b role="presentation"></b></span> </span> </span> <span class="dropdown-wrapper" aria-hidden="true"></span> <span class="select2-dropdown select2-dropdown--below" id="show_countries"  dir="ltr" style="width: 413.333px;display:none"> <span class="select2-search select2-search--dropdown">
			<input class="select2-search__field" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" type="search" id="inputString">
			</span> <span class="select2-results">
			<ul class="select2-results__options" role="tree" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-results" aria-expanded="true" aria-hidden="false">
			<?php
			foreach ($contries as $row){
			?>
			<li class="select2-results__option countyr-selected-<?=strtolower($row['name'])?>" id="countyr-selected-<?=strtolower($row['iso'] )?>" role="treeitem" aria-selected="false" onClick="choose_country('<?=$row['iso']?>','<?=strtolower($row['iso'] )?>','+<?=strtolower($row['phonecode'] )?>')"><span>
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
						 <input type="text" name="phone" id="phone_popup"  class="input-field_phone_popup input-field__input input-field__input_is-number" onkeyup="steps_check_phone_popup()">
						</div>
					  </div>
					  <div class="input-tooltip input-tooltip_phone_popup input-tooltip_error" style="display:none" >
						<?=lang('home_phone_error_msg2')?>
					  </div>
					</div>
			</div>
			</div>
        <?php /*<div class="form__field">
          <div class="input-select input-select_width_full input-field_country">
            <label class="input-select__label"> <?=$this->sm->getword('Country of Residence', $this->lg)?></label>
            <select class="input-select__input select2-hidden-accessible" id="addr_country" name="addr_country" tabindex="-1" aria-hidden="true">
              <option value="" selected="selected" ></option>
              <?php
$contries = $this->sm->getAllrecords('country','','name');
foreach ($contries as $row){
 ?>
              <option value="<?=$row['iso']?>">
              <?=$row['name']?>
              </option>
              <?php } ?>
            </select>
            <span class="select2 select2-container select2-container--default" dir="ltr" style=""> <span class="selection"> <span class="select2-selection select2-selection--single " role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-container" onClick="showcountries()" id="showcountries"> <span class="select2-selection__rendered" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-container" >
            <div id="change_country">
              <div class="flag-icon flag-icon_af" style="background:none" ></div>
            </div>
            </span> <span class="select2-selection__arrow" role="presentation"> <b role="presentation"></b></span> </span> </span> <span class="dropdown-wrapper" aria-hidden="true"></span> <span class="select2-dropdown select2-dropdown--below" id="show_countries"  dir="ltr" style="width: 413.333px;display:none"> <span class="select2-search select2-search--dropdown">
            <input class="select2-search__field" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" type="search" id="inputString">
            </span> <span class="select2-results">
            <ul class="select2-results__options" role="tree" id="select2-Form_845758092a3f498ca7b3038653eb1fb6_countryId-results" aria-expanded="true" aria-hidden="false">
              <?php
foreach ($contries as $row){
 ?>
              <li class="select2-results__option countyr-selected-<?=strtolower($row['name'])?>" id="countyr-selected-<?=strtolower($row['iso'] )?>" role="treeitem" aria-selected="false" onClick="choose_country('<?=$row['iso']?>','<?=strtolower($row['iso'] )?>','+<?=strtolower($row['phonecode'] )?>')"><span>
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
		*/ ?>
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
  <?/*<div class="desktop-only col-lg-6 col-lg-offset-1 col-md-12 notes">
    <p class="h4 notes-title">
      <?=$this->sm->getword('step-1-msg', $this->lg)?>
    </p>
    <ul class="advantage-notes-list">
      <li class="secure">
        <?=$this->sm->getword('step-1-2-msg', $this->lg)?>
        <span id="regulator_name">
        <?=$this->sm->getword('CySEC', $this->lg)?>
        </span></li>
      <li class="lighting">
        <?=$this->sm->getword('step-1-3-msg', $this->lg)?>
      </li>
      <li class="deposit">
        <?=$this->sm->getword('step-1-4-msg', $this->lg)?>
      </li>
    </ul>
    <div class="bottom-note-block"></div>
  </div> */ ?>
  <div class="desktop-only">
		  <div class="col-lg-6 col-lg-offset-1 col-md-12 notes" id="FCA_tab">
			   <p class="h4 notes-title">
					ICM (FCA)
			   </p>
				<!--<ul class="advantage-notes-list">
				  <li>
						
						FCA : <strong>YES</strong>
					</li>
				  <li>
					Professional client accepted : <strong>NO</strong>
				  </li>
				  <li>
					Leverage : <strong>Up to 200:1</strong>
				  </li>
				  <li>
					Credit : <strong>Bonus 10%</strong>
				  </li>
				   <li>
					Stop out level : <strong>50%</strong>
				  </li>
				   <li>
					24/5 support : <strong>YES</strong>
				  </li>
				</ul>-->
				<div class="advantage-notes-list">
				  <div class="row">
						
						<div class="col-md-6">
							FCA<span class="floatright">:</span>
						</div>
						<div class="col-md-6">
						<strong>YES</strong>
						</div>
					</div>
				   <div class="row">
				  
					<div class="col-md-6">
							Professional client accepted<span class="floatright">:</span> 
						</div>
						<div class="col-md-6">
						<strong>NO</strong>
						</div>
				  </div>
				  <div class="row">
					<div class="col-md-6">
							Leverage<span class="floatright">:</span> 
						</div>
						<div class="col-md-6">
						<strong>Up to 200:1</strong>
						</div>
				  </div>
				 <div class="row">
					<div class="col-md-6">
							Credit<span class="floatright">:</span> 
						</div>
						<div class="col-md-6">
						<strong>Bonus 10%</strong>
						</div>
				  </div>
				  <div class="row">
					<div class="col-md-6">
							Stop out level<span class="floatright">:</span>
						</div>
						<div class="col-md-6">
						<strong>50%</strong>
						</div>
				  </div>
				  <div class="row">
					<div class="col-md-6">
							24/5 support<span class="floatright">:</span>
						</div>
						<div class="col-md-6">
						<strong>YES</strong>
						</div>
					<!--24/5 support : <strong>YES</strong>-->
				  </div>
				</div>
				<div class="bottom-note-block"></div>
		  </div>
			<div class="col-lg-6 col-lg-offset-1 col-md-12 notes active_tab" id="CySEC_tab">
	   <p class="h4 notes-title">
			ICM (CySec)
	   </p>
		<!--<ul class="advantage-notes-list">
		  <li>
				CySec Regulated : <strong>YES</strong>
			</li>
		  <li>
			Segregated client funds : <strong>YES</strong>
		  </li>
		  <li>
			Professional client accepted : <strong>Leverage up to 200:1 or more</strong>
		  </li>
		  <li>
			Leverage : <strong>Up to 30:1</strong>
		  </li>
		   <li>
			Stop out level : <strong>50%</strong>
		  </li>
		   <li>
			24/5 support : <strong>YES</strong>
		  </li>
		</ul> -->
		<div class="advantage-notes-list">
		  <div class="row">
				
				<div class="col-md-6">
					CySec Regulated<span class="floatright">:</span>
				</div>
				<div class="col-md-6">
				<strong>YES</strong>
				</div>
			</div>
		   <div class="row">
		  
			<div class="col-md-6">
					Segregated client funds<span class="floatright">:</span> 
				</div>
				<div class="col-md-6">
				<strong>YES</strong>
				</div>
		  </div>
		  <div class="row">
			<div class="col-md-6">
					Professional client accepted<span class="floatright">:</span> 
				</div>
				<div class="col-md-6">
				<strong>Leverage up to 200:1 or more</strong>
				</div>
		  </div>
		 <div class="row">
			<div class="col-md-6">
					Leverage<span class="floatright">:</span> 
				</div>
				<div class="col-md-6">
				<strong>Up to 30:1</strong>
				</div>
		  </div>
		  <div class="row">
			<div class="col-md-6">
					Stop out level<span class="floatright">:</span>
				</div>
				<div class="col-md-6">
				<strong>50%</strong>
				</div>
		  </div>
		  <div class="row">
			<div class="col-md-6">
					24/5 support<span class="floatright">:</span>
				</div>
				<div class="col-md-6">
				<strong>YES</strong>
				</div>
		  </div>
		</div>
		<div class="bottom-note-block"></div>
	  </div>
  </div>
</section>
