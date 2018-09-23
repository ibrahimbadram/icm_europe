<section class="step4 form-horizontal LongRegisterForm wizard-card">
<a name="step4"></a>
			<div>
<div class="col-md-5 col-sm-12">
<div><div>
<div class="control-group form-ttl"><div class="controls"><div class="pull-right span4 hint" style="text-align: right">
</div>
<p class="h4">Trading Account Settings</p>
</div></div>
</div>
<div>
<div class="control-group" id="block_mt4_server">
<label class="control-label tal" for="input_mt4_server">Account Type</label>
<div class="controls">
<select name="mt4_server" id="input_mt4_server" icmtrader:check1="string" onchange="
						jq('#platform_text').css('color', jq(this).val().length ? '#ed1c24' : '#636363');
					" class=" input-block-level">






<option value="mt4m">MT4</option><option value="icmtrader">MT4 Instant</option><option value="fixed">MT4 Fixed Spread</option><option value="mt5">MT5</option><option value="xtrader">cTrader</option></select>
</div>
</div>
<div class="control-group" id="block_mt4_server_info">
<label class="control-label tal" for="input_mt4_server_info"></label>
<div class="controls">
<span class="green-info">You can always open additional trading accounts after you complete registration.</span>
</div>
</div>
<div class="control-group" id="block_leverage">
<label class="control-label tal" for="input_leverage">Leverage</label>
<div class="controls">
<select name="leverage" id="input_leverage" icmtrader:check1="string" class=" input-block-level"><option value="1:100">1:100</option><option value="1:75">1:75</option><option value="1:66">1:66</option><option value="1:50" selected="selected">1:50 (Default)</option><option value="1:33">1:33</option><option value="1:25">1:25</option><option value="1:20">1:20</option><option value="1:15">1:15</option><option value="1:10">1:10</option><option value="1:5">1:5</option><option value="1:3">1:3</option><option value="1:2">1:2</option><option value="1:1">1:1</option></select>
</div>
</div>
<div class="control-group" id="block_score_msg_2">
<label class="control-label tal" for="score_msg_2"></label>
<div class="controls">
<span class="green-info" id="leverage_limitation_description">You may select the leverage of your preference. However, the maximum leverage available is dependent on your risk tolerance as determined by the answer you provided in the previous step. We encourage you not to deposit more than you can afford to lose. For any questions please contact us after the completion of the form</span>
</div>
</div>
<div class="control-group" id="block_currency">
<label class="control-label tal" for="input_currency">Choose Currency Base</label>
<div class="controls">
<select name="currency" id="input_currency" icmtrader:check1="string" onchange="jq('#input_wallet').val(jq('#input_currency').val());" class=" input-block-level"><option value="USD">USD</option><option value="EUR">EUR</option><option value="GBP" selected="selected">GBP</option><option value="CHF">CHF</option><option value="JPY">JPY</option><option value="PLN">PLN</option><option value="AUD">AUD</option></select>
</div>
</div>
<div class="control-group" id="block_wallet">
<label class="control-label tal" for="input_wallet">ICM Trader Vault Currency</label>
<div class="controls">
<select name="wallet" id="input_wallet" icmtrader:check1="string" onchange="jq('#vault_text').css('color', jq(this).val().length ? '#ed1c24' : '#636363');" class=" input-block-level">
<option value="">Choose...</option>
<option value="EUR">EUR</option>
<option value="USD">USD</option>
<option value="GBP" selected="selected">GBP</option>
<option value="CHF">CHF</option>
<option value="JPY">JPY</option>
<option value="PLN">PLN</option>
<option value="AUD">AUD</option>
</select>
</div>
</div>
</div><div><div class="delimeter"></div></div><div><div class="delimeter"></div></div></div><div id="uploadFirstContainer"><div>
<div class="control-group form-ttl"><div class="controls"><div class="pull-right span4 hint" style="text-align: right">
</div>
<p class="h4">
	                	</p><div class="upload-text"><p class="upload-icon">To ensure that you trade securely, we kindly ask that you verify your profile before you begin trading. To do this, please proceed with uploading your documents.</p></div><p></p>
</div></div>
</div>
<div>
<div class="control-group error empty_error" id="block_wishToUpload">
<label class="control-label tal" for="input_wishToUpload">Verify your profile now</label>
<div class="controls">

				<div class="btn-group" data-toggle="buttons-radio">
					<input type="hidden" name="wishToUpload" value="" id="input_wishToUpload" icmtrader:check1="string" icmtrader:check1_msg="Please select" class="err">
					<button type="button" class="btn btn-primary radio yes err" value="yes">Yes</button>
                    <button type="button" class="btn btn-primary radio no err" value="no">No</button>
				<div class="alert alert-white ontop" style="margin: 0px; padding: 5px 0px 0px; line-height: 12px; float: left; width: 220px;"><div>Please select</div></div></div></div>
</div>
</div><div><div class="delimeter"></div></div><div><div class="delimeter"></div></div></div><div class="hide" id="uploadContainer"><div>
<div class="control-group form-ttl"><div class="controls"><div class="pull-right span4 hint" style="text-align: right">
</div>
<p class="h4">
	                	</p><div class="upload-text">
	                	<p class="mail-text">You can also send an e-mail to <a href="mailto:backoffice@icmtrader.co.uk">backoffice@icmtrader.co.uk</a> by taking a picture from your mobile camera.</p>
	                	<p>Max upload size. 10MB (per file).</p></div><p></p>
</div></div>
</div>
<div>
<div class="control-group" id="block_identification_file">
<label class="control-label tal" for="input_identification_file"></label>
<div class="controls">
<div id="identification_file_id_info" class="upload-alert alert hide"></div>
<div id="identification_file_id" class="upload-file-holder"><div class="front-file"><i></i></div><div class="upload-button-content">
													ID Card or Passport
												</div><div><span class="browse">Browse</span></div></div>
</div>
</div>
<div class="control-group" id="block_identificationback_file">
<label class="control-label tal" for="input_identificationback_file"></label>
<div class="controls">
<div id="identificationback_file_id_info" class="upload-alert alert hide"></div>
<div id="identificationback_file_id" class="upload-file-holder"><div class="back-file"><i></i></div><div class="upload-button-content">
												ID Card Back
												<span class="gray">(optional if passport)</span>
											</div><div><span class="browse">Browse</span></div></div>
</div>
</div>
<div class="control-group" id="block_proof">
<label class="control-label tal" for="input_proof"></label>
<div class="controls">
<div id="proof_file_id_info" class="upload-alert alert hide"></div>
<div id="proof_file_id" class="upload-file-holder"><div class="proof-file"><i></i></div><div class="upload-button-content">
												Proof of Residence
												<span class="small">(e.g. utility bill, or bank/card statement)</span>
											</div><div><span class="browse">Browse</span></div></div>
</div>
</div>
</div><div><div class="delimeter"></div></div><div><div class="delimeter"></div></div></div><div id="emailSubscript"><div>
<div class="control-group form-ttl"><div class="controls"><div class="pull-right span4 hint" style="text-align: right">
</div>
<p class="h4">E-mail Subscriptions
						<span>(optional)</span></p>
</div></div>
</div>
<div>
<div class="control-group" id="block_newsletter">
<div class="controls">
<input type="checkbox" value="1" id="input_newsletter" name="newsletter" checked="checked"> 
<label for="input_newsletter">I want to receive company news and products updates.</label>
</div></div>
<div class="control-group" id="block_eu_t_report">
<div class="controls">
<input type="checkbox" value="1" id="input_eu_t_report" name="eu_t_report"> 
<label for="input_eu_t_report">I want to receive Daily Technical Analysis.</label>
</div></div>
<div class="control-group" id="block_pref_lang">
<label class="control-label tal" for="input_pref_lang">Preferred Communication Language</label>
<div class="controls">
<select name="pref_lang" id="input_pref_lang" icmtrader:check1="string" class=" input-block-level">
<option value="en" selected="selected">English</option>
<option value="fr">Français</option>
<option value="de">Deutsch</option>
<option value="it">Italiano</option>
<option value="hu">Magyar</option>
<option value="ru">Русский</option>
<option value="pt">Português</option>
<option value="pl">Polski</option>
<option value="es">Español</option>
<option value="cn">中文简体</option>
<option value="ko">한국어</option>
<option value="vn">Vietnamese</option>
<option value="th">Thai</option>
<option value="ja">日本語</option>
<option value="ar">العربية</option>
<option value="id">Bahasa Indonesian</option>
<option value="cz">Český</option>
</select>
</div>
</div>
</div><div><div class="delimeter"></div></div><div><div class="delimeter"></div></div></div><div id="emailConfirmation"><div>
<div class="control-group form-ttl"><div class="controls"><div class="pull-right span4 hint" style="text-align: right">
</div>
<p class="h4">Confirmation</p>
</div></div>
</div>
<div>
<div class="control-group" id="block_agree_belgium" style="display: none;">
<label class="control-label tal" for="input_agree_belgium"></label>
<div class="controls">

							<div class="control-group">
							<input  id="agree_belgium" name="agree_belgium" type="checkbox">
							<label for="agree_belgium" class="checkbox field_note">I hereby confirm that I am not a consumer within the meaning of the Belgian Code of Economic Law.</label></div>
</div>
</div>
<div class="control-group" id="block_score_agree" style="display: none;">
<label class="control-label tal" for="input_score_agree"></label>
<div class="controls">

					<div class="control-group score1" style="display: none">
        			    <div style="padding-left: 30px; margin-bottom: 10px">Based on your responses and our assessment in relation to your experience with trading leveraged products, we believe that such products are not appropriate for you. We believe that you will benefit from learning more about trading CFDs and the risks involved. Therefore, we recommend that you visit our educational resources and webinars at the <a href="https://www.icmtrader.co.uk/help-section" target="_blank">ICM Trader Help Centre</a>, open a Demo Account and read our Risk Disclosure.</div> 
    				</div>
					<div class="control-group score2" style="display: none">
					    <div style="padding-left: 30px; margin-bottom: 10px">Based on your responses and our assessment in relation to your experience with trading leveraged products, we believe that such products may not be appropriate for you. We believe that you may benefit from learning more about trading CFDs and the risks involved. Therefore, we recommend that you visit our educational resources and webinars at the <a href="http://www.icmtrader.co.uk/help-section" target="_blank">ICM Trader Help Centre</a>, open a Demo Account and read our Risk Disclosure.</div> 
					</div>
				    <input  id="input_score_agree" name="score_agree" type="checkbox">
				    <label for="input_score_agree" class="checkbox field_note">I am aware that I may not have the appropriate experience and knowledge.</label>
				
</div>
</div>
<div class="control-group error" id="block_agree">
<label class="control-label tal" for="input_agree"></label>
<div class="controls">

					<div class="control-group error">
					<input id="agree" name="agree" type="checkbox" class="err">
					<label for="agree" class="checkbox field_note err">
					I declare that I have read, understood and accept the&nbsp;
					<a href="#" target="_blank">Client Agreement</a>,
					<a href="#" target="_blank">Order Execution Policy</a> and <a href="#" target="_blank">Conflicts of Interest Policy</a>.<br><br>I verify that the objective of this account is speculative trading and that I can afford to risk all of my invested amount based on my personal financial circumstances.</label></div>
</div>
</div><div class="control-group" style="display: none" id="block_agree_fixed"><input  id="agree_fixed_spreads" name="agree_fixed" type="checkbox"><label for="agree_fixed_spreads" class="checkbox field_note">I declare that I have read, understood and accept the&nbsp;<a href="/dwn/Terms_and_Conditions_Fixed_Spread_Account.pdf" target="_blank" class="err">Fixed Spread Agreement</a>&nbsp;with which I fully understand, accept and agree.&nbsp;</label></div><div class="control-group" style="display: none" id="block_agree_super"><input  id="agree_super" name="agree_super" type="checkbox" class=""><label for="agree_super" class="checkbox field_note">I declare that I have read, understood and accept the&nbsp;<a href="/dwn/ICM Trader_SuperTrader_Terms_and_Conditions.pdf" target="_blank" class="err">ICM Trader SuperTrader Terms and Conditions</a>,&nbsp;<a href="/dwn/ICM Trader_SuperTrader_Terms_and_Conditions_Investor.pdf" target="_blank" class="err">ICM Trader SuperTrader Terms and Conditions (Investor)</a>,&nbsp;<a href="/dwn/ICM Trader_SuperTrader_Letter_of_Direction.pdf" target="_blank" class="err">ICM Trader SuperTrader Letter of Directions</a>&nbsp;with which I fully understand, accept and agree.&nbsp;</label></div>
</div><div><div class="delimeter"></div></div><div><div class="delimeter"></div></div></div></div>
<div class="desktop-only col-md-6 col-md-offset-1 col-md-12 notes">
<p class="h4 notes-sub-title">Almost there!</p>
<p class="h5 big-text">You're one step away from joining 100,000s of other traders who trust ICM Trader!</p>
<p>Once you successfully register with us, you’ll be able to open additional trading accounts and download any of our platforms.</p>
<ul>
	<li>Invest in 6 asset classes</li>
	<li>Access exclusive trading tools</li>
	<li>Trade on the go with our free mobile apps and platforms</li>
</ul>
</div>
</div>
		</div>
</div>