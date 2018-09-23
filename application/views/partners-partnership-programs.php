<?
$this->lg = $this->lang->lang();
?>
<style>
h3 {
    color: #FFF !important;
}
</style>
<section class="uk-margin-top uk-margin-large-bottom">
        <div class="uk-container">
            <div class="uk-grid uk-margin-medium-top">
              <? echo $this->sm->getcontent('partners/partnership-programs','description_'.$this->lg)?>
            </div>
        </div>
    </section>