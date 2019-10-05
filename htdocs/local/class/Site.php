<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/**
 * class Site - тут будут настройки сайта (настройки блоков сайта и прочее)
 * (будет реализоват синглтон)
 */
class Site{
    
    // id инфоблока с настройками блоков сайта
    private static $iblockIdOptionsBlockSite;
    
    // code инфоблока с настройками блоков сайта
    public static $iblockCodeOptionsBlockSite = 'options';
    
    // объект класса Site
    private static $thisObject;
    
    // данные из инфоблока с настройками блоков сайта
    public $dataSiteBlocksOptions;
    
    /**
     * getInstance() - получить объект текущего класса
     * @return object class Site
     */
    public function getInstance(){
        if (self::$thisObject === null) {
            if(!empty(self::$iblockIdOptionsBlockSite)){
                self::$thisObject = new self();            
            }else{
                echo('! not init class "Site", not data');
            }
        }
        return self::$thisObject;
    }
    
    private function __construct(){
        $this->dataSiteBlocksOptions = $this->getOptionsBlocksSite();
    }
    
    /**
     * setIdBlock() - установить id инфоблока с настройками блоков сайта
     * @param int $iblockIdOptionsBlockSite - id инфоблока
     */
    public static function setIdBlock($iblockIdOptionsBlockSite){
        if(self::$thisObject === null){
            self::$iblockIdOptionsBlockSite = $iblockIdOptionsBlockSite;
        }
    }
    
    /**
     * getOptionsBlocksSite() - получить настройки блоков сайта 
     * @return type
     */
    private function getOptionsBlocksSite(){
        $arResult = array();
             
        $cacheId = 'getOptionsBlocksSite';
        $obCache = new CPHPCache();
        $cacheUrl = '/getOptionsBlocksSite/';

        if ($obCache->InitCache(604800, $cacheId, $cacheUrl)) { 
           $arResult = $obCache->GetVars();
        }elseif ($obCache->StartDataCache()) { 
        
            CModule::IncludeModule("iblock");
            $res = CIBlockElement::GetList(
                array('sort' => 'asc'),
                array(
                    'IBLOCK_ID' => self::$iblockIdOptionsBlockSite,
                    'ACTIVE' => 'Y'
                ),
                false,
                false,
                array(
                    'ID', 'NAME', 'CODE', 'PROPERTY_LANG'
                )
            );

            while($arRes = $res->Fetch()){
                $arResult[$arRes['PROPERTY_LANG_VALUE']][$arRes['CODE']] = $arRes; 
            }
        
            $obCache->EndDataCache($arResult);	
        }
        
        return $arResult;
    }
    
    
}

