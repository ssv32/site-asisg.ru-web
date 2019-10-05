<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class Helpers{
    /**
    * getIdIBlockByCodeIBlock - получить ID инфоблока по его коду и закешировать на 24ч.
    * @param string $code - код инфоблока
    * @return int
    */
    function getIdIBlockByCodeIBlock($code){
        $result = false;
        if(!empty($code)) { // всё это надо делать если задан code
            $cacheID = 'getIdIBlockByCodeIBlock';
            $obCache = new CPHPCache();
            $cache_url = '/iblock/getIdIBlockByCodeIBlock';

            if ($obCache->InitCache(86400, $cacheID, $cache_url)) { // 24 ч.
                $ret = $obCache->GetVars();
            }

            // проверить есть ли значение в кеше если есть вернёт, иначе надо получить id и закешировать
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
                        $ret[$code] = $arr['ID']; // будет хранить несколько id сразу
                        $result = $ret[$code];

                        // очистить кеш и записать новое
                        $obCache->CleanDir();
                        $obCache->StartDataCache();
                        $obCache->EndDataCache($ret);
                    }
                }
            }
        }

      return $result;
    }

    // язык по умолчанию
    public static $lang = 'rus'; 
   
    // список всех поддерживаемых языков (можно сделать что бы брался из админки потом)
    // и соответствие стандартному коду языка с кодом используемым по этому сайту
    public static $arLangs = array( 
        'ru' => 'rus',
        'en' => 'eng'
    );

   /**
    * getLang() - получить текущий язык сайта
    * @return string (rus/eng)
    */
    function getLang(){
        $gLang = LANGUAGE_ID;
        $lang = self::$lang;
        if(!empty(self::$arLangs[$gLang])){
            $lang = self::$arLangs[$gLang];      
        }
        return $lang;
    }
    
    // title для страниц с разным языком
    public static $titleTextPage = array(
        'rus' => 'asisg.ru/web - Разработка и продвижение сайтов',
        'eng' => 'asisg.ru/web - Website development and promotion'
    ); 

}