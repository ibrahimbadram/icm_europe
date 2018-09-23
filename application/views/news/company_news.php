<?
$this->lg = $this->lang->lang();
?>
<style>
.news-list-img{
	max-width:100%;
	display:block;
	text-align:center;
	margin:0 auto;
}

article div.uk-margin-small-bottom{
	text-align:left;
}.rtl article div.uk-margin-small-bottom{
	text-align:right;
}

article div{
	display:block;
	text-align:center;
	margin:0 auto;
}

.uk-search-input{
	padding-right:0 !important;
	width:95% !important;
}.rtl .uk-article-meta{	direction:rtl;}.rtl h3{	text-align:right;}.rtl h3::after{	right:0;	left:auto;}.rtl .idz-article span.uk-label{	    margin: 10px 0 10px 0;}.rtl{	direction:rtl;}

@media only screen and (max-width:971px){
	.table_wrapper{
		overflow-x:scroll;
	}
}
</style>
<section class="uk-margin-large-bottom inner-page<? if($this->lg == 'ar' || $this->lg == 'fa'){echo ' rtl';}?>">
  <div class="position-relative">
    <div class="layout__bg"></div>
  </div>
  <div class="uk-container">
  <div class="uk-grid uk-margin-medium-top">
  <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">
    <div class="layout__body">
      <div class="section uk-margin-medium-bottom">
        <div class="grid">
          <div class="col-12">
            <h1>
              <center>
                <? echo $this->sm->getcontent('about_us/company/news','title_'.$this->lg); ?>
              </center>
            </h1>
          </div>
        </div>
      </div>
      <div class="basic-page" id="news">
        <div class="row">
          <div class="container">
			
            <div >
              <div class="col-md-12 col-xs-12">
                <div class="control-rte">					
                     <article class="uk-article idz-article">							
                     <? /*<h3 class="uk-margin-small-top"><a class="uk-link-reset" href="<?=site_url('news/details/'.$id)?>"><? echo $this->sm->getcontent('About_us/news/'.$id,'title_'.$this->lg)?></a>								
					 </h3>*/?>
                     <img class="uk-margin-bottom news-list-img" src="<? echo 'uploads/pages/1980x1280/'.$this->sm->getcontent('about_us/company/news','image')?>" alt="">
                    <? echo $this->sm->getcontent('about_us/company/news','description_'.$this->lg); ?>
					</article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
