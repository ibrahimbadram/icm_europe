<section id="pagetitle-container">

        <div class="uk-container">

            <div class="uk-grid ">

                <div class="uk-width-1-1">

                    <!-- Breadcrumb begin -->

                    <ul class="uk-breadcrumb uk-margin-top uk-float-right">

<? foreach ( $breadcrumb as $bc ) {  ?>
<? if ( $bc['title'] != '' ) { ?>
                        <li><a href="<?=site_url($bc['link'])?>"><?=$bc['title']?></a></li>
<? } ?>
<? } ?>

                    </ul>

                    <!-- Breadcrumb end -->

                </div>

            </div>

        </div>

    </section>