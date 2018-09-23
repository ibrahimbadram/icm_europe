<?

$this->lg = $this->lang->lang();

?>

<section class="uk-margin-large-bottom platforms">

<div class="layout__bg"></div>

  <div class="uk-container">

    <div class="uk-grid uk-margin-medium-top">

      <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">

        <h2 class="uk-margin-small-top uk-margin-remove-bottom"> <? echo $this->sm->getcontent('account/demo','title_'.$this->lg)?></h2>

        <br>

        <br>

        <table class="uk-table uk-table-striped uk-text-center">

          <thead>

            <tr>

              <th class="uk-text-center" colspan="2" style="<? if($this->lg != 'fa' && $this->lg != 'ar'){ echo "border-right:1px solid #044f80";}else{echo "border-left:1px solid #044f80";}?>"> <a href="https://access.icmcapital.co.uk/en/registration/demo" target="_blank" style="color: #044f80;"> <img src="assets/images/regulatory/icm-capital-logo.png" alt=""></a></th>

              <th class="uk-text-center" colspan="2" style="<? if($this->lg != 'fa' && $this->lg != 'ar'){ echo "border-right:1px solid #044f80";}else{echo "border-left:1px solid #044f80";}?>">

              <a><img src="assets/images/regulatory/icm-europe.png" alt=""></a></th>

              <th class="uk-text-center" colspan="2"> <a href="https://www.icmcapital.com/<?=$this->lg?>/account/demo" target="_blank" style="color: #044f80;"> <img src="assets/images/regulatory/icm-trader-logo.png" alt=""></a></th>

            </tr>

          </thead>

        </table>

      </div>

    </div>

  </div>

</section>

