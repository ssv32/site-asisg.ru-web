<?
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("asisg.ru - Разработка и поддержка сайтов | 404 - страница не найдена");
?>

<div id="about">
    <div class="container content-lg">
        <?if(Helpers::getLang() == 'ru'){?>
            <h1>404 - Страница не найдена</h1>
            <p>Странно искать страницы на одностраничном сайте О_о, но попытка не пытка).</p>
            <a href="/">На гавную</a>
        <?}else{?>
            <h1>404 - Page not found</h1>
            <p>This is definitely not such a page.</p>
            <a href="/en/">Index page</a>
        <?}?>
    </div>
</div>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");

