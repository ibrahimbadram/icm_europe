<?
$this->lg = $this->lang->lang();
?>
<style>
.basic-page h6 {
	font-size: 16px
}
</style>
<section class="uk-margin-large-bottom inner-page">
  <div class="position-relative">
    <div class="layout__bg"></div>
  </div>
  <div class="uk-container">
  <div class="uk-grid ">
  <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">
    <div class="layout__body">
      <div class="section">
        <div class="grid uk-margin-medium-top">
          <div class="col-12">
            <h1>
              <center>
                <? echo $this->sm->getcontent('about_us/contact_us','title_'.$this->lg)?>
              </center>
            </h1>
          </div>
        </div>
      </div>
      <div class="basic-page" id="contact">
        <div class="row">
          <div class="container">
            <div >
              <div class="col-md-12 col-xs-12">
                <div class="control-rte">
                  <div class="uk-grid">
                    <div class="uk-width-1-1">
                      <? echo $this->sm->getcontent('about_us/contact_us','description_'.$this->lg)?>
                    </div>
                    
                    <!--

										<div class="uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">

											<div class="uk-child-width-1-2@s uk-grid-divider idz-content-adjust2 uk-margin-small-top uk-margin-large-bottom" data-uk-grid>

												<div>

													<h6 class="uk-text-uppercase uk-margin-remove-bottom">Manhattan Office</h6>

													<p class="uk-margin-small-top uk-margin-remove-bottom">Level 34, Scott Square,

														<br/>Scott Street, 4268, New York,

														<br/>United States America</p> <span class="uk-label uk-label-success uk-margin-small-top uk-margin-medium-bottom">Tel : (800) 123-4455</span> </div>

												<div>

													<h6 class="uk-text-uppercase uk-margin-remove-bottom">London Office</h6>

													<p class="uk-margin-small-top uk-margin-remove-bottom">Level 8, One Square,

														<br/>Canary Wharf, E14 5AA, London

														<br/>United Kingdom</p> <span class="uk-label uk-label-success uk-margin-small-top uk-margin-medium-bottom">Tel : (399) 123-8822</span> </div>

												<div class="uk-width-1-1 uk-margin-remove-top uk-margin-remove-bottom">

													<hr class="uk-visible@m"> </div>

												<div class="uk-margin-remove-top uk-visible@m">

													<h6 class="uk-text-uppercase uk-margin-medium-top uk-margin-remove-bottom">Singapore Office</h6>

													<p class="uk-margin-small-top uk-margin-remove-bottom">Level 2, Cintech Building,

														<br/>73 Science Park Dr, 118254

														<br/>Singapore</p> <span class="uk-label uk-label-success uk-margin-small-top">Tel : (720) 123-9933</span> </div>

												<div class="uk-margin-remove-top uk-visible@m">

													<h6 class="uk-text-uppercase uk-margin-medium-top uk-margin-remove-bottom">Tokyo Office</h6>

													<p class="uk-margin-small-top uk-margin-remove-bottom">Level 11, Compass Offices,

														<br/>Toranomon, Minatoku, 105-01

														<br/>Japan</p> <span class="uk-label uk-label-success uk-margin-small-top">Tel : (655) 123-3377</span> </div>

											</div>

										</div>

						--> 
                    
                    <!--

										<div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">

											<h3>Contact Us</h3>

											<h5>If you would like us to call you, please enter your details below and submit, and we will contact you shortly:</h5>

											<form id="contact-form" class="uk-form">

												<div class="uk-margin uk-width-2-3">

												<label>Existing Client?</label>

												<input class="existing-client" data-val="true" data-val-required="&#39;Is Existing Client&#39; must not be empty." id="" name="IsExistingClient" type="radio" value="True" /><label for="">Yes</label>

												<input checked="checked" class="existing-client" id="" name="IsExistingClient" type="radio" value="False" /><label for="">No</label>

												<span class="field-validation-valid" data-valmsg-for="IsExistingClient" data-valmsg-replace="true"></span>

												<div class="uk-margin uk-width-1-4">

													<input class="uk-input" id="accnumber" value="" type="text" placeholder="Account Number"> </div>

												</div>

												<div class="uk-margin uk-width-1-4">

													<input class="uk-input" id="accnumber" value="" type="text" placeholder="Account Number"> </div>

												<div class="uk-margin uk-width-2-3">

													<input class="uk-input" id="name" value="" type="text" placeholder="Full name"> </div>

												<div class="uk-margin uk-width-2-3">

													<input class="uk-input" id="email" value="" type="email" placeholder="Email"> </div>

												<div class="uk-margin uk-width-2-3">

													<input class="uk-input" id="subject" value="" type="text" placeholder="Subject"> </div>

												<div class="uk-margin">

													<textarea class="uk-textarea" id="message" rows="5" placeholder="Message"></textarea>

												</div>

												<div>

													<button class="uk-button uk-button-primary uk-float-left" id="buttonsend" type="submit" name="submit">Send Message</button>

													<div class="idz-contact-loading uk-float-left uk-margin-left" style="display: none;"><span data-uk-spinner></span>Please wait..</div>

												</div>

											</form>

										</div>

						--> 
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
