<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arResult = array();

// получить пункты меню
if (!empty($arParams['LANG']) ){    
    $site = Site::getInstance();
    $arResult['ITEMS'] = $site->dataSiteBlocksOptions[$arParams['LANG']];
}

// получить языки
if (!empty(Helpers::$arLangs)){
    foreach (Helpers::$arLangs as $value) {
        $arResult['LANG'][$value] = array(
            'CODE' => $value,
            'URL' => (($value != Helpers::$lang)? '/'.$value.'/' : '/' ),
            'CHACKED' => (($arParams['LANG'] == $value)? 'Y' : 'N')
        );
    }
}

$this->IncludeComponentTemplate();