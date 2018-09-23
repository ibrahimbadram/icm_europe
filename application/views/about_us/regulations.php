<?
$this->lg = $this->lang->lang();
?>
<section class="uk-margin-large-bottom inner-page regulations">
	<div class="position-relative">
	<div class="layout__bg"></div>
	</div>
  <div class="uk-container">

    <div class="uk-grid uk-margin-medium-top">

      <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">
		
        <div class="layout__body">

          <div class="section">

            <div class="grid">

              <div class="col-12">

                <h1><center> <? echo $this->sm->getcontent('about_us/regulations','title_'.$this->lg)?></center></h1>

              </div>

            </div>

          </div>
			<div class="basic-page uk-margin-small-top" id="regulations">
					
					<div class="row">
						<div class="container inner-body uk-margin-medium-top">
							<div>
									<div class="col-md-12 col-xs-12">
										<div class="control-rte">
											<? echo $this->sm->getcontent('about_us/regulations','description_'.$this->lg)?>
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