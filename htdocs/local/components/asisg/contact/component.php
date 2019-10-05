<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!empty($arParams['IBLOCK_ID']) && !empty($arParams['CACHE_TIME']) && !empty($arParams['LANG']) ){    
    
    $cacheID = 'slider'.$arParams['LANG'];
    $cachePath = "/slider/";
    $obCache = new CPHPCache();

    if ($obCache->InitCache($arParams['CACHE_TIME'], $cacheID, $cachePath)) {
        $arResult = $obCache->GetVars(); 
    } elseif ($obCache->StartDataCache()) { 
        CModule::IncludeModule('iblock');

        $res = CIBlockElement::GetList(
            array('sort'=>'asc'),
            array(
                'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                'ACTIVE' => 'Y',
                'PROPERTY_LANG' => $arParams['LANG']
            ),
            false,
            false,
            array(
                'ID', 'NAME', 'CODE', 'PROPERTY_VAL', 'PROPERTY_LANG'
            )
        );

        while($arRes = $res->Fetch()){            
            $arResult['ITEMS'][] = array(
                'TITLE' => $arRes['NAME'],
                'TEXT' => $arRes['PROPERTY_VAL_VALUE']
            );
        }
        
        $obCache->EndDataCache($arResult);
    }
}

$this->IncludeComponentTemplate();

