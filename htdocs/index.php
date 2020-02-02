<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
// установить title страници, для каждого языка свой
$APPLICATION->SetTitle( Helpers::$titleTextPage[Helpers::getLang()] );

// получить объект с настройками сайта
$site = Site::getInstance();

global $arrFilter;
$arrFilter = array(
    '=PROPERTY_LANG' => Helpers::getLang(),
    '=ACTIVE' => 'Y'
);

// поставить по порядку все блоки сайта в соответствии сортировки и тому как в меню
// настраивается и инфоблоке "Настройки блоков сайта"
//  по сути попорядку вызовутся компоненты body, about, work, contsct
foreach ($site->dataSiteBlocksOptions[Helpers::getLang()] as $value) {

    $APPLICATION->IncludeComponent(
        'bitrix:news.list',
        $value['CODE'],
        array(
            'IBLOCK_ID' => Helpers::getIdIBlockByCodeIBlock($value['CODE']),
            'CACHE_TIME' => 604800,
            'CACHE_TYPE' => 'Y',
            'TITLE' => $value['NAME'],
            'FILTER_NAME' => 'arrFilter',
            'PROPERTY_CODE' => array(
                '*',
            ),
            'FIELD_CODE' => array(
                '*'
            )
        ),
        false
    );
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");

