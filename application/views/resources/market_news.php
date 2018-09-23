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
                <? echo $this->sm->getcontent('about_us/news','title_'.$this->lg)?>
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
                      <aside class="uk-margin-medium-bottom">
                        <form class="uk-search uk-search-default uk-width-1-1 uk-margin-top">
                          <a href="" class="uk-search-icon-flip" data-uk-search-icon></a>
                          <input class="uk-search-input" type="search" placeholder="Search here...">
                        </form>
                      </aside>
                      <aside class="uk-margin-medium-bottom">
                        <div class="uk-card uk-card-default idz-widget-card uk-card-body">
                          <h5 class="uk-text-uppercase uk-margin-remove-bottom"><? echo $this->sm->getcontent('about_us/news/categories_title','title_'.$this->lg)?></h5>
                          <ul class="uk-list uk-list-divider idz-categories-widget">
                            <li><a href="#"><? echo $this->sm->getcontent('about_us/news/cat1','title_'.$this->lg)?><span class="<? if($this->lg != 'ar' && $this->lg != 'fa') {echo 'uk-float-right';}else{echo 'uk-float-left';}?>" data-uk-icon="icon: <? if($this->lg != 'ar' && $this->lg != 'fa') {echo 'triangle-right';}else{echo 'triangle-left';}?>; ratio: 0.9"></span></a></li>
                            <li><a href="#"><? echo $this->sm->getcontent('about_us/news/cat2','title_'.$this->lg)?><span class="<? if($this->lg != 'ar' && $this->lg != 'fa') {echo 'uk-float-right';}else{echo 'uk-float-left';}?>" data-uk-icon="icon: <? if($this->lg != 'ar' && $this->lg != 'fa') {echo 'triangle-right';}else{echo 'triangle-left';}?>; ratio: 0.9"></span></a></li>
                            <li><a href="#"><? echo $this->sm->getcontent('about_us/news/cat3','title_'.$this->lg)?><span class="<? if($this->lg != 'ar' && $this->lg != 'fa') {echo 'uk-float-right';}else{echo 'uk-float-left';}?>" data-uk-icon="icon: <? if($this->lg != 'ar' && $this->lg != 'fa') {echo 'triangle-right';}else{echo 'triangle-left';}?>; ratio: 0.9"></span></a></li>
                          </ul>
                        </div>
                      </aside>
                     
                      
                      <aside class="uk-margin-medium-bottom uk-margin-small-top">
                        <div class="uk-card uk-card-default idz-widget-card uk-card-body">
                          <h5 class="uk-text-uppercase uk-margin-remove-bottom"><? echo $this->sm->getword('Archive',$this->lg)?></h5>
                          <ul class="uk-list uk-list-divider idz-archive-widget">
                            <li><a href="#"><?=date('M Y')?><span class="uk-label uk-label-success uk-float-right">5</span></a></li>
                                               
                          </ul>
                        </div>
                      </aside>
                      
                    </div>
					
					<div class="uk-width-1-1@s mobile-only">
							<?php
								for($i=1;$i<=5; $i++){
							?>
							<article class="uk-article idz-article">								<p class="uk-article-meta">									<span class="uk-label uk-label-success">							<?=$this->sm->getcontent('About_us/news/'.$i,'sub_title_'.$this->lg)?>									</span> 									<? echo $this->sm->getcontent('About_us/news/'.$i,'date_'.$this->lg)?>								</p>								<h3 class="uk-margin-small-top"><a class="uk-link-reset" href="<?=site_url('news/details/'.$i)?>"><? echo $this->sm->getcontent('About_us/news/'.$i,'title_'.$this->lg)?></a>								</h3>								
								<img alt="" class="uk-margin-bottom news-list-img" src="<? echo 'uploads/pages/1980x1280/'.$this->sm->getcontent('about_us/news/'.$i,'image')?>" />
								<div>
								<div class="uk-margin-small-bottom">&nbsp;</div>

								<? echo word_limiter($this->sm->getcontent('about_us/news/'.$i,'description_'.$this->lg), 50)?>

								<div><a class="uk-button uk-button-text" href="<?=site_url('news/details/'.$i)?>"><? echo $this->sm->getcontent('about_us/news/continue_reading_title','title_'.$this->lg)?>...</a></div>
								</div>
							</article>
								<?php } ?>
					</div>
					
					<!-- desktop view  -->
					<div class="uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s desktop-only">
							<?php
								for($j=1;$j<=5; $j++){
									
							?>
							<article class="uk-article idz-article">
								<p class="uk-article-meta">									<span class="uk-label uk-label-success">									<?=$this->sm->getcontent('About_us/news/'.$j,'sub_title_'.$this->lg)?>									</span> 									<? echo $this->sm->getcontent('About_us/news/'.$j,'date_'.$this->lg)?>								</p>								<h3 class="uk-margin-small-top"><a class="uk-link-reset" href="<?=site_url('news/details/'.$j)?>"><? echo $this->sm->getcontent('About_us/news/'.$j,'title_'.$this->lg)?></a>								</h3>
								<img alt="" class="uk-margin-bottom news-list-img" src="<? echo 'uploads/pages/1980x1280/'.$this->sm->getcontent('about_us/news/'.$j,'image')?>" />
								<div>
								<div class="uk-margin-small-bottom">&nbsp;</div>

								<? echo word_limiter($this->sm->getcontent('about_us/news/'.$j,'description_'.$this->lg), 50)?>

								<div><a class="uk-button uk-button-text read-more-btn <? if($this->lg != 'fa' && $this->lg != 'ar'){ echo "uk-float-right";}else{echo "uk-float-left";}?>" href="<?=site_url('news/details/'.$j)?>"><? echo $this->sm->getcontent('about_us/news/continue_reading_title','title_'.$this->lg)?>...</a></div>
								</div>
							</article>
							<?php } ?>
							
					</div>

					
                    <div class="uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s desktop-only">
                      <aside class="uk-margin-medium-bottom">
                        <form class="uk-search uk-search-default uk-width-1-1 uk-margin-top">
                          <a href="" class="uk-search-icon-flip" data-uk-search-icon></a>
                          <input class="uk-search-input" type="search" placeholder="<? echo $this->sm->getcontent('about_us/news/search_here_title','title_'.$this->lg)?>...">
                        </form>
                      </aside>
                      <aside class="uk-margin-medium-bottom">
                        <div class="uk-card uk-card-default idz-widget-card uk-card-body">
                          <h5 class="uk-text-uppercase uk-margin-remove-bottom"><? echo $this->sm->getcontent('about_us/news/categories_title','title_'.$this->lg)?></h5>
                          <ul class="uk-list uk-list-divider idz-categories-widget">
                            <li><a href="#"><? echo $this->sm->getcontent('about_us/news/cat1','title_'.$this->lg)?><span class="<? if($this->lg != 'fa' && $this->lg != 'ar'){ echo "uk-float-right";}else{echo "uk-float-left";}?>" data-uk-icon="icon: <? if($this->lg != 'fa' && $this->lg != 'ar'){ echo "triangle-right";}else{echo "triangle-left";}?>; ratio: 0.9"></span></a></li>
                            <li><a href="#"><? echo $this->sm->getcontent('about_us/news/cat2','title_'.$this->lg)?><span class="<? if($this->lg != 'fa' && $this->lg != 'ar'){ echo "uk-float-right";}else{echo "uk-float-left";}?>" data-uk-icon="icon: <? if($this->lg != 'fa' && $this->lg != 'ar'){ echo "triangle-right";}else{echo "triangle-left";}?>; ratio: 0.9"></span></a></li>
                            <li><a href="#"><? echo $this->sm->getcontent('about_us/news/cat3','title_'.$this->lg)?><span class="<? if($this->lg != 'fa' && $this->lg != 'ar'){ echo "uk-float-right";}else{echo "uk-float-left";}?>" data-uk-icon="icon: <? if($this->lg != 'fa' && $this->lg != 'ar'){ echo "triangle-right";}else{echo "triangle-left";}?>; ratio: 0.9"></span></a></li>
                          </ul>
                        </div>
                      </aside>
                                 
                      <aside class="uk-margin-medium-bottom uk-margin-small-top">
                        <div class="uk-card uk-card-default idz-widget-card uk-card-body">
                          <h5 class="uk-text-uppercase uk-margin-remove-bottom"><? echo $this->sm->getcontent('about_us/news/archive_title','title_'.$this->lg)?></h5>
                          <ul class="uk-list uk-list-divider idz-archive-widget">
                            <li><a href="#"><?=date('M Y')?><span class="uk-label uk-label-success uk-float-right">5</span></a></li>
                              
                          </ul>
                        </div>
                      </aside>
                  
                      
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
</section>
