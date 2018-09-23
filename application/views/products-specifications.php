<?
$this->lg = $this->lang->lang();
?>
<style>
@media only screen and (max-width:768px){
	.uk-switcher{
		overflow-x:scroll !important;
	}
}
</style>
<section class="inner-page accounts">
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
                <? echo $this->sm->getcontent('products/specifications','title_'.$this->lg)?> 
              </center>
            </h1>
          </div>
        </div>
      </div>
      <div class="basic-page">
        <div class="row">
          <div class="container">
            <div >
              <div class="col-md-12 col-xs-12">
                  <section class="uk-margin-top uk-margin-large-bottom">
                    <div class="uk-container">
                      <div class="uk-grid ">
                         <? echo $this->sm->getcontent('products/specifications','description_'.$this->lg)?>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
