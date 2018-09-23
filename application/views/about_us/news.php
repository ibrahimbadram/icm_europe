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
      
      <section class="inner-page promos">
	
  <div class="uk-container">

    <div class="uk-grid ">

      <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">
		
        <div class="layout__body">

          <div class="section">

            <div class="grid uk-margin-medium-top">

              <div class="col-12">

                <h1><center>
                <? echo $this->sm->getcontent('about_us/news','title_'.$this->lg)?></center></h1>

              </div>

            </div>

          </div>
		  
				<div class="row">
					<div class="container">
						<div >
								<div class="col-md-12 col-xs-12">
									<div class="control-rte">
						<section class="uk-margin-medium-bottom">

        <div class="uk-container">

            <div class="uk-grid uk-margin-medium-top">

                <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">

                    <br>

                    <center>

                    <h2 style="color: #044f80;"><?=$this->sm->getword('Coming Soon',$this->lg)?>...</h2>

                    </center>

                </div>

            </div>

        </div>

    </section>




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
    </div>
  </div>
  </div>
  </div>
</section>
