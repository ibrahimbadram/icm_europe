
<style>
.uk-h2, h2 {
    font-size: 2rem !important;
    line-height: 1.3 !important;
}
.uk-h3, h3 {
    font-size: 1.5rem !important;
    line-height: 1.4 !important;
}

.uk-container ul{

	padding-left:30px;
}

.uk-container ul li{
	
    list-style-type: disc;
}
</style>
    <section class="uk-margin-large-bottom" style="direction:ltr">



        <div class="uk-container">



            <div class="uk-grid uk-margin-medium-top">



                <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s" style="text-align:left">

                    <h1 class="with-line uk-text-center uk-margin-medium-bottom uk-margin-small-top"><?=$this->sm->getword('Terms and Conditions',$this->lg)?></h1>
					
					<? echo $this->sm->getcontent('Terms_conditions','description_'.$this->lg)?>

                </div>



                <div></div>



                </div>



            </div>



        </section>