<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!empty($arResult['ITEMS'])){?>
    <div id="contact">    
        <div class="bg-color-sky-light">
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-3 sm-margin-b-30">
                        <?if(!empty($arParams['TITLE'])){?>
                            <div class="text-right sm-text-left">
                                <h2 class="margin-b-0"><?=$arParams['TITLE']?></h2>
                            </div>
                        <?}?>
                    </div>
                    <div class="col-sm-8 col-sm-offset-1">
                        <div class="row">
                            <?if(!empty($arResult['ITEMS'][0])){?>
                                <div class="col-md-3 col-xs-6 md-margin-b-30">
                                    <h5><?=$arResult['ITEMS'][0]['TITLE']?></h5>
                                    <?=$arResult['ITEMS'][0]['TEXT']?>
                                </div>
                            <?}?>
                            <?if(!empty($arResult['ITEMS'][1])){?>
                                <div class="col-md-3 col-xs-6 md-margin-b-30">
                                    <h5><?=$arResult['ITEMS'][1]['TITLE']?></h5>
                                    <?=$arResult['ITEMS'][1]['TEXT']?>
                                </div>
                            <?}?>
                            <?if(!empty($arResult['ITEMS'][2])){?>
                                <div class="col-md-3 col-xs-6">
                                    <h5><?=$arResult['ITEMS'][2]['TITLE']?></h5>
                                    <?=$arResult['ITEMS'][2]['TEXT']?>
                                </div>
                            <?}?>
                            <?if(!empty($arResult['ITEMS'][3])){?>
                                <div class="col-md-3 col-xs-6">
                                    <h5><?=$arResult['ITEMS'][3]['TITLE']?></h5>
                                    <?=$arResult['ITEMS'][3]['TEXT']?>
                                </div>
                            <?}?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}?>