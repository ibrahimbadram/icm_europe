<script>

function activatetab(id){

	$('.tab-container').removeClass('active');

	$('#'+id).addClass('active');

	$('.tab-buttons').removeClass('active');

	$('.'+id).addClass('active');

	}

</script>

<section class="uk-margin-medium-bottom resources">
  <div class="layout__bg"></div>
  <div class="uk-container">
    <div class="uk-grid ">
      <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">
        <div class="layout__body">
          <div class="basic-page">
            <? echo $this->sm->getcontent('resources/trading_central','description_'.$this->lg);?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
