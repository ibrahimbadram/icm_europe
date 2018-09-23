<?
$this->lg = $this->lang->lang();
?>
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
                 <? echo $this->sm->getcontent('products/precious-metals','title_'.$this->lg)?>
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
                <div class="control-rte">
					<? echo $this->sm->getcontent('products/precious-metals','description_'.$this->lg)?>
					<section class="uk-margin-medium-bottom">
						<center>
							  <a class="uk-button uk-button-secondary" href="<?=site_url('products/specifications')?>" style="width:300px;"><? echo $this->sm->getcontent('products/contract_specification_title','title_'.$this->lg)?></a>
						</center>
					</section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
