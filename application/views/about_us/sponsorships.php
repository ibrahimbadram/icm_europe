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
          <div class="basic-page uk-margin-medium-top">
            <div class="row">
              <div class="container">
                <div>
                  <div class="col-md-12 col-xs-12">
                    <div class="control-rte">
                      <h2><? echo $this->sm->getword('Sponsorships',$this->lg)?></h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="container inner-body">
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <div class="control-rte">
                      <table class="uk-table uk-table-striped uk-text-center" >
                        <tbody>
                          <tr>
                            <td colspan="2"><a href="<?=site_url('sponsorships/polo')?>" ><img src="assets/images/about_us/sponsor-1.png" alt="" width="300" /></a></td>
                            <td colspan="2"><a href="<?=site_url('sponsorships/fulham')?>" ><img src="assets/images/about_us/sponsor-2.png" alt="" width="300" /></a></td>
                            <td colspan="2"><a href="<?=site_url('sponsorships/world-cycling-revival')?>" ><img src="assets/images/about_us/sponsor-3.png" alt="" width="300" /></a></td>
                          </tr>
                        </tbody>
                      </table>
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
