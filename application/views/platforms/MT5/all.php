<section class="inner-page platforms">
  <div class="position-relative">
    <div class="layout__bg"></div>
  </div>
  <div class="uk-container">
  <div class="uk-grid uk-margin-medium-top">
  <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">
    <div class="layout__body">
      <div class="section">
        <div class="grid uk-margin-medium-top">
          <div class="col-12">
            <h1>
              <center>
                <? echo $this->sm->getcontent('Mt4all','title_'.$this->lg)?>
              </center>
            </h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="container">
          <div >
            <div class="col-md-12 col-xs-12">
              <div class="control-rte">
                <div class="uk-container uk-container-expand">
                  <div class="uk-container">
                    <div class="uk-width-1-1 uk-margin-medium-bottom">
                <? echo $this->sm->getcontent('Mt4all','description_'.$this->lg)?>
                      <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match uk-margin-medium-top" data-uk-grid>
                        <div>
                          <div class="uk-card uk-card-primary uk-card-small uk-card-body uk-inline idz-invest-card blue">
                            <center>
                              <h6 class="uk-text-uppercase uk-margin-small-bottom"><? echo $this->sm->getword('MT5 Desktop',$this->lg)?> </h6>
                              <i class="fa fa-6x fa-windows" style="font-size:100px; color:#ffffff;"></i>
                              <div class="uk-position-bottom-right"> <a href="<?=site_url('platforms/mt5_desktop')?>"><i class="fa fa-2x <? if($this->lg == 'ar' || $this->lg == 'fa') { echo 'fa-angle-left';}else{echo 'fa-angle-right';}?>"></i></a> </div>
                            </center>
                          </div>
                        </div>
                        <div>
                          <div class="uk-card uk-card-primary uk-card-small uk-card-body uk-inline idz-invest-card blue">
                            <center>
                              <h6 class="uk-text-uppercase uk-margin-small-bottom"><? echo $this->sm->getword('MT5 Web',$this->lg)?> </h6>
                              <i class="fa fa-6x fa-internet-explorer" style="font-size:100px; color:#ffffff;"></i>
                              <div class="uk-position-bottom-right"> <a href="<?=site_url('platforms/mt5_desktop')?>"><i class="fa fa-2x <? if($this->lg == 'ar' || $this->lg == 'fa') { echo 'fa-angle-left';}else{echo 'fa-angle-right';}?>"></i></a> </div>
                            </center>
                          </div>
                        </div>
                        <div>
                          <div class="uk-card uk-card-primary uk-card-small uk-card-body uk-inline idz-invest-card blue">
                            <center>
                              <h6 class="uk-text-uppercase uk-margin-small-bottom"><? echo $this->sm->getword('MT5 Mac',$this->lg)?> </h6>
                              <i class="fa fa-6x fa-laptop" style="font-size:100px; color:#ffffff;"></i>
                              <div class="uk-position-bottom-right"> <a href="<?=site_url('platforms/mt5_desktop')?>"><i class="fa fa-2x <? if($this->lg == 'ar' || $this->lg == 'fa') { echo 'fa-angle-left';}else{echo 'fa-angle-right';}?>"></i></a> </div>
                            </center>
                          </div>
                        </div>
                        <div>
                          <div class="uk-card uk-card-primary uk-card-small uk-card-body uk-inline idz-invest-card blue">
                            <center>
                              <h6 class="uk-text-uppercase uk-margin-small-bottom"><? echo $this->sm->getword('MT5 iPhone',$this->lg)?> </h6>
                              <i class="fa fa-6x fa-apple" style="font-size:100px; color:#ffffff;"></i>
                              <div class="uk-position-bottom-right"> <a href="<?=site_url('platforms/mt5_desktop')?>"><i class="fa fa-2x <? if($this->lg == 'ar' || $this->lg == 'fa') { echo 'fa-angle-left';}else{echo 'fa-angle-right';}?>"></i></a> </div>
                            </center>
                          </div>
                        </div>
                        <div>
                          <div class="uk-card uk-card-primary uk-card-small uk-card-body uk-inline idz-invest-card blue">
                            <center>
                              <h6 class="uk-text-uppercase uk-margin-small-bottom"><? echo $this->sm->getword('MT5 Android',$this->lg)?> </h6>
                              <i class="fa fa-6x fa-android" style="font-size:100px; color:#ffffff;"></i>
                              <div class="uk-position-bottom-right"> <a href="<?=site_url('platforms/mt5_desktop')?>"><i class="fa fa-2x <? if($this->lg == 'ar' || $this->lg == 'fa') { echo 'fa-angle-left';}else{echo 'fa-angle-right';}?>"></i></a> </div>
                            </center>
                          </div>
                        </div>
                        <div>
                          <div class="uk-card uk-card-primary uk-card-small uk-card-body uk-inline idz-invest-card blue">
                            <center>
                              <h6 class="uk-text-uppercase uk-margin-small-bottom"><? echo $this->sm->getword('MT5 Linus',$this->lg)?> </h6>
                              <i class="fa fa-6x fa-linux" style="font-size:100px; color:#ffffff;"></i>
                              <div class="uk-position-bottom-right"> <a href="<?=site_url('platforms/mt5_desktop')?>" ><i class="fa fa-2x <? if($this->lg == 'ar' || $this->lg == 'fa') { echo 'fa-angle-left';}else{echo 'fa-angle-right';}?>"></i></a> </div>
                            </center>
                          </div>
                        </div>
                      </div>
                    </div>
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
