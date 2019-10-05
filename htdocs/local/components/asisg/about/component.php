<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arResult = array();

if (!empty($arParams['IBLOCK_ID']) && !empty($arParams['CACHE_TIME']) && !empty($arParams['LANG']) ){    
    
    $cacheID = 'about'.$arParams['LANG'];
    $cachePath = "/about/";
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
                'ID', 'NAME', 'CODE', 'PREVIEW_TEXT', 'PROPERTY_LANG'
            )
        );

        if($arRes = $res->Fetch()){  
            $arResult['TITLE'] = $arRes['NAME'];
            $arResult['TEXT'] = $arRes['PREVIEW_TEXT'];
        }
        
        $obCache->EndDataCache($arResult);
    }	
}

$this->IncludeComponentTemplate();