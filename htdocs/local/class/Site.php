<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/**
 * class Site 
 * - тут будут настройки сайта (настройки блоков сайта и прочее)
 *  (there will be site settings (site block settings, etc.))
 * 
 * (будет реализоват синглтон)
 * (will realize singleton)
 */
class Site{
    
    // id инфоблока с настройками блоков сайта (info block id with site block settings)
    private static $iblockIdOptionsBlockSite;
    
    // code инфоблока с настройками блоков сайта (information block code with site block settings)
    public static $iblockCodeOptionsBlockSite = 'options';
    
    // объект класса Site (Site object)
    private static $thisObject;
    
    // данные из инфоблока с настройками блоков сайта (data from the infoblock with site block settings)
    public $dataSiteBlocksOptions;
    
    /**
     * getInstance() 
     * - получить объект текущего класса
     *  (get the object of the current class)
     * 
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
     * setIdBlock() 
     *  - установить id инфоблока с настройками блоков сайта
     *  (set the id of the infoblock with the settings of the site blocks)
     * 
     * @param int $iblockIdOptionsBlockSite - id инфоблока (id infoblock)
     */
    public static function setIdBlock($iblockIdOptionsBlockSite){
        if(self::$thisObject === null){
            self::$iblockIdOptionsBlockSite = $iblockIdOptionsBlockSite;
        }
    }
    
    /**
     * getOptionsBlocksSite() 
     * - получить настройки блоков сайта 
     * (get site block settings)
     * 
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

