<?
use \Bitrix\Main\Application;
use \Bitrix\Main\Loader;

//автоподключение классов
Loader::registerAutoLoadClasses(null,
    array(
        'Helpers' => '/local/class/Helpers.php',
        'Site' => '/local/class/Site.php',   
    )
);

// инициализация объекста класса Site 
Site::setIdBlock( 
    Helpers::getIdIBlockByCodeIBlock( Site::$iblockCodeOptionsBlockSite ) // определит id инфоблока
);
$site = Site::getInstance();
