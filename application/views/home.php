<? /*<div class="popup-shadow" onClick="hidepopup()"  ></div>
<div class="popup-shadow-2"   ></div>
<div class="popup-section" >
<img class="close-it" src="assets/images/close.png" onClick="hidepopup()"  />
<div class="text-container" >
<h3 class="text-center" >Register for your <strong>Live Account</strong> and get <strong>10% Bonus on Deposits*</strong></h3>
<div class="full-width home_newsletter" style="background:none" >
<input type="hidden" name="lang_ref" id="lang_ref" value="<?=$this->lang->lang()?>">
<div class="full-width">
<div class="full-width">
<div class="col-amd-2">
<div class="form-group">
<input class="form-control input-field_name_popup" type="text" placeholder="<?=lang('home_first_name_placeholder')?>" id="name_popup" name="name" onKeyUp="check_name_popup()">
<div class="input-tooltip input-tooltip_name_popup input-tooltip_error" style="display:none" ><?=lang('home_first_name_error_msg')?></div>
</div>
</div>
<div class="col-amd-2-1">
<div class="form-group">
<input class="form-control input-field_name_last_popup" type="text" placeholder="<?=lang('home_last_name_placeholder')?>" id="last_name_popup" name="last_name" onKeyUp="check_name_last_popup()">
<div class="input-tooltip input-tooltip_last_name_popup input-tooltip_error" style="display:none" ><?=lang('home_last_name_error_msg')?></div>
</div>
</div>
</div>
<div class="col-amd">
<div class="form-group">
<input class="form-control input-field_email_popup input-field__input_is-address" type="text" placeholder="<?=lang('home_email_placeholder')?>" id="email_popup" name="email" onKeyUp="check_email_popup()">
<div class="input-tooltip input-tooltip_error input-tooltip_email_popup" style="display:none" ><?=lang('home_email_error_msg')?></div>
</div>
</div>
<div class="full-width">
<div class="col-amd-3">
<div class="form-group">
<!--<input class="form-control input-field_phone_code_popup input-field__input_is-number" type="text" placeholder="<? echo $this->sm->getword('country code',$this->lg)?>" id="phone_code_popup" name="phone_code_popup" onKeyUp="check_phone_code_popup()" >-->

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
$contries = $this->sm->getAllrecords_nowebsite('country','','name');
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
</span> </span> 

<div class="input-tooltip input-tooltip_error input-tooltip_phone_code_popup" style="display:none; position:absolute; top:40px" ><?=lang('home_phone_code_error_msg')?></div>
</span> 
<select class="input-select__input select2-hidden-accessible" id="phone_code_popup" name="phone_code_popup" tabindex="-1" aria-hidden="true" onchange="check_phone_code_popup()">
<option value="" selected="selected" ></option>
<?php
foreach ($contries as $row){
?>
<option value="<?=$row['iso']?>">
<?=$row['name']?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="col-amd-4">
<div class="form-group">
<input class="form-control input-field_phone_popup input-field__input_is-number" type="text" placeholder="<?=lang('home_phone_placeholder')?>" id="phone_popup" name="phone" onKeyUp="check_phone_popup()">
<div class="input-tooltip input-tooltip_error input-tooltip_phone_popup" style="display:none;" ><?=lang('home_phone_error_msg2')?></div>
</div>
</div>
</div>
<div class="full-width">
<div class="form-group">
<div class="col-amd">
<label class="container-popup read_terms" onclick="showpopup2()"><?=lang('home_accept_terms_msg')?>
  <input type="checkbox" class="checking input-field_checkbox_popup" readonly="readonly" onChange="ifchecked(this.value)"  >
  <span class="checkmark"></span>
</label>
<div class="input-tooltip input-tooltip_error input-tooltip_checkbox_popup" style="display:none" ><?=lang('check_please')?></div>
</div>
</div>
</div>
<div class="col-amd text-center">
<button class="btn btn-primary" onClick="sendform_popup()" id="subscribe_here_popup"><?=lang('home_subscribe_button')?></button>
</div>
<div class="col-amd">
<div class="input-tooltip text-center" style="display:none" id="finalresult_popup"></div>
</div>
</div>
</div>
</div>

</div> */ ?>
<div class="popup-section-2" >
<div class="text-container-2" id="flux" >
<h2 class="with-line text-center"><?=$this->sm->getword('Terms and Conditions',$this->lg)?></h2>
<h3>Continuous 10% Bonus to Cash Reward</h3>
<p>In order to participate in the Continuous 10% Bonus to Cash Reward promotion you agree to be bound by these terms and conditions as well as the general terms that apply to your account.</p>
<div style="margin: 0px auto;">
<table border="1" cellspacing="0" cellpadding="0" width="512" height="252" class="table" style="height: 252px; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td width="23%" valign="top">
<p align="center"><strong>Deposit</strong></p>
</td>
<td width="35%" valign="top">
<p align="center"><strong>10% Credit Bonus</strong></p>
</td>
<td width="23%" valign="top">
<p align="center"><strong>Lots to be traded</strong></p>
</td>
<td width="25%" valign="top">
<p align="center"><strong>Cash reward</strong></p>
</td>
</tr>
<tr>
<td  valign="top">
<p>2,000 USD</p>
</td>
<td  valign="top">
<p>200 USD</p>
</td>
<td  valign="top">
<p>40</p>
</td>
<td  valign="top">
<p>200 USD</p>
</td>
</tr>
<tr>
<td  valign="top">
<p>3,000 USD</p>
</td>
<td  valign="top">
<p>300 USD</p>
</td>
<td  valign="top">
<p>60</p>
</td>
<td  valign="top">
<p>300 USD</p>
</td>
</tr>
<tr>
<td  valign="top">
<p>4,000 USD</p>
</td>
<td  valign="top">
<p>400 USD</p>
</td>
<td  valign="top">
<p>80</p>
</td>
<td  valign="top">
<p>400 USD</p>
</td>
</tr>
<tr>
<td  valign="top">
<p>5,000 USD</p>
</td>
<td  valign="top">
<p>500 USD</p>
</td>
<td  valign="top">
<p>100</p>
</td>
<td  valign="top">
<p>500 USD</p>
</td>
</tr>
<tr>
<td  valign="top">
<p>10,000 USD</p>
</td>
<td  valign="top">
<p>1,000 USD</p>
</td>
<td  valign="top">
<p>200</p>
</td>
<td  valign="top">
<p>1,000 USD</p>
</td>
</tr>
<tr>
<td  valign="top">
<p>Above 10,000 USD</p>
</td>
<td  valign="top">
<p>1,000 USD</p>
</td>
<td  valign="top">
<p>200</p>
</td>
<td  valign="top">
<p>1,000 USD</p>
</td>
</tr>
</tbody>
</table>
</div>
<p align="center"><strong>Formula: Credit bonus / 5 = lots to be traded</strong></p>
<p><strong>Terms and Conditions</strong></p>
<ol>
<li>10% credit bonus will be issued on each new deposit above 2,000 USD.</li>
<li>10% credit bonus is for trading purposes only until set amount of lots have been traded; after which credit bonus can be turned into cash.</li>
<li>For each new deposit that is made a new bonus can be received as long as the bonus amount does not exceed 1,000 USD bonus per account.</li>
<li>The client can convert each new bonus to cash whenever the correlating lots, which match the above formula “Credit bonus / 5 = lots to be traded”, have been traded.</li>
<li>A maximum of 1,000 USD cash can be issued per account each time the fixed amount of lots has been reached.</li>
<li>Calculations will be made on a deposit by deposit basis.</li>
<li>There is no time limit for the lots to be traded.</li>
<li>In the process of trading the client can withdraw funds from their account but this may result in credit bonus reduction by 10% of the withdrawal amount accordingly.</li>
<li>If a client deposits more than 10,000 USD then they will be able to maintain 1,000 USD bonus as long as more than 10,000 USD is maintained in the account. <br /> Example: Client deposits 10,000 USD and receives 1,000 USD bonus, they later deposit another 5,000 USD to the same account (they do not receive anything as the maximum bonus they can receive in one account is 1,000 USD). The client then withdraws 5,000 USD; they keep 1,000 USD bonus as this correlates to the original 10,000 USD deposit.</li>
<li>Any withdrawals of profit must be funded to a bank account which matches the ICM Capital account holder’s name.</li>
<li>Traded lots will be calculated on the last working day of each month. Any applicable cash reward will be deposited into the clients live account within 5 working days thereafter if all terms have been met.</li>
<li>No Marketing Agent’s commission is included in the calculations for bonus or cash reward.</li>
<li>Master accounts and sub-accounts are entitled to this promotion and can receive a maximum of 1,000 USD bonus per account.</li>
<li>This revised promotion starts on 1<sup>st</sup> March 2014 and ending on 01/08/2018.</li>
<li>Clients will be informed before this promotion ends and any remaining trading credit is withdrawn.</li>
</ol>
<br>
<p><strong>Communication Delay</strong></p>
<p>ICM Capital shall not be made liable for any delays in the acceptance or transmission of orders due to a breakdown or failure of transmission or communication facilities, or for any other cause beyond their reasonable control or anticipation.</p>
<p><strong>Disentitlement</strong></p>
<p>In cases of any indiscretion in trading, over leveraging, misuse of orders where "scalping" or “sniping” or “hedging” may be involved, such transactions will not be taken into consideration and will be treated as Terms and Conditions breaching activity and may even be removed from participants accounts. ICM Capital reserves the right to disqualify any participant or cancel the trades found in violation of the trading rules or applying inappropriate trading strategies. Scalping is defined as a trade that was opened and closed within a very short period of time. Hedging means a client over exposing his account with an opposite trade to an existing trade with the same trade volume with ICM Capital or another company to gain profit from deal terms.</p>
<p><strong>Postponement or Cancellation</strong></p>
<p>ICM Capital in its sole discretion, reserves the right to extend or postpone the promotion periods, to cancel the promotion and/or to reject any participant's application if determined that such action is reasonable and/or necessary.<br /><br /> The credit bonus will be forfeited and removed from the account under the following circumstances:</p>
<ul>
<li>The account gets liquidated/stopped out <u>OR</u></li>
<li>The account balance becomes negative <u>and</u> account has no open positions</li>
</ul>
<p>If the equity/margin falls below 0%, the credit bonus will be utilised to adjust balances to zero.</p>
<p><strong>Promotion Terms</strong></p>
<p>ICM Capital reserves the right to amend or waive any rule during and after this promotion. We may make changes to the Terms and Conditions and will notify you of these changes by posting the modified terms on the ICM Capital website.</p>
<p><strong>Engaging in CFDs or Spot FX carries a high risk to your capital. You should not engage in this form of investing unless you understand the nature of the Transaction you are entering into and the true extent of your exposure to the risk of loss. Your profit and loss will vary according to the extent of the fluctuations in the price of the underlying markets on which the trade is based.</strong></p>
<p>Please <a data-id="3489" href="<?=site_url('pages/terms_and_conditions')?>" title="Terms and Conditions">click here</a> for full trading terms and conditions.</p>
<p>These terms are dated 10<sup>th</sup> January 2018.</p>
</div>
<div class="buttons-container-2" >
<img alt="arrow_down.png" class="arrow-down"   onClick="scrolldiv()"
src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjE4M0RCMzM2NzNDQTExRTg5OTM4ODUzQzY0NzA4RTNGIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjE4M0RCMzM3NzNDQTExRTg5OTM4ODUzQzY0NzA4RTNGIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MTgzREIzMzQ3M0NBMTFFODk5Mzg4NTNDNjQ3MDhFM0YiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MTgzREIzMzU3M0NBMTFFODk5Mzg4NTNDNjQ3MDhFM0YiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5mbLr9AAAKBUlEQVR42uxYbXBVRxl+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" />
<button class="button-2 button-green-2" onclick="hidepopup2()" ><?=lang('home_give_consent_msg')?></button>
</div>
</div>
<div class="banner_details full_width"  >

</div>
<input type="hidden" id="site_url" value="<?=site_url('')?>">
<div class="full-width banner-icons icon" >
		<div class="container">
        <span class="banner-icon" >
        <ul>
          <li class="icon4"> &nbsp; <font><?=$this->sm->getword('Multi-Regulated Brokerage House',$this->lg)?></font></li>
          <li class="icon5"> &nbsp; <font><?=$this->sm->getword('Superior Execution &amp; Liquidity Depth',$this->lg)?></font></li>
          <li class="icon2"> &nbsp; <font><?=$this->sm->getword('Flexible Leverage',$this->lg)?></font></li>
          <li class="icon3"> &nbsp; <font><?=$this->sm->getword('Balance Protection',$this->lg)?></font></li>
          </ul>
        </span> 
        </div>
        <span class="full-width text-center white_color margin-top-10" >
        <?=$this->sm->getword('CFD’s are complex instruments, and there is a high risk of losing money.',$this->lg)?>
        </span>
</div>

<div class="full-width" >
		<?php /*<section class="m_b_30">
		<div class="container">
			<h1 class="heading1 ufo_heading m_b_30 text-center"><?=lang('home_products_title')?></h1>

			<div class="text-center m_b_heading sub-heading m_b_30 our-proudct-text"><?=lang('home_products_sub_title')?></div>
			<div class="home-products">
			<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<a href="<?=site_url('products/spot-forex')?>" >
							<div class="block">
								 <center>
									 <img src="assets/images/products/new/otc_spot_forex.png" class="image">
								 </center>
								 <div class="middle">
								<h6 class="text"><?=lang('home_products_p1_title')?></h6>
						 </div>
						 		</div>
					 		</a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<a href="<?=site_url('products/precious-metals')?>" >
							<div class="block">
								 <center>
									 <img src="assets/images/products/new/otc_precious_metal.png" class="image">
								 </center>
								 <div class="middle">
								 <h6 class="text"><?=lang('home_products_p2_title')?></h6>
							</div>
							 </div>
						  </a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<a href="<?=site_url('products/us-stocks')?>" >
							<div class="block">
								 <center>
									 <img src="assets/images/products/new/otc_US_stocks.png" class="image">
								 </center>
								 <div class="middle">
									<h6 class="text"><?=lang('home_products_p3_title')?></h6>
							 </div>
							 </div>
							</a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<a href="<?=site_url('products/currency-futures')?>" >
							<div class="block">
								 <center>
									 <img src="assets/images/products/new/otc_currency_futures.png" class="image">
								 </center>
								 <div class="middle">
									 <h6 class="text"><?=lang('home_products_p4_title')?></h6>
								</div>
							 </div>
							</a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						 <a href="<?=site_url('products/energy-futures')?>" >
							 <div class="block">
									<center>
										<img src="assets/images/products/new/otc_energy_futures.png" class="image">
									</center>
									<div class="middle">
										<h6 class="text"><?=lang('home_products_p5_title')?></h6>
								 </div>
								</div>
							 </a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						 <a href="<?=site_url('products/index-futures')?>" >
							 <div class="block">
									<center>
										<img src="assets/images/products/new/otc_index_futures.png" class="image">
									</center>
									<div class="middle">
										<h6 class="text"><?=lang('home_products_p6_title')?></h6>
								 </div>
								</div>
							 </a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						 <a href="<?=site_url('products/metals-futures')?>" >
							 <div class="block">
									<center>
										<img src="assets/images/products/new/otc_metal_futures.png" class="image">
									</center>
									<div class="middle">
										<h6 class="text"><?=lang('home_products_p7_title')?></h6>
								 </div>
								</div>
							 </a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						 <a href="<?=site_url('products/cryptocurrencies')?>" >
							 <div class="block">
									<center>
										<img src="assets/images/products/new/cryptocurrency.png" class="image">
									</center>
									<div class="middle">
									 	<h6 class="text"><?=lang('home_products_p8_title')?></h6>
								 </div>
								</div>
							 </a>
					</div>
			</div>
		</div>
		</div>
	</section> */?>
	<section>
		<div class="container">
			<h1 class="heading1 ufo_heading m_b_30 text-center"><?=$this->sm->getword('Key Features',$this->lg)?></h1>

			<div class="key-features">
			<div class="row">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
								<span class="sprite parallel"></span>
								<p class="top"><?=$this->sm->getword('Very Tight Spreads Trading',$this->lg)?></p>
								<p class="bottom"><?=$this->sm->getword('ECN Spreads from 0.0 Pips',$this->lg)?></p>
						</div>
						<div class="swiper-slide">
								<span class="sprite trading"></span>
								<p class="top"><?=$this->sm->getword('Market Execution',$this->lg)?></p>
								<p class="bottom"><?=$this->sm->getword('Ultra-fast Execution with no Re-quotes*',$this->lg)?></p>
						</div>
						<div class="swiper-slide">
								<span class="sprite leverage"></span>
								<p class="top"><?=$this->sm->getword('Deep Liquidity',$this->lg)?></p>
								<p class="bottom"><?=$this->sm->getword('Liquidity from Tier-1 Banks',$this->lg)?></p>
						</div>
						<div class="swiper-slide">
								<span class="sprite expect"></span>
								<p class="top"><?=$this->sm->getword('Leveraged Trading',$this->lg)?></p>
								<p class="bottom"><?=$this->sm->getword('Leverage up to 1:30 on Major Currency Pairs',$this->lg)?></p>
						</div>
						<div class="swiper-slide">
								<span class="sprite variety"></span>
								<p class="top"><?=$this->sm->getword('Variety of Products',$this->lg)?></p>
								<p class="bottom"><?=$this->sm->getword('Forex, Commodities &amp; CFDs in One Account',$this->lg)?></p>
						</div>
						<div class="swiper-slide">
								<span class="sprite support"></span>
								<p class="top"><?=$this->sm->getword('Outstanding Support',$this->lg)?></p>
								<p class="bottom"><?=$this->sm->getword('Award-winning Client Services Team**',$this->lg)?></p>
						</div>
						<div class="swiper-slide">
								<span class="sprite news"></span>
								<p class="top"><?=$this->sm->getword('Live News',$this->lg)?></p>
								<p class="bottom"><?=$this->sm->getword('SMS, Live Streaming and Trading Central Reports',$this->lg)?></p>
						</div>
					</div>
			</div>
			<div class="row center">
					<div class="text-center" style="margin:0 auto; width:300px">
						<div class="benefits">
							<p class="stars">*&nbsp;<a style="color: #004E7F;" data-id="27467" href="javascript:void(0)" title="Execution Transparency"><span><?=$this->sm->getword('Ultra-fast Execution',$this->lg)?></span></a></p>
							</div>
						<div class="benefits">
						<p class="stars"><span>** <a style="color: #004E7F;" data-id="1478" href="<?=site_url('about_us/awards')?>" title="<?=$this->sm->getword('Award-winning Support',$this->lg)?>"><?=$this->sm->getword('Award-winning Support',$this->lg)?></a></span></p>
						</div>
					</div>
			</div>
		</div>
		
		</div>
	</section>
		<section class="smartphones m_b_30">
				<div class="container">
						<div class="row">
								<div class="col-md-12">
										<h1 class="m_b_heading heading1 ufo_heading m_b_30 text-center"><?=lang('home_platforms_title')?></h1>
								</div>
						</div>

						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 smartphones-left-container">
									<div class="smartphones-left divAnimated">
											<img src="assets/images/home/PlatformsPage_Image2.png" alt="">
									</div>
							</div>
								<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 smartphones-center-container no-padding">
									<div class="centered-content smartphones-center divAnimated">
										<center>
											<ul>
												<li style="color: #044f80;">
													<a href="<?=site_url('platforms/mt4_desktop')?>"  style="color: #044f80;"><i class="fa fa-3x fa-windows"></i></a><?=lang('home_windows_title')?>
												</li>
												<li style="color: #044f80;">
													<a href="<?=site_url('platforms/mt4_iphone')?>"  style="color: #044f80;"><i class="fa fa-3x fa-apple"></i></a><?=lang('home_app_store_title')?></li>
												<li style="color: #044f80;"><a href="<?=site_url('platforms/mt4_android')?>"  style="color: #044f80;"><i class="fa fa-3x fa-android"></i></a><?=lang('home_goole_play_title')?></li>
											</ul>
											<div class="relative-position platforms">
												<div class="platforms-img">
													<a href="<?=site_url('platforms/mt4_all')?>" title="MT4" >
													
															<img src="assets/images/home/MT4-logo.png" class="mt4_animation common_animation" id="mt4_img">
													
													</a>
												</div>
												<div class="platforms-img">
													<a href="<?=site_url('platforms/mt5_all')?>" title="MT5" > 
													<img src="assets/images/home/mt5-logo.png" class="mt5_animation common_animation" id="mt5_img"></a>
												</div>
												<div class="platforms-img">
													<a href="<?=site_url('platforms/ctrader_all')?>"  class="ctrader_link" title="cTrader"> 
													
													<img src="assets/images/home/cTrader.png" class="ctrader_animation common_animation" id="ctrader_img"></a>
												</div>
												</div>
										</center>
									</div>
								</div>
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 smartphones-right-container no-padding">
								<div class="smartphones-right divAnimated">
										<img src="assets/images/home/mt4-android-ios.png" alt="">
								</div>
							</div>
						</div>
				</div>
		</section>
		<section class="m_b_60">
			<div class="container">
						<h1 class="heading1 ufo_heading m_b_30 text-center"><?=lang('home_event_title')?></h1>
						<div class="home_events_boxes">
								<div class="row">
										<div class="col-md-4">
												<div class="card">
														<figure style="background:url('assets/images/home/events/46.jpg') ; "></figure>
														<div class="card-overlay">
																<font class="event_date"><?=lang('home_event1_date')?></font>
																<font class="event_title"><?=lang('home_event1_title')?> </font>
																<font class="event_location"><?=lang('home_event1_loc')?></font>
																<a href="<?=site_url('about_us/events')?>"  class="read_more_event" title="Read More"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
														</div>
												</div>
											</div>
											<div class="col-md-4">
													<div class="card">
															<figure style="background:url('assets/images/home/events/3.jpg') ; "></figure>
															<div class="card-overlay">
																	<font class="event_date"><?=lang('home_event2_date')?></font>
																	<font class="event_title"><?=lang('home_event2_title')?> </font>
																	<font class="event_location"><?=lang('home_event2_loc')?></font>
																	<a href="<?=site_url('about_us/events')?>"  class="read_more_event" title="Read More"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
															</div>
													</div>
												</div>
												<div class="col-md-4">
														<div class="card">
																<figure style="background:url('assets/images/home/events/1.jpg') ; "></figure>
																<div class="card-overlay">
																		<font class="event_date"> <?=lang('home_event3_date')?></font>
																		<font class="event_title"><?=lang('home_event3_title')?> </font>
																		<font class="event_location"><?=lang('home_event3_loc')?></font>
																		<a href="<?=site_url('about_us/events')?>"  class="read_more_event" title="Read More"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
																</div>
														</div>

													</div>
								</div>
						</div>
			</div>
		</section>
		<section class="home_economic_calendar">
			<div class="container new_container">
			<div class="advantages new_container">
          <div class="row quotes">
            <div class="container">
              <div class="col-md-6 col-xs-12 col-sm-12 quotes_container">
                	<h2 class="heading1 ufo_heading m_b_30 text-center"><?=lang('home_economic_calendar_title')?> <span class="calendar_title_date" data-culture="<?=$language_code?>"></span></h2>
                <div class="calendar_table desktop loading" data-url="Calendar?fromDateUtc=${fromDateUtc}&amp;toDateUtc=${toDateUtc}&amp;culture=<?=$language_code?>">
                  <div class="calendar_top">
                    <div class="time"><?=lang('home_gmt_title')?></div>
                    <div class="event_common"><?=lang('home_event_title')?></div>
                    <div class="statistic"><?=lang('home_imp_title')?></div>
                    <div class="actual"><?=lang('home_actual_title')?></div>
                    <div class="con"><?=lang('home_forecast_title')?></div>
                    <div class="prev"><?=lang('home_previous_title')?></div>
                  </div>
                  <!-- / calendar_top-->
                  <div class="calendar_push styled_scroll"></div>
                  <!-- /calendar push -->
                </div>
                <!-- / calendar_common -->
                <div class="calendar_table mobile loading" data-url="Calendar?fromDateUtc=${fromDateUtc}&amp;toDateUtc=${toDateUtc}&amp;culture=en-GB"></div>
                <!-- / calendar table -->
                <script id="newsDesktopTmpl" type="text/x-jquery-tmpl">
	{{each news}}
	<div class="line">
		<div class="date">${Time}</div>
		<div class="currency"><span class="blob">${Currency}</span><span class="iti-flag ${CountryCode}"></span></div>
		<div class="event">${Text}</div>
		<div class="statistic s${Priority}"><span></span></div>
		<div class="actual">${Actual}</div>
		<div class="con">${Forecast}</div>
		<div class="prev">${Previous}</div>
	</div>
	{{/each}}
</script>
                <script id="newsMobileTmpl" type="text/x-jquery-tmpl">
	{{each news}}
	<div class="line">
		<p><span class="date">${Time}</span><span class="event">${Text}</span></p>
		<p class="bottom">
			<span class="country">
				<span class="currency">${Currency}</span>
				<span class="iti-flag ${CountryCode}"></span>
			</span>
			<span class="actual">${Actual}</span>
			<span class="con">${Forecast}</span>
			<span class="prev">${Previous}</span>
			<span class="statistic s${Priority}"><span></span></span>
		</p>
	</div>
	{{/each}}
</script>
              </div>
              <div class="col-md-6 col-xs-12 col-sm-12 quotes_container">
                	<h2 class="heading1 ufo_heading m_b_30 text-center"><?=lang('home_online_quotes_title')?></h2>
                <div class="table_tabs"> <a href="#" class="table_tab" data-sybols="EURUSD,GBPUSD,USDJPY,USDCHF,AUDUSD,NZDUSD,USDCAD,USDCNH, EURGBP, GBPJPY" data-digits="5"><?=lang('home_forex_title')?></a> <a href="#" class="table_tab" data-sybols="#DOW30,#S&amp;amp;P500,#NASDAQ100,#DAX30,#FTSE100,#CHF30,#JPN225,#EUSTX50" data-digits="0"><?=lang('home_indices_title')?></a> <a href="#" class="table_tab" data-sybols="GOLD,SILVER,GOLDEURO,SILVEREURO,#BRENT,#CRUDE" data-digits="2"><?=lang('home_commodities_title')?></a> <a href="#" class="table_tab" data-sybols="BA,GOOGL,MMM,CAT,IBM,MSFT,GE,PFE,DIS,APPL,AIG" data-digits="0"><?=lang('home_us_stocks_title')?></a> </div>
                <!-- / table tabs -->
                <div class="quotes_blob styled_scroll loading">
                  <table class="quotes_table online">
                  </table>
                </div>
                <!-- / quotes blob -->
                <script id="quotesTmpl" type="text/x-jquery-tmpl">
	{{each quotes}}
	<tr>
		<td>${Symbol}</td>
		<td>
			<a href="en/account/real" class="sell" >
				<?=lang('home_sell_title')?>
			</a>
		</td>
		<td class="numbers ${Class}">${Bid}</td>
		<td class="numbers ${Class}">${Ask}</td>
		<td>
			<a href="en/account/real" class="buy" >
				<?=lang('home_buy_title')?>
			</a>
		</td>
	</tr>
	{{/each}}
</script>
              </div>
            </div>
          </div>
        </div>
				</div>
				<script>
		window.app = {
			config: {
				apiBaseUrl: 'https://api.icmcapital.co.uk/'
			}
		}
	</script>
		</section>
		<section class="awards">
				<div class="container" id="awards-carousel-container">
				
						<!-- carousel -->
	                    <?php /*<div class="col-lg-6 col-md-12 col-sm-12" >
					<h2 class="heading1 ufo_heading m_b_30 text-center">Payments</h2>
							<div class="margin-top-50"> <!-- BEGIN CONTAINER -->

	                         <div class="row margin-bottom-20">
							        <div class="col-xs-3 col-md-3 col-sm-3">
							                <img src="assets/images/home/payments/BankTransfer2.jpg" class="full-width" />
							        </div>

							        <div class="col-xs-3 col-md-3 col-sm-3">
							                <img src="assets/images/home/payments/MasterCard.jpg" class="full-width" />
							        </div>

							        <div class="col-xs-3 col-md-3 col-sm-3">
							                <img src="assets/images/home/payments/Visa.jpg" class="full-width" />
							        </div>

							        <div class="col-xs-3 col-md-3 col-sm-3">
							                <img src="assets/images/home/payments/VisaElectron.png" class="full-width" />
							        </div>
	                        </div>
	                         <div class="row">
							     <div class="col-xs-3 col-md-3 col-sm-3">
							                <img src="assets/images/home/payments/Skrill.jpg" class="full-width" />
							        </div>

							 <div class="col-xs-3 col-md-3 col-sm-3">
							                <img src="assets/images/home/payments/Neteller.jpg" class="full-width" />
							        </div>

	                          <div class="col-xs-3 col-md-3 col-sm-3">
							                <img src="assets/images/home/payments/sepa.png" class="full-width" />
							        </div>

	                           <div class="col-xs-3 col-md-3 col-sm-3">
							                <img src="assets/images/home/payments/swift.png" class="full-width" />
							        </div>
	                                 </div>

							    </div> <!-- END SLIDES -->

							</div> <!-- END CAROUSEL -->
							*/ ?>
	                        <div class="col-lg-12 col-md-12 col-sm-12"  id="awards-col">
								<h2 class="heading1 ufo_heading  text-center"><?=lang('home_awards_title')?></h2>
								<?php /*<div class="carousel desktop-only"> <!-- BEGIN CONTAINER -->

									<div class="slides"> <!-- BEGIN CAROUSEL -->

										<div> <!-- SLIDE ITEM -->
											<a href="javascript:void(0)">
												<img src="assets/images/awards/<?=$lang?>/02.png"  />
											</a>
										</div>

										<div>
											<a href="javascript:void(0)">
												<img src="assets/images/awards/<?=$lang?>/03.png" />
											</a>
										</div>

										<div>
											<a href="javascript:void(0)">
												<img src="assets/images/awards/<?=$lang?>/04.png" />
											</a>
										</div>

										<div>
											<a href="javascript:void(0)">
												<img src="assets/images/awards/<?=$lang?>/05.png" />
											</a>
										</div>

										<div>
											<a href="javascript:void(0)">
												<img src="assets/images/awards/<?=$lang?>/06.png" />
											</a>
										</div>

										<div>
											<a href="javascript:void(0)">
												<img src="assets/images/awards/<?=$lang?>/07.png" />
											</a>
										</div>

									</div> <!-- END SLIDES -->

								</div> <!-- END CAROUSEL -->
								*/ ?>
								<section class="relative">
									<div class="container" style="padding:0;width:100%;">
										 <div class="carousel desktop-only" id="carousel_awards">
												<a class="carousel-item center active" href="<?=site_url('about_us/awards')?>">
																					<img src="assets/images/awards/<?=$lang?>/08.png" style="width:250px">
																				
												</a>
												<a class="carousel-item center" href="<?=site_url('about_us/awards')?>">
																					<img src="assets/images/awards/<?=$lang?>/07.png" style="width:250px">
																				
											</a>
											<a class="carousel-item center" href="<?=site_url('about_us/awards')?>">
																					<img src="assets/images/awards/<?=$lang?>/06.png" style="width:250px">
																				
											</a>
											<a class="carousel-item center" href="<?=site_url('about_us/awards')?>">
																					<img src="assets/images/awards/<?=$lang?>/05.png" style="width:250px">
																				
											</a>
											<a class="carousel-item center" href="<?=site_url('about_us/awards')?>">
																					<img src="assets/images/awards/<?=$lang?>/04.png" style="width:250px">
																				
											</a>
											<a class="carousel-item center" href="<?=site_url('about_us/awards')?>">
																					<img src="assets/images/awards/<?=$lang?>/03.png" style="width:250px">
																				
											</a>
											<a class="carousel-item center" href="<?=site_url('about_us/awards')?>">
																					<img src="assets/images/awards/<?=$lang?>/02.png" style="width:250px">
																				
											</a>
																		
											</div>
											<div class="mobile-only">
									
											<div class="col-xs-6 text-center">
												<a href="<?=site_url('about_us/awards')?>">
														<img src="assets/images/awards/<?=$lang?>/08.png" />
												</a>
											</div>
											<div class="col-xs-6 text-center">
												<a href="<?=site_url('about_us/awards')?>">
														<img src="assets/images/awards/<?=$lang?>/07.png" />
												</a>
											</div>
											<div class="col-xs-6 text-center">
												<a href="<?=site_url('about_us/awards')?>">
														<img src="assets/images/awards/<?=$lang?>/06.png" />
												</a>
											</div>
											<div class="col-xs-6 text-center">
												<a href="<?=site_url('about_us/awards')?>">
														<img src="assets/images/awards/<?=$lang?>/05.png" />
												</a>
											</div>
											<div class="col-xs-6 text-center">
												<a href="<?=site_url('about_us/awards')?>">
														<img src="assets/images/awards/<?=$lang?>/04.png" />
												</a>
											</div>
											<div class="col-xs-6 text-center">
												<a href="<?=site_url('about_us/awards')?>">
														<img src="assets/images/awards/<?=$lang?>/03.png" />
												</a>
											</div>
											<div class="col-xs-12">
												<div class="row last-child-award">
													<div class="col-xs-6 text-center">
														<a href="<?=site_url('about_us/awards')?>">
																<img src="assets/images/awards/<?=$lang?>/02.png" />
														</a>
													</div>
												</div>

											</div>
							</div>
									</div>
								</section>
								
							</div>
	                        
	                </div>
			</section>
		<section class="home_newsletter iq-over-blue-90">
				<div class="container">
						<div class="row">
								<div class="col-md-4">
												<div class="connect">
													<h3 class="m_b_30"><?=lang('home_connect_with_us_title')?></h3>
														 <ul class="footer_social">

													 <li><a href="https://www.facebook.com/ICMCapital" ><i class="fa fa-facebook-square fa-2x"></i></a></li>

														<li><a href="https://twitter.com/ICMCapital" ><i class="fa fa-twitter-square fa-2x"></i></a></li>
<li><a href="https://www.instagram.com/icmtrader/" ><i class="fa fa-instagram fa-2x"></i></a></li>
																					 <li><a href="http://www.linkedin.com/company/2407578" ><i class="fa fa-linkedin-square fa-2x"></i></a></li>
															 <li><a href="https://www.youtube.com/user/ICMCapital" ><i class="fa fa-youtube-square fa-2x"></i></a></li>
															 <li><a href="https://plus.google.com/101379153001177940885/posts" ><i class="fa fa-google fa-2x"></i></a></li>
														 </ul>
												</div>
								</div>
									<div class="col-md-8">
										<div class="home-subscribe" id="home-subscribe">
											<h3 class="m_b_30"><?=lang('home_subscribe_title')?></h3>
										<p class=""><?=lang('home_subscribe_sub_title')?></p>
					
								<form  id="newsletter_form" action="javascript:void(0);">
										<input type="hidden" name="lang_ref" id="lang_ref" value="En">
										<div class="row">
											<div class="col-md-3">
													<div class="form-group">
														<input class="form-control input-field_name" type="text" placeholder="<?=lang('home_full_name_placeholder')?>" id="name" name="name" onKeyUp="check_name('#home-subscribe')">

														<div class="input-tooltip input-tooltip_name input-tooltip_error" style="display:none" ><?=lang('home_full_name_error_msg')?></div>

													</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<input class="form-control input-field_email input-field__input_is-address" type="text" placeholder="<?=lang('home_email_placeholder')?>" id="email" name="email" onKeyUp="check_email('#home-subscribe')">
													<div class="input-tooltip input-tooltip_error input-tooltip_email" style="display:none" ><?=lang('home_email_error_msg')?></div>
												</div>
											</div>
												<div class="col-md-3">
												<div class="form-group">
													 <input class="form-control input-field_phone input-field__input_is-number" type="text" placeholder="<?=lang('home_phone_placeholder')?>" id="phone" name="phone" onKeyUp="check_phone('#home-subscribe')">
													<div class="input-tooltip input-tooltip_error input-tooltip_phone" style="display:none" ><?=lang('home_phone_error_msg')?></div>
												</div>
												</div>
												<input type="hidden" value="<?=lang('email_success_sent')?>" id="email_success_sent">
												<input type="hidden" value="<?=lang('email_already_exist')?>" id="email_already_exist">
												<input type="hidden" value="#home-subscribe" id="container_id">
												<div class="col-md-3">
														<button class="btn btn-primary" onClick="javascript:sendform(); return false;" id="subscribe_here"><?=lang('home_subscribe_button')?></button>
												</div>
											</div>
									</form>
									<div class="row">
										<div class="col-md-12">
											<div class="input-tooltip" style="display:none" id="finalresult"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
		</section>

	</div>
