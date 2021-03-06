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
                    <? echo $this->sm->getcontent('about_us/events','title_'.$this->lg)?>
                  </center>
                </h1>
              </div>
            </div>
          </div>
          <div class="basic-page">
            <div class="row">
              <div class="container">
                <div>
                  <div class="col-md-12 col-xs-12">
                    <? echo $this->sm->getcontent('about_us/events','description_'.$this->lg)?>
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
