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
}

article div{
	display:block;
	text-align:center;
	margin:0 auto;
}

.uk-search-input{
	padding-right:0 !important;
	width:95% !important;
}
h3.uk-margin-small-top{
	text-align:left;
	margin-top:20px !important;
}
</style>
<section class="uk-margin-large-bottom inner-page">
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
                 <? echo $title?>
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
				<!--h2><? echo $this->sm->getcontent('about_us/news/'.$id,'title_'.$this->lg)?></h2-->
                <div class="control-rte">
                     <article class="uk-article idz-article">
                      
						 <img class="uk-margin-bottom news-list-img" src="<? echo 'uploads/pages/1980x1280/'.$img?>" alt="">
						<? echo $desc?>
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
