<section class="step2 form-horizontal LongRegisterForm wizard-card">
		
		<a name="step2"></a>
		<div >
<div class="col-md-5 col-sm-12">
<div><div >
<div class="control-group form-ttl"><div class="controls"><p class="h4">Residential Address</p>
</div></div>
</div>
<div >
<div class="control-group error empty_error" id="block_address">
<input type="text" value="" placeholder="Street &amp; Number" name="address" id="address" icmtrader:check1="/^[\w\s,\.\-\:\#\;\/]+$/i" icmtrader:check1_msg="Please, use latin characters and symbols like - : # ; , / . only." class="input-block-level err" style="">
</div>
<div class="control-group error empty_error" id="block_postcode">
<input type="text" value="" placeholder="Postal/Zip Code" name="postcode" id="uru_postcode_2move" icmtrader:check1="/^[a-z0-9]+([\s\-]?)[a-z0-9]+$/i" class="input-block-level err" style="">
</div>
<div class="control-group error empty_error" id="block_town">
<input type="text" value="" placeholder="City" name="town" id="input_town" icmtrader:check1="/^[\w\s,\.\-\:\#\;\/]+$/i" icmtrader:check1_msg="Please, use latin characters and symbols like - : # ; , / . only." class="input-block-level err" style="">
</div>
<div class="control-group" id="block_uru_street_name" style="display: none;">
<input type="text" value="" placeholder="Street Name" name="uru_street_name" id="uru_street_name" icmtrader:check1="string" class=" input-block-level" style="">
</div>
<div class="control-group" id="block_state" style="display: none;">
<input type="text" value="" placeholder="State/Province" name="state" id="input_state" icmtrader:check1="string" class=" input-block-level" style="">
</div>
<div class="control-group" id="block_uru_year_moved" style="display: none;">
<input type="text" value="" placeholder="Year Moved To Current Address (optional)" name="uru_year_moved" id="uru_year_moved" class=" input-block-level" style="">
</div>
<div class="control-group" id="block_uru_middle_initial" style="display: none;">
<input type="text" value="" placeholder="Middle Initial (optional)" name="uru_middle_initial" id="input_uru_middle_initial" class=" input-block-level" style="">
</div>
<div class="control-group" id="block_uru_mothers_maiden_name" style="display: none;">
<input type="text" value="" placeholder="Mother's maiden name (optional)" name="uru_mothers_maiden_name" id="input_uru_mothers_maiden_name" class=" input-block-level" style="">
</div>
<div class="control-group" id="block_uru_code_fiscale" style="display: none;">
<input type="text" value="" placeholder="Codice Fiscale (optional)" name="uru_code_fiscale" id="input_uru_code_fiscale" icmtrader:check1="string" class=" input-block-level" style="">
</div>
<div class="control-group" id="block_medical_insurance_no" style="display: none;">
<input type="text" value="" placeholder="Medical Number (optional)" name="medical_insurance_no" id="input_medical_insurance_no" icmtrader:check1="string" class=" input-block-level" style="">
</div>
<div class="control-group" id="block_passport_number" style="display: none;">
<input type="text" value="" placeholder="Passport Number (optional)" name="passport_number" id="input_passport_number" icmtrader:check1="string" class=" input-block-level" style="">
</div>
<div class="control-group" id="block_uru_passport" style="display: none;">
<input type="text" value="" placeholder="Id Number (optional)" name="uru_passport" id="input_uru_passport" icmtrader:check1="string" class=" input-block-level" style="">
</div>
<div class="control-group" id="block_uru_gender" style="display: none;">
<label class="control-label tal" for="input_uru_gender">Gender<br><i>(optional)</i></label>
<div class="controls">
<select name="uru_gender" id="input_uru_gender" class=" input-block-level">
<option value="">Choose...</option>
<option value="m">Male</option>
<option value="f">Female</option>
</select>
</div>
</div>
</div><div ><div class="delimeter"></div></div></div><div><div >
<div class="control-group form-ttl"><div class="controls"><p class="h4">Personal Details</p>
</div></div>
</div>
<div >
<div class="control-group error empty_error" id="block_uru_dob">
<label class="control-label tal" for="input_uru_dob">Date of Birth</label>
<div class="controls">
<input type="hidden" name="uru_dob" id="input_uru_dob" icmtrader:check1="date<30-06-2000" icmtrader:check2="date>29-06-1918" value="" class="err">

<select name="uru_dob_Day" class="input-block-level span3 err" onchange="jq('#input_uru_dob').val(
					jq('select[name=\'uru_dob_Day\']').val() + '-' +
					jq('select[name=\'uru_dob_Month\']').val() + '-' +
					jq('select[name=\'uru_dob_Year\']').val()
				);">
<option value="">Day...</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="uru_dob_Month" class="input-block-level span3 err" onchange="jq('#input_uru_dob').val(
					jq('select[name=\'uru_dob_Day\']').val() + '-' +
					jq('select[name=\'uru_dob_Month\']').val() + '-' +
					jq('select[name=\'uru_dob_Year\']').val()
				);">
<option value="">Month...</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
<select name="uru_dob_Year" class="input-block-level span3 err" onchange="jq('#input_uru_dob').val(
					jq('select[name=\'uru_dob_Day\']').val() + '-' +
					jq('select[name=\'uru_dob_Month\']').val() + '-' +
					jq('select[name=\'uru_dob_Year\']').val()
				);">
<option value="">Year...</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
</select>
</div>
</div>
<div class="control-group error" id="block_telephone">
<label class="control-label tal" for="input_telephone">Phone</label>
<div class="controls">
<input type="text" value="961" placeholder="Phone" name="telephone" id="input_telephone" icmtrader:check1="/^\+?\d[\d\-]{6,}$/" icmtrader:check1_msg="Number should consist of digits only" class="input-phone-default input-block-level err" style="">
</div>
</div>
<div class="control-group" id="block_qq_messenger" style="display: none;">
<label class="control-label tal" for="input_qq_messenger">QQ<br><i>(optional)</i></label>
<div class="controls">
<input type="text" value="" placeholder="QQ (optional)" name="qq_messenger" id="input_qq_messenger" class=" input-block-level" style="">
</div>
</div>
<div class="control-group" id="block_nationality">
<label class="control-label tal" for="input_nationality">Nationality</label>
<div class="controls">
<select name="nationality" id="input_nationality" icmtrader:check1="string" class=" input-block-level">
<option value="AF">Afghanistan</option>
<option value="AX">Aland Islands</option>
<option value="AL">Albania</option>
<option value="DZ">Algeria</option>
<option value="AS">American Samoa</option>
<option value="AD">Andorra</option>
<option value="AO">Angola</option>
<option value="AI">Anguilla</option>
<option value="AQ">Antarctica</option>
<option value="AG">Antigua And Barbuda</option>
<option value="AR">Argentina</option>
<option value="AM">Armenia</option>
<option value="AW">Aruba</option>
<option value="AU">Australia</option>
<option value="AT">Austria</option>
<option value="AZ">Azerbaijan</option>
<option value="BS">Bahamas</option>
<option value="BH">Bahrain</option>
<option value="BD">Bangladesh</option>
<option value="BB">Barbados</option>
<option value="BY">Belarus</option>
<option value="BE">Belgium</option>
<option value="BZ">Belize</option>
<option value="BJ">Benin</option>
<option value="BM">Bermuda</option>
<option value="BT">Bhutan</option>
<option value="BO">Bolivia</option>
<option value="BA">Bosnia And Herzegovina</option>
<option value="BW">Botswana</option>
<option value="BV">Bouvet Island</option>
<option value="BR">Brazil</option>
<option value="IO">British Indian Ocean Territory</option>
<option value="BN">Brunei Darussalam</option>
<option value="BG">Bulgaria</option>
<option value="BF">Burkina Faso</option>
<option value="BI">Burundi</option>
<option value="KH">Cambodia</option>
<option value="CM">Cameroon</option>
<option value="CA">Canada</option>
<option value="CV">Cape Verde</option>
<option value="KY">Cayman Islands</option>
<option value="CF">Central African Republic</option>
<option value="TD">Chad</option>
<option value="CL">Chile</option>
<option value="CN">China</option>
<option value="CX">Christmas Island</option>
<option value="CC">Cocos (Keeling) Islands</option>
<option value="CO">Colombia</option>
<option value="KM">Comoros</option>
<option value="CG">Congo</option>
<option value="CD">Congo, The Democratic Republic Of The</option>
<option value="CK">Cook Islands</option>
<option value="CR">Costa Rica</option>
<option value="CI">Cote D'Ivoire</option>
<option value="HR">Croatia</option>
<option value="CU">Cuba</option>
<option value="CY">Cyprus</option>
<option value="CZ">Czech Republic</option>
<option value="DK" >Denmark</option>
<option value="DJ">Djibouti</option>
<option value="DM">Dominica</option>
<option value="DO">Dominican Republic</option>
<option value="EC">Ecuador</option>
<option value="EG">Egypt</option>
<option value="SV">El Salvador</option>
<option value="GQ">Equatorial Guinea</option>
<option value="ER">Eritrea</option>
<option value="EE">Estonia</option>
<option value="ET">Ethiopia</option>
<option value="FK">Falkland Islands (Malvinas)</option>
<option value="FO">Faroe Islands</option>
<option value="FJ">Fiji</option>
<option value="FI">Finland</option>
<option value="FR">France</option>
<option value="GF">French Guiana</option>
<option value="PF">French Polynesia</option>
<option value="TF">French Southern Territories</option>
<option value="GA">Gabon</option>
<option value="GM">Gambia</option>
<option value="GE">Georgia</option>
<option value="DE">Germany</option>
<option value="GH">Ghana</option>
<option value="GI">Gibraltar</option>
<option value="GR">Greece</option>
<option value="GL">Greenland</option>
<option value="GD">Grenada</option>
<option value="GP">Guadeloupe</option>
<option value="GU">Guam</option>
<option value="GT">Guatemala</option>
<option value="GG">Guernsey</option>
<option value="GN">Guinea</option>
<option value="GW">Guinea-Bissau</option>
<option value="GY">Guyana</option>
<option value="HT">Haiti</option>
<option value="HM">Heard Island And Mcdonald Islands</option>
<option value="HN">Honduras</option>
<option value="HK">Hong Kong</option>
<option value="HU">Hungary</option>
<option value="IS">Iceland</option>
<option value="IN">India</option>
<option value="ID">Indonesia</option>
<option value="IR">Iran, Islamic Republic Of</option>
<option value="IQ">Iraq</option>
<option value="IE">Ireland</option>
<option value="IM">Isle Of Man</option>
<option value="IL">Israel</option>
<option value="IT">Italy</option>
<option value="JM">Jamaica</option>
<option value="JP">Japan</option>
<option value="JE">Jersey</option>
<option value="JO">Jordan</option>
<option value="KZ">Kazakhstan</option>
<option value="KE">Kenya</option>
<option value="KI">Kiribati</option>
<option value="KP">Korea, Democratic People's Republic Of</option>
<option value="KR">Korea, Republic Of</option>
<option value="KW">Kuwait</option>
<option value="KG">Kyrgyzstan</option>
<option value="LA">Lao People's Democratic Republic</option>
<option value="LV">Latvia</option>
<option value="LB" selected="selected">Lebanon</option>
<option value="LS">Lesotho</option>
<option value="LR">Liberia</option>
<option value="LY">Libyan Arab Jamahiriya</option>
<option value="LI">Liechtenstein</option>
<option value="LT">Lithuania</option>
<option value="LU">Luxembourg</option>
<option value="MO">Macao</option>
<option value="MK">Macedonia, The Former Yugoslav Republic Of</option>
<option value="MG">Madagascar</option>
<option value="MW">Malawi</option>
<option value="MY">Malaysia</option>
<option value="MV">Maldives</option>
<option value="ML">Mali</option>
<option value="MT">Malta</option>
<option value="MH">Marshall Islands</option>
<option value="MQ">Martinique</option>
<option value="MR">Mauritania</option>
<option value="MU">Mauritius</option>
<option value="YT">Mayotte</option>
<option value="MX">Mexico</option>
<option value="FM">Micronesia, Federated States Of</option>
<option value="MD">Moldova</option>
<option value="MC">Monaco</option>
<option value="MN">Mongolia</option>
<option value="ME">Montenegro</option>
<option value="MS">Montserrat</option>
<option value="MA">Morocco</option>
<option value="MZ">Mozambique</option>
<option value="MM">Myanmar</option>
<option value="NA">Namibia</option>
<option value="NR">Nauru</option>
<option value="NP">Nepal</option>
<option value="NL">Netherlands</option>
<option value="NC">New Caledonia</option>
<option value="NZ">New Zealand</option>
<option value="NI">Nicaragua</option>
<option value="NE">Niger</option>
<option value="NG">Nigeria</option>
<option value="NU">Niue</option>
<option value="NF">Norfolk Island</option>
<option value="MP">Northern Mariana Islands</option>
<option value="NO">Norway</option>
<option value="OM">Oman</option>
<option value="PK">Pakistan</option>
<option value="PW">Palau</option>
<option value="PS">Palestinian Territory, Occupied</option>
<option value="PA">Panama</option>
<option value="PG">Papua New Guinea</option>
<option value="PY">Paraguay</option>
<option value="PE">Peru</option>
<option value="PH">Philippines</option>
<option value="PN">Pitcairn</option>
<option value="PL">Poland</option>
<option value="PT">Portugal</option>
<option value="PR">Puerto Rico</option>
<option value="QA">Qatar</option>
<option value="RE">Reunion</option>
<option value="RO">Romania</option>
<option value="RU">Russian Federation</option>
<option value="RW">Rwanda</option>
<option value="BL">Saint Barthelemy</option>
<option value="SH">Saint Helena</option>
<option value="KN">Saint Kitts And Nevis</option>
<option value="LC">Saint Lucia</option>
<option value="MF">Saint Martin</option>
<option value="PM">Saint Pierre And Miquelon</option>
<option value="VC">Saint Vincent And The Grenadines</option>
<option value="WS">Samoa</option>
<option value="SM">San Marino</option>
<option value="ST">Sao Tome And Principe</option>
<option value="SA">Saudi Arabia</option>
<option value="SN">Senegal</option>
<option value="RS">Serbia</option>
<option value="SC">Seychelles</option>
<option value="SL">Sierra Leone</option>
<option value="SG">Singapore</option>
<option value="SK">Slovakia</option>
<option value="SI">Slovenia</option>
<option value="SB">Solomon Islands</option>
<option value="SO">Somalia</option>
<option value="ZA">South Africa</option>
<option value="GS">South Georgia And The South Sandwich Islands</option>
<option value="SS">South Sudan</option>
<option value="ES">Spain</option>
<option value="LK">Sri Lanka</option>
<option value="SD">Sudan</option>
<option value="SR">Suriname</option>
<option value="SJ">Svalbard And Jan Mayen</option>
<option value="SZ">Swaziland</option>
<option value="SE">Sweden</option>
<option value="CH">Switzerland</option>
<option value="SY">Syrian Arab Republic</option>
<option value="TW">Taiwan, Province Of China</option>
<option value="TJ">Tajikistan</option>
<option value="TZ">Tanzania, United Republic Of</option>
<option value="TH">Thailand</option>
<option value="TL">Timor-Leste</option>
<option value="TG">Togo</option>
<option value="TK">Tokelau</option>
<option value="TO">Tonga</option>
<option value="TT">Trinidad And Tobago</option>
<option value="TN">Tunisia</option>
<option value="TR">Turkey</option>
<option value="TM">Turkmenistan</option>
<option value="TC">Turks And Caicos Islands</option>
<option value="TV">Tuvalu</option>
<option value="UG">Uganda</option>
<option value="UA">Ukraine</option>
<option value="AE">United Arab Emirates</option>
<option value="GB">United Kingdom</option>
<option value="US">United States</option>
<option value="UM">United States Minor Outlying Islands</option>
<option value="UY">Uruguay</option>
<option value="UZ">Uzbekistan</option>
<option value="VU">Vanuatu</option>
<option value="VA">Vatican City State</option>
<option value="VE">Venezuela</option>
<option value="VN">Viet Nam</option>
<option value="VG">Virgin Islands, British</option>
<option value="VI">Virgin Islands, U.S.</option>
<option value="WF">Wallis And Futuna</option>
<option value="EH">Western Sahara</option>
<option value="YE">Yemen</option>
<option value="ZM">Zambia</option>
<option value="ZW">Zimbabwe</option>
<option value="ZZ">Other...</option>
</select>
<div >The country of a person's citizenship or country in which the person is deemed a national</div>
</div>
</div>
</div><div ><div class="delimeter"></div></div></div></div>
<div class="desktop-only col-md-6 col-md-offset-1 col-md-12 notes">
<p class="h4 notes-sub-title">Fully Transparent &amp; Trusted</p>
<ul class="green-list-right">
	<li>We ask for our clients’ details because we are regulated broker and are required to abide by the highest regulatory standards.</li>
</ul>
<p class="h5">Did you know?</p>
<div class="regul-block know-block">
	ICM Trader keeps client funds in segregated accounts in major international banks.</div>
<div class="samll-info uk-margin-small-top">Once you successfully register with us, you’ll be able to open additional trading accounts and download any of our platforms.</div>
</div>
</div>
	</section>