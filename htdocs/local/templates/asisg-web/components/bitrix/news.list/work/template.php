<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


if(!empty($arResult['ITEMS'])){?>
    <div id="work">
        <div class="container content-lg">
            <div class="row">
                <div class="col-sm-3 sm-margin-b-30">
                    <div class="text-right sm-text-left">
                        <h2 class="margin-b-0"><?=$arParams['TITLE'];?></h2>
                    </div>
                </div>
                <div class="col-sm-8 col-sm-offset-1">
                    <!-- Masonry Grid -->
                    <div class="masonry-grid row row-space-2">                    

                        <? foreach ($arResult['ITEMS'] as $val){?>
                            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4">
                                <!-- Work -->
                                <div class="work work-popup-trigger">
                                    <div class="work-overlay">
                                        <img class="full-width img-responsive" src="<?=$val['PREVIEW_PICTURE']['SRC']?>" alt="<?=$val['NAME']?>">
                                    </div>
                                    <div class="work-popup-overlay">
                                        <div class="work-popup-content">
                                            <a href="javascript:void(0);" class="work-popup-close">X</a>
                                            <div class="margin-b-30">
                                                <h3 class="margin-b-5"><?=$val['NAME']?></h3> 
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8 work-popup-content-divider sm-margin-b-20">
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        <?=$val['DETAIL_TEXT']?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        <p class="margin-b-5">
                                                            <strong><?=GetMessage("addres");?>:</strong> 
                                                            <a href="//<?=$val['PROPERTIES']['URL_SITE']['VALUE']?>">
                                                                <?=$val['PROPERTIES']['URL_SITE']['VALUE']?>
                                                            </a>
                                                        </p>
                                                    </div>
                                                    <?if(!empty($val['PROPERTIES']['URL_GITHUB']['VALUE'])){?>
                                                        <div class="margin-t-10 sm-margin-t-0">
                                                            <p class="margin-b-5">
                                                                <strong><?=GetMessage("programmnyy_code");?>:</strong> 
                                                                <a target="_blank" href="//<?=$val['PROPERTIES']['URL_GITHUB']['VALUE']?>">GitHub.com</a>
                                                            </p>
                                                        </div>
                                                    <?}?>
                                                    <?if(!empty($val['PROPERTIES']['CMS']['VALUE'])){?>
                                                        <div class="margin-t-10 sm-margin-t-0">
                                                            <p class="margin-b-5">
                                                                <strong>CMS/Framework</strong> 
                                                                <?=$val['PROPERTIES']['CMS']['VALUE'];?>
                                                            </p>
                                                        </div>
                                                    <?}?>
                                                    <?if(!empty($val['PROPERTIES']['CUSTOM_TEXT_HTML']['VALUE'])){?>
                                                        <div class="margin-t-10 sm-margin-t-0">
                                                            <p class="margin-b-5">
                                                                <?=$val['PROPERTIES']['CUSTOM_TEXT_HTML']['~VALUE']['TEXT'];?>
                                                            </p>
                                                        </div>
                                                    <?}?>
                                                    <div class="margin-t-10 sm-margin-t-0">
                                                        <p class="margin-b-5"><a target="_blank" href="<?=$val['DETAIL_PICTURE']['SRC']?>"><?=GetMessage("screenshot");?></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Work -->
                            </div>
                        <?}?>
                    </div>
                    <!-- End Masonry Grid -->
                </div>
            </div>
        </div>
    </div>
<?}?>