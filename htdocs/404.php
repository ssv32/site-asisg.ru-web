<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("asisg.ru/web - Разработка и продвижение сайтов | 404 - страница не найдена");

// получить объект с настройками сайта
$site = Site::getInstance();

$APPLICATION->IncludeComponent(
    'asisg:body',
    '',
    array(
        'IBLOCK_ID' => Helpers::getIdIBlockByCodeIBlock('body'),
        'CACHE_TIME' => 604800,
        'LANG' => Helpers::getLang(),
        'TITLE' => $site->dataSiteBlocksOptions[Helpers::getLang()]['body']
    )
);?>

<div id="about">
    <div class="container content-lg">
        <?if(Helpers::getLang() == 'rus'){?>
            <h1>404 - Страница не найдена</h1>
            <p>Странно искать страницы на одностраничном сайте О_о, но попытка не пытка).</p>
        <?}else{?>
            <h1>404 - Page not found</h1>
            <p>This is definitely not such a page.</p>
        <?}?>
    </div>
</div>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");

