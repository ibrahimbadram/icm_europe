<section class="step2 form-horizontal LongRegisterForm wizard-card"> <a name="step2"></a>
  <div >
    <div class="col-md-5 col-sm-12">
      <div class="span5">
        <div>
          <div class="row-fluid">
            <div class="control-group form-ttl">
              <div class="controls"></div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="delimeter"></div>
          </div>
        </div>
        <div>
          <div class="row-fluid">
            <div class="control-group form-ttl">
              <div class="controls">
                <p class="h4">Employment Information</p>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="control-group error empty_error" id="block_employment">
              <label class="control-label tal" for="input_employment">Employment status</label>
              <div class="controls">
                <select name="employment" id="input_employment" ICM Trader:check1="string" class="input-block-level err">
                  <option value="">Choose...</option>
                  <option value="employed">Employed</option>
                  <option value="selfemployed">Business Owner / Self-employed</option>
                  <option value="retired">Retired</option>
                  <option value="student">Student</option>
                  <option value="unemployed">Unemployed</option>
                </select>
              </div>
            </div>
            <div class="control-group error empty_error" id="block_employment2">
              <label class="control-label tal" for="input_employment2">Industry</label>
              <div class="controls">
                <select name="employment2" id="input_employment2" ICM Trader:check1="string" class="input-block-level err">
                  <option value="">Choose...</option>
                  <option value="Financial Services">Financial Services</option>
                  <option value="Agriculture, Food and Natural Resources">Agriculture, Food and Natural Resources</option>
                  <option value="Architecture and Construction">Architecture and Construction</option>
                  <option value="Arts, Audio/Video Technology &amp; Communications">Arts, Audio/Video Technology &amp; Communications</option>
                  <option value="Business Management &amp; Administration">Business Management &amp; Administration</option>
                  <option value="Education &amp; Training">Education &amp; Training</option>
                  <option value="Government &amp; Public Administration">Government &amp; Public Administration</option>
                  <option value="Healthcare">Healthcare</option>
                  <option value="Hospitality &amp; Tourism">Hospitality &amp; Tourism</option>
                  <option value="Information Technology">Information Technology</option>
                  <option value="Legal, Public Safety, Corrections &amp; Security">Legal, Public Safety, Corrections &amp; Security</option>
                  <option value="Manufacturing">Manufacturing</option>
                  <option value="Marketing &amp; Sales">Marketing &amp; Sales</option>
                  <option value="Science, Technology, Engineering &amp; Mathematics">Science, Technology, Engineering &amp; Mathematics</option>
                  <option value="Transportation, Distribution &amp; Logistics">Transportation, Distribution &amp; Logistics</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <div class="control-group" id="block_employment3" style="display: none;">
              <label class="control-label tal" for="input_employment3">If other, please specify</label>
              <div class="controls">
                <input type="text" value="" placeholder="If other, please specify" name="employment3" id="input_employment3" ICM Trader:check1="if(employment2|value=Other)string" class=" input-block-level" style="">
              </div>
            </div>
            <div class="control-group error empty_error" id="block_education_level">
              <label class="control-label tal" for="input_education_level">What is your level of education?</label>
              <div class="controls">
                <select name="education_level" id="input_education_level" ICM Trader:check1="string" class="input-block-level err">
                  <option value="">Choose...</option>
                  <option value="High School">High School</option>
                  <option value="Bachelor Degree or equivalent">Bachelor Degree or equivalent</option>
                  <option value="Master Degree or equivalent">Master Degree or equivalent</option>
                  <option value="PhD or equivalent">PhD or equivalent</option>
                  <option value="None">None</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="delimeter"></div>
          </div>
        </div>
        <div>
          <div class="row-fluid">
            <div class="control-group form-ttl">
              <div class="controls">
                <p class="h4">Financial Information</p>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="control-group error empty_error" id="block_annual">
              <label class="control-label tal" for="input_annual">What is your Annual Income (USD)?</label>
              <div class="controls">
                <select name="annual" id="input_annual" ICM Trader:check1="string|utf8" class="input-block-level err">
                  <option value="">Choose...</option>
                  <option value="less than 50k">0 - 50,000</option>
                  <option value="50k to 100k">50,000 - 100,000</option>
                  <option value="100k to 250k">100,000 - 250,000</option>
                  <option value="250k to 500k">250,000 - 500,000</option>
                  <option value="500k to 1M">500,000 - 1,000,000</option>
                  <option value="more than 1M">&gt; 1,000,000</option>
                </select>
              </div>
            </div>
            <div class="control-group error empty_error" id="block_assets">
              <label class="control-label tal" for="input_assets">What is your estimated Net Worth (USD)?</label>
              <div class="controls">
                <select name="assets" id="input_assets" ICM Trader:check1="string|utf8" class="input-block-level err">
                  <option value="">Choose...</option>
                  <option value="less than 50k">0 - 50,000</option>
                  <option value="50k to 100k">50,000 - 100,000</option>
                  <option value="100k to 250k">100,000 - 250,000</option>
                  <option value="250k to 500k">250,000 - 500,000</option>
                  <option value="500k to 1M">500,000 - 1,000,000</option>
                  <option value="more than 1M">&gt; 1,000,000</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="delimeter"></div>
          </div>
        </div>
        <div>
          <div class="row-fluid">
            <div class="control-group form-ttl">
              <div class="controls">
                <p class="h4">Source of wealth</p>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="control-group error" id="block_income_source_1">
              <div class="controls">
                <input type="checkbox" value="1" id="input_income_source_1" name="income_source_1" ICM Trader:check1="checked" class="err">
                <label for="input_income_source_1" class="err">Employment / Business Proceeds</label>
              </div>
            </div>
            <div class="control-group error" id="block_income_source_2">
              <div class="controls">
                <input type="checkbox" value="1" id="input_income_source_2" name="income_source_2" ICM Trader:check1="checked" class="err">
                <label for="input_income_source_2" class="err">Savings / Investments</label>
              </div>
            </div>
            <div class="control-group error" id="block_income_source_3">
              <div class="controls">
                <input type="checkbox" value="1" id="input_income_source_3" name="income_source_3" ICM Trader:check1="checked" class="err">
                <label for="input_income_source_3" class="err">Gifts / Inheritance</label>
              </div>
            </div>
            <div class="control-group error" id="block_income_source_4">
              <div class="controls">
                <input type="checkbox" value="1" id="input_income_source_4" name="income_source_4" ICM Trader:check1="checked" class="err">
                <label for="input_income_source_4" class="err">Other</label>
              </div>
            </div>
            <div class="control-group error empty_error" id="block_anticipated_deposit">
              <label class="control-label tal" for="input_anticipated_deposit">How much do you expect to deposit in the next 12 months (USD)</label>
              <div class="controls">
                <select name="anticipated_deposit" id="input_anticipated_deposit" ICM Trader:check1="string|utf8" class="input-block-level err">
                  <option value="">Choose...</option>
                  <option value="0-10,000">0-10,000</option>
                  <option value="10,000-50,000">10,000-50,000</option>
                  <option value="50,000-100,000">50,000-100,000</option>
                  <option value="100,000-300,000">100,000-300,000</option>
                  <option value="300,000-1,000,000">300,000-1,000,000</option>
                  <option value="greater than 1,000,000">&gt;1,000,000</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="delimeter"></div>
          </div>
        </div>
        <div>
          <div class="row-fluid">
            <div class="control-group form-ttl">
              <div class="controls"></div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="control-group" id="block_reason_html">
              <label class="control-label tal" for="input_reason_html">What is the reason you want to open an account with ICM Trader?</label>
              <div class="controls"> </div>
            </div>
            <div class="control-group error" id="block_reason_cfds">
              <div class="controls">
                <input type="checkbox" value="1" id="input_reason_cfds" name="reason_cfds" ICM Trader:check1="checked" class="err">
                <label for="input_reason_cfds" class="err">To trade CFDs</label>
              </div>
            </div>
            <div class="control-group error" id="block_reason_forex">
              <div class="controls">
                <input type="checkbox" value="1" id="input_reason_forex" name="reason_forex" ICM Trader:check1="checked" class="err">
                <label for="input_reason_forex" class="err">To trade CFDs on Forex</label>
              </div>
            </div>
            <div class="control-group error" id="block_reason_shares">
              <div class="controls">
                <input type="checkbox" value="1" id="input_reason_shares" name="reason_shares" ICM Trader:check1="checked" class="err">
                <label for="input_reason_shares" class="err">To trade CFDs on Shares</label>
              </div>
            </div>
            <div class="control-group error" id="block_reason_indices">
              <div class="controls">
                <input type="checkbox" value="1" id="input_reason_indices" name="reason_indices" ICM Trader:check1="checked" class="err">
                <label for="input_reason_indices" class="err">To trade CFDs on Indices / Commodities</label>
              </div>
            </div>
            <div class="control-group" id="block_reason_spreadbets" style="display: none;">
              <div class="controls">
                <input type="checkbox" value="1" id="input_reason_spreadbets" name="reason_spreadbets" ICM Trader:check1="checked">
                <label for="input_reason_spreadbets">To trade CFDs and/or Spread Bets</label>
              </div>
            </div>
            <div class="control-group" id="block_us_tax_payer">
              <label class="control-label tal" for="input_us_tax_payer">Are you a US citizen or a US resident <span style="border-bottom: 1px solid red; white-space: nowrap">for tax purposes</span>?</label>
              <div class="controls">
                <select name="us_tax_payer" id="input_us_tax_payer" ICM Trader:check1="string" class=" input-block-level">
                  <option value="yes">Yes</option>
                  <option value="no" selected="selected">No</option>
                </select>
              </div>
            </div>
            <div class="control-group" id="block_us_tic" style="display: none;">
              <label class="control-label tal" for="input_us_tic">US Tax Code</label>
              <div class="controls">
                <input type="text" value="" placeholder="US Tax Code" name="us_tic" id="input_us_tic" ICM Trader:check1="if(us_tax_payer|value)digits=9" ICM Trader:check1_msg="TIC should be 9-digits" class=" input-block-level" style="">
                <div class="row-fluid">The identification number used to submit you tax returns with the Inland Revenue Service ('IRS')</div>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="delimeter"></div>
          </div>
        </div>
        <div id="experienceBlock">
          <div class="row-fluid">
            <div class="control-group form-ttl">
              <div class="controls">
                <p class="h4">Trading Experience</p>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <input type="hidden" name="register_demo" id="input_register_demo" value="">
            <div class="control-group error empty_error" id="block_forex_and_cfds">
              <label class="control-label tal" for="input_forex_and_cfds">Do you have trading experience?</label>
              <div class="controls">
                <select name="forex_and_cfds" id="input_forex_and_cfds" ICM Trader:check1="string" class="input-block-level err">
                  <option value="">Choose...</option>
                  <option value="yes">Yes, I have traded on a real account</option>
                  <option value="no">No</option>
                </select>
              </div>
            </div>
            <div class="control-group" id="block_trade_years" style="display: none;">
              <label class="control-label tal" for="input_trade_years">How much experience do you have with trading FX, CFDs, Spread Bets or other financial products?</label>
              <div class="controls">
                <select name="trade_years" id="input_trade_years" ICM Trader:check1="if(forex_and_cfds|value=yes)string" class=" input-block-level">
                  <option value="">Choose...</option>
                  <option value="less than 1 year">&lt; 1 year</option>
                  <option value="between 1 and 3 years">1 to 3 years</option>
                  <option value="more than 3 years">&gt; 3 years</option>
                </select>
              </div>
            </div>
            <div class="control-group" id="block_trade_times" style="display: none;">
              <label class="control-label tal" for="input_trade_times">How many times have you traded on the above products in the past 12 months?</label>
              <div class="controls">
                <select name="trade_times" id="input_trade_times" ICM Trader:check1="if(forex_and_cfds|value=yes)string" class=" input-block-level">
                  <option value="">Choose...</option>
                  <option value="less than 50">&lt; 50</option>
                  <option value="more than 50">&gt; 50</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="delimeter"></div>
          </div>
        </div>
        <div class="hide" id="experienceAppliedBlock">
          <div class="row-fluid">
            <div class="control-group form-ttl">
              <div class="controls">
                <p class="h4">Do any of the below apply to you?</p>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="control-group" id="block_experience_applied_1">
              <div class="controls">
                <input type="checkbox" value="1" id="input_experience_applied_1" name="experience_applied_1" ICM Trader:check1="checked">
                <label for="input_experience_applied_1">I have a relevant professional qualification</label>
              </div>
            </div>
            <div class="control-group" id="block_experience_applied_2">
              <div class="controls">
                <input type="checkbox" value="1" id="input_experience_applied_2" name="experience_applied_2" ICM Trader:check1="checked">
                <label for="input_experience_applied_2">I regularly monitor the news/markets</label>
              </div>
            </div>
            <div class="control-group" id="block_experience_applied_3">
              <div class="controls">
                <input type="checkbox" value="1" id="input_experience_applied_3" name="experience_applied_3" ICM Trader:check1="checked">
                <label for="input_experience_applied_3">I have read educational material on trading</label>
              </div>
            </div>
            <div class="control-group" id="block_experience_applied_4">
              <div class="controls">
                <input type="checkbox" value="1" id="input_experience_applied_4" name="experience_applied_4" ICM Trader:check1="">
                <label for="input_experience_applied_4">All of the above</label>
              </div>
            </div>
            <div class="control-group" id="block_experience_applied_5">
              <div class="controls">
                <input type="checkbox" value="1" id="input_experience_applied_5" name="experience_applied_5" ICM Trader:check1="">
                <label for="input_experience_applied_5">None of the above</label>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="delimeter"></div>
          </div>
        </div>
        <div id="knowledgeBlock">
          <div class="row-fluid">
            <div class="control-group form-ttl">
              <div class="controls">
                <p class="h4">Knowledge</p>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="control-group error empty_error" id="block_test_question_1">
              <label class="control-label tal" for="input_test_question_1">What would be the required margin for 1 lot (100,000) EURUSD, if your leverage is 1:100 ?</label>
              <div class="controls">
                <select name="test_question_1" id="input_test_question_1" ICM Trader:check1="string" class="input-block-level err">
                  <option value="">Choose...</option>
                  <option value="500 EUR">500 EUR</option>
                  <option value="1,000 EUR">1,000 EUR</option>
                  <option value="2,000 EUR">2,000 EUR</option>
                </select>
              </div>
            </div>
            <div class="control-group error empty_error" id="block_test_question_2">
              <label class="control-label tal" for="input_test_question_2">What type of closing order can you choose to help limit losses when trading?</label>
              <div class="controls">
                <select name="test_question_2" id="input_test_question_2" ICM Trader:check1="string" class="input-block-level err">
                  <option value="">Choose...</option>
                  <option value="A take profit order">A take profit order</option>
                  <option value="A stop loss order">A stop loss order</option>
                  <option value="No such order exists">No such order exists</option>
                </select>
              </div>
            </div>
            <div class="control-group error empty_error" id="block_test_question_3">
              <label class="control-label tal" for="input_test_question_3">The market moves by 2%. Trading with which leverage would lead to the largest potential profit or loss?</label>
              <div class="controls">
                <select name="test_question_3" id="input_test_question_3" ICM Trader:check1="string" class="input-block-level err">
                  <option value="">Choose...</option>
                  <option value="1:50">1:50</option>
                  <option value="1:100">1:100</option>
                  <option value="1:500">1:500</option>
                  <option value="Loss would be the same">Loss would be the same</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="delimeter"></div>
          </div>
        </div>
        <div>
          <div class="row-fluid">
            <div class="control-group form-ttl">
              <div class="controls"></div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="control-group" id="block_score_msg_1">
              <label class="control-label tal" for="risk_leverage_msg_1"></label>
              <div class="controls"> <span class="green-info">The max leverage of your trading account will be determined based on response you provide to the question below.</span> </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="delimeter"></div>
          </div>
        </div>
        <div id="riskAppetite">
          <div class="row-fluid">
            <div class="control-group form-ttl">
              <div class="controls">
                <p class="h4">Risk Appetite</p>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="control-group error empty_error" id="block_risk_appetite">
              <label class="control-label tal" for="input_risk_appetite">Assuming your deposited capital is an amount you can afford to lose without affecting your capability to meet your financial obligations.<br>
                <br>
                How will you feel/react in case you lose that amount as a result of trading CFDs:</label>
              <div class="controls">
                <select name="risk_appetite" id="input_risk_appetite" ICM Trader:check1="string" class="input-block-level err">
                  <option value="">Choose...</option>
                  <option value="I will be very upset and never trade CFDs again">I will be very upset and never trade CFDs again</option>
                  <option value="I will be upset for a while and maybe continue trading maybe not">I will be upset for a while and maybe continue trading maybe not</option>
                  <option value="I will be upset for a while and most likely trade again">I will be upset for a while and most likely trade again</option>
                  <option value="That&amp;rsquo;s life&amp;hellip;.you win some you lose some">That’s life….you win some you lose some</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="delimeter"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="desktop-only col-md-6 col-md-offset-1 col-md-12 notes">
      <div class="visible-desktop offset1 span6 notes">
        <p class="h4 notes-title">There is a reason why over <strong>610,000 trading accounts</strong> have been opened with ICM Trader.</p>
        <ul class="advantage-notes-list">
          <li class="secure"><strong>ICM Trader Financial Services Ltd (member of ICM Trader Group)</strong> is authorised and regulated by the CySEC</li>
          <li class="lighting">Reliable Execution: over <strong>250 million</strong> orders filled to date</li>
          <li class="deposit">Truly Global: clients from <strong>173 countries</strong> with <strong>billions deposited</strong> to date</li>
        </ul>
        <div class="bottom-note-block"></div>
      </div>
    </div>
  </div>
</section>
