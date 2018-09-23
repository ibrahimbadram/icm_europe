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
          <div class="section">
            <div class="grid uk-margin-medium-top">
              <div class="col-12">
                <h1>
                  <center>
                    <? echo $this->sm->getword('Gallery',$this->lg)?>
                  </center>
                </h1>
              </div>
            </div>
          </div>
          <div class="basic-page">
            <div class="row">
              <div class="container">
               <div class="home_events_boxes">
					<div class="row">
						<?php 
							if(!empty($categories)){
								
								foreach($categories as $cat){
									
									$title_lg = 'title_'.$this->lg;
									$date_lg = 'date_'.$this->lg;
						?>
							<div class="col-md-4">
								<a href="<?=site_url('gallery/'.$cat['url_title'])?>">
									<div class="card">
											<img src="uploads/category_gal/<?=$cat['image']?>"></img>
											<div class="card-overlay">
													
													<font class="event_title"><?=$cat[$title_lg]?></font>
													<font class="event_date"> <?=$cat[$date_lg]?></font>
													
											</div>
									</div>
									</a>
								</div>
							<?php } } ?>
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
