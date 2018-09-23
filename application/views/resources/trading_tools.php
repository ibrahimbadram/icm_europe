<?
$this->lg = $this->lang->lang();
?>
<script>

function activatetab(id){

	$('.tab-2-container').removeClass('active');

	$('#'+id).addClass('active');

	$('.tab-button-2').removeClass('active');

	$('.'+id).addClass('active');

	}

function activatenext(id){

		var num1 = +id + 1;

	if ( num1  >= 19 ) {} else {

    $("#activatenext").attr('onClick','activatenext('+num1+')');

    $("#activateprev").attr('onClick','activateprev('+num1+')');

	$('.tab-data-container').removeClass('active');

	$('.tab-button').removeClass('active');

	$('#tab-18-05-'+num1).addClass('active');

	$('.tab-18-05-'+num1).addClass('active');

	}

}

function activateprev(id){

		var num2 = parseInt(id)-1;

		//alert(id);

		//alert(num2);

	if ( num2 <= 13 ) {} else {

    $("#activateprev").attr('onClick','activateprev('+num2+')');

    $("#activatenext").attr('onClick','activatenext('+num2+')');

	$('.tab-data-container').removeClass('active');

	$('.tab-button').removeClass('active');

	$('#tab-18-05-'+num2).addClass('active');

	$('.tab-18-05-'+num2).addClass('active');

	}

}

</script>

<section class="uk-margin-medium-bottom resources">
  <div class="layout__bg"></div>
  <div class="uk-container">
    <div class="uk-grid ">
      <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">
        <div class="layout__body">
          <div class="basic-page">
				<? echo $this->sm->getcontent('resources/trading_tools','description_'.$this->lg);?>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
