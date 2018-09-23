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
	text-align:center;
}

article div{
	display:block;
	text-align:center;
	margin:0 auto;
}

article .read-more-btn{
	font-size:15px;
	    font-weight: 600;
	
}

.uk-search-input{
	padding-right:0 !important;
	width:95% !important;
}

.uk-article+.uk-article{
	    margin-top: 30px;
}
.desktop-only {
	margin:0 auto;
}

</style>
<section class="uk-margin-large-bottom inner-page company_news">
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
                <? echo $this->sm->getword('Company News',$this->lg)?>
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
                  <div class="uk-grid">
					
					
					<div class="uk-width-1-1@s mobile-only">
							<?php
							//print_r($company_news); exit;
								foreach( $company_news as $mn){
							?>
							<article class="uk-article idz-article">								
                            <p class="uk-article-meta">					 									
							<? echo $mn['date_'.$this->lg]?>								
                            </p>								
                            <h2 class="uk-margin-small-top">
                            <a class="uk-link-reset" href="<?=site_url('company_news/'.$mn['url_title'])?>">
							<? echo $mn['title_'.$this->lg]?></a>								
                            </h2>								
							<img alt="" class="uk-margin-bottom news-list-img" src="<? echo 'uploads/company_news/1980x1280/'.$mn['image']?>" />
								<div>
								<div class="uk-margin-small-bottom">&nbsp;</div>

								<? echo word_limiter($mn['description_'.$this->lg], 50)?>

								<div><a class="uk-button uk-button-text" href="<?=site_url('company_news/'.$mn['url_title'])?>"><? echo $this->sm->getcontent('about_us/news/continue_reading_title','title_'.$this->lg)?>...</a></div>
								</div>
							</article>
								<?php } ?>
					</div>
					
					<!-- desktop view  -->
					<div class="uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s desktop-only">
							<?php
							foreach( $company_news as $mn){
							?>
							<article class="uk-article idz-article">
								<p class="uk-article-meta">										
								<? echo $mn['date_'.$this->lg]?>								
                                </p>								
                                <h2 class="uk-margin-small-top">
                                <a class="uk-link-reset" href="<?=site_url('company_news/'.$mn['url_title'])?>">
								<? echo $mn['title_'.$this->lg]?></a>								
                                </h2>
								<img alt="" class="uk-margin-bottom news-list-img" src="<? echo 'uploads/company_news/1980x1280/'.$mn['image']?>" />
								<div>
								<div class="uk-margin-small-bottom">&nbsp;</div>
								<? echo  word_limiter($mn['description_'.$this->lg], 50)?>
								<div><a class="uk-button uk-button-text read-more-btn <? if($this->lg != 'fa' && $this->lg != 'ar'){ 
								echo "uk-float-right";}else{echo "uk-float-left";}?>" href="<?=site_url('company_news/'.$mn['url_title'])?>">
								<? echo $this->sm->getcontent('about_us/news/continue_reading_title','title_'.$this->lg)?>...</a></div>
								</div>
							</article>
							<?php } ?>
							
					</div>

					
                    
					<!-- End/desktop view -->
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
