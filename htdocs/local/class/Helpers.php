<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class Helpers{
    /**
    * getIdIBlockByCodeIBlock 
    * - получить ID инфоблока по его коду и закешировать на 24ч.
    *  (get the info block ID by its code and cache for 24 hours.)
    * 
    * @param string $code - код инфоблока (code infoblock)
    * @return int
    */
    function getIdIBlockByCodeIBlock($code){
        $result = false;
        if(!empty($code)) { 
            $cacheID = 'getIdIBlockByCodeIBlock';
            $obCache = new CPHPCache();
            $cache_url = '/iblock/getIdIBlockByCodeIBlock';

            if ($obCache->InitCache(86400, $cacheID, $cache_url)) { // 24 ч.
                $ret = $obCache->GetVars();
            }

            if (isset($ret[$code])) { 
                $result = $ret[$code];
            } else {
                CModule::IncludeModule("iblock");
                $db = CIBlock::GetList(
                    array('ID' => 'ASC'),
                    array(
                        '=CODE' => $code,
                    )
                );
                if ($arr = $db->Fetch()) {
                    if ($arr['CODE'] == $code) {
                        $ret[$code] = $arr['ID']; // будет хранить несколько id сразу (will store multiple id at once)
                        $result = $ret[$code];

                        // очистить кеш и записать новое (clear cache and write new)
                        $obCache->CleanDir();
                        $obCache->StartDataCache();
                        $obCache->EndDataCache($ret);
                    }
                }
            }
        }

      return $result;
    }

    // язык по умолчанию (default language)
    public static $lang = 'ru'; 
   
    // список всех поддерживаемых языков (list of all supported languages)
    public static $arLangs = array( 
        'ru' => 'ru',
        'en' => 'en'
    );

   /**
    * getLang() 
    *  - получить текущий язык сайта
    *  (get current site language)
    * 
    * @return string (ru/en)
    */
    public static function getLang(){
        return LANGUAGE_ID;
    }
    
    /**
     * getLangUrlByUrl
     *  - получить url с учётом языка
     *  (get url based on language)
     * 
     * @param string $url
     * @return string
     */
    public static function getLangUrlByUrl($url){
        return ((self::getLang() != 'ru')? '/'.self::getLang() :'').$url;
    }
    
    // title для страниц с разным языком (title for pages with different languages)
    public static $titleTextPage = array(
        'ru' => 'asisg.ru - Разработка и поддержка сайтов',
        'en' => 'asisg.ru - Website development and support'
    ); 

}