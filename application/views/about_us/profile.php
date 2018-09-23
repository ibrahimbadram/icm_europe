<?
$this->lg = $this->lang->lang();
?>
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
						<? echo $this->sm->getcontent('about_us/profile','title_'.$this->lg)?>
                  </center>
                </h1>
              </div>
            </div>
          </div>
          <div class="basic-page">
            <div class="row ">
              <div class="container">
                <div >
                  <div class="col-md-6 col-xs-12">
                    <div class="control-rte">
                      <? echo $this->sm->getcontent('about_us/profile','description_'.$this->lg)?>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="control-media margin-top-20"> <img src="assets/images/about_us/company_profile.jpg" /> </div>
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
