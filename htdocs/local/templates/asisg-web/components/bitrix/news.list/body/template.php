<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?if(!empty($arResult['ITEMS'][0])){
    $value = $arResult['ITEMS'][0];
    ?>
    <div class="promo-block parallax-window" data-parallax="scroll" data-image-src="/img/1920x1080/01.jpg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="promo-block-divider">
                        <h1 class="promo-block-title"><?=$value['NAME'];?></h1>
                        <p class="promo-block-text"><?=$value['PREVIEW_TEXT'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}?>