<?if(!empty($arResult)){?>
    <div class="promo-block parallax-window" data-parallax="scroll" data-image-src="/img/1920x1080/01.jpg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="promo-block-divider">
                        <h1 class="promo-block-title"><?=$arResult['TITLE'];?></h1>
                        <p class="promo-block-text"><?=$arResult['TEXT'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}?>