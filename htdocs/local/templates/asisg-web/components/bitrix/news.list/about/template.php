<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?if(!empty($arResult['ITEMS'][0])){ 
    $value = $arResult['ITEMS'][0];
    ?>
    <div id="about">
        <div class="container content-lg">
            <div class="row">
                <div class="col-sm-3 sm-margin-b-30">
                    <div class="text-right sm-text-left">
                        <h2 class="margin-b-0"><?=$value['NAME']?></h2>
                    </div>
                </div>
                <div class="col-sm-8 col-sm-offset-1">
                    <div class="margin-b-60">
                        <?=$value['PREVIEW_TEXT']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}?>