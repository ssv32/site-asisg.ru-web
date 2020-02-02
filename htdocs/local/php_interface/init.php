<?
use \Bitrix\Main\Application;
use \Bitrix\Main\Loader;

// автоподключение классов (auto connect classes)
Loader::registerAutoLoadClasses(null,
    array(
        'Helpers' => '/local/class/Helpers.php',
        'Site' => '/local/class/Site.php',   
    )
);

// инициализация объекста класса Site (initialization of an object of class Site)
Site::setIdBlock( 
    Helpers::getIdIBlockByCodeIBlock( Site::$iblockCodeOptionsBlockSite ) // определит id инфоблока (will determine the info block id)
);
$site = Site::getInstance();
