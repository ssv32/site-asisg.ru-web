<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
// установить title страници, для каждого языка свой
$APPLICATION->SetTitle( Helpers::$titleTextPage[Helpers::getLang()] );

// получить объект с настройками сайта
$site = Site::getInstance();

// поставить по порядку все блоки сайта в соответствии сортировки и тому как в меню
// настраивается и инфоблоке "Настройки блоков сайта"
//  по сути попорядку вызовутся компоненты body, about, work, contsct
foreach ($site->dataSiteBlocksOptions[Helpers::getLang()] as $value) {
    $APPLICATION->IncludeComponent(
        'asisg:'.$value['CODE'],
        '',
        array(
            'IBLOCK_ID' => Helpers::getIdIBlockByCodeIBlock($value['CODE']),
            'CACHE_TIME' => 604800,
            'LANG' => Helpers::getLang(),
            'TITLE' => $value['NAME']
        )
    );
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");

