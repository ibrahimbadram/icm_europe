
<div class="full-width  banner-slider" >
  <div class="full-width" >
    <div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
      <div class="slides" data-group="slides">
		<?
		 if(!empty($banners)){
		?>
        <ul>
			<?
				$i = count($banners);
				foreach($banners as $banner){
					
					if($banner['title_animation_direction'] == 1 || $banner['image_animation_direction'] == 1){
						$title_animation_direction = 'slideAppearRightToLeft';
						$image_animation_direction = 'slideAppearRightToLeft';
					}elseif($banner['title_animation_direction'] == 2 || $banner['image_animation_direction'] == 2){
						$title_animation_direction = 'slideAppearLeftToRight';
						$image_animation_direction = 'slideAppearLeftToRight';
					}elseif($banner['title_animation_direction'] == 3 || $banner['image_animation_direction'] == 3){
						$title_animation_direction = 'slideAppearUpToDown';
						$title_animation_direction = 'slideAppearUpToDown';
					}elseif($banner['title_animation_direction'] == 4 || $banner['image_animation_direction'] == 4){
						$title_animation_direction = 'slideAppearDownToUp';
						$title_animation_direction = 'slideAppearDownToUp';
					}
								
			?>
			
			 <li>
				<div class="slide-body" data-group="slide"> 
				<img class="img" src="uploads/banner/<?=$banner['background']?>">
				  <div class="caption header-1" data-animate="<?=$title_animation_direction?>" data-delay="500" data-length="300">
					<?=$banner['description_'.$this->lg]?>
					<div class="caption sub" data-animate="<?=$title_animation_direction?>" data-delay="800" data-length="300"> </div>
				  </div>
				  <div class="caption img-<?=$i?> inner" data-animate="<?=$image_animation_direction?>" data-delay="200" data-length="1300"> <img src="uploads/banner/<?=$banner['image']?>"> </div>
				</div>
			  </li>
		  
			<? /*
        <li>
            <div class="slide-body" data-group="slide"> 
			<img class="img" src="assets/images/slider/bg_slide_d-1.jpg">
              <div class="caption header-1" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                <?=lang('home_banner6_description')?>
                <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300"> </div>
              </div>
              <div class="caption img-6 inner" data-animate="slideAppearDownToUp" data-delay="200" data-length="1300"> <img src="assets/images/slider/bg_slide_d_i-1.png"> </div>
            </div>
          </li>
          <li>
            <div class="slide-body" data-group="slide"> <img class="img" src="assets/images/slider/bg_slide_d-2.jpg">
              <div class="caption header-8" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                <div class="banner-carousel-caption">
                  <?=lang('home_banner7_description')?>
                </div>
                <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300"> </div>
              </div>
              <div class="caption img-7 inner" data-animate="slideAppearRightToLeft">
              <?=lang('home_banner8_description')?>
              </div>
              <div class="caption img-8 inner" data-animate="slideAppearDownToUp"> <img src="assets/images/slider/bg_slide_d_i-2.png"> </div>
            </div>
          </li>
          <li>
            <div class="slide-body" data-group="slide"> <img class="img" src="assets/images/slider/bg_slide_d-3.jpg">
              <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                <div class="banner-carousel-caption">
                  <?=lang('home_banner4_description')?>
                </div>
                <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300"> </div>
              </div>
              <div class="caption img-5 inner" data-animate="slideAppearRightToLeft"> <img src="assets/images/slider/bg_slide_d_i-3.png"> </div>
            </div>
          </li>
          <li>
            <div class="slide-body" data-group="slide"> <img class="img" src="assets/images/slider/bg_slide_d-4.jpg">
              <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300"> 
                <?=lang('home_banner2_description')?>
                <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300"> </div>
              </div>
              <div class="caption img-9 inner" data-animate="slideAppearDownToUp" data-delay="200"> <img src="assets/images/slider/bg_slide_d_i-4.png"> </div>
            </div>
          </li>
          */?>
			<? $i--;} ?>
        </ul>
		 <? } ?>
      </div>
      <div class="pages"> <a class="page" href="#" data-jump-to="1">1</a> <a class="page" href="#" data-jump-to="2">2</a> <a class="page" href="#" data-jump-to="3">3</a> <a class="page" href="#" data-jump-to="4">4</a> </div>
    </div>
  </div>
</div>
