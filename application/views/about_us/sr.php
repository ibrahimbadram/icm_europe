<?
$this->lg = $this->lang->lang();
?>
<style>
h3 {
    margin-top: 1em !important;
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

                <h1><center><? echo $this->sm->getcontent('about_us/sr','title_'.$this->lg)?></center></h1>

              </div>

            </div>

          </div>
		  
        <div class="basic-page">
			   <? echo $this->sm->getcontent('about_us/sr','description_'.$this->lg)?>
        </div>
     </div>
    </div>
</section>