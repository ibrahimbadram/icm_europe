<?
$this->lg = $this->lang->lang();
$title_lg = 'title_'.$this->lg;
$description_lg = 'description_'.$this->lg;
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
					
                    <? echo $category->$title_lg ?>
                  </center>
                </h1>
				<p style="text-align:center">
					<center>
					 <? echo $category->$description_lg ?>
					</center>
				</p>
              </div>
            </div>
          </div>
          <div class="basic-page">
            <div class="row">
              <div class="container">
               <div class="home_events_boxes">
					<div class="row">
							<?php 
							if(!empty($gallery)){
								
								foreach($gallery as $gal){
									
						?>
							<div class="col-md-4">
								<a href="uploads/gallery/<?=$gal['image']?>" data-lightbox="image-1">
									<div class="card">
											<img src="uploads/gallery/<?=$gal['image']?>"></img>
											<div class="card-overlay"></div>
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
