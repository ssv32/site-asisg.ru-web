<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!empty($arParams['IBLOCK_ID']) && !empty($arParams['CACHE_TIME']) && !empty($arParams['LANG']) ){    

    $cacheID = 'work_'.$arParams['LANG'];
    $cachePath = "/work_".$arParams['LANG']."/";
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
                'ID', 'NAME', 'CODE', 'PROPERTY_URL_SITE', 'PROPERTY_LANG', 
                'DETAIL_TEXT', 'DETAIL_PICTURE', 'PREVIEW_PICTURE',
                'PROPERTY_URL_GITHUB', 'PROPERTY_CUSTOM_TEXT_HTML',
                'PROPERTY_CMS'
            )
        );

        while($arRes = $res->Fetch()){ 

            $data = array(
                'TITLE' => $arRes['NAME'],
                'DETAIL_TEXT' => $arRes['DETAIL_TEXT'],
                'URL' => $arRes['PROPERTY_URL_SITE_VALUE'],
                'URL_GITHUB' => $arRes['PROPERTY_URL_GITHUB_VALUE'],
                'CUSTOM_TEXT_HTML' => $arRes['PROPERTY_CUSTOM_TEXT_HTML_VALUE'],
                'CMS' => $arRes['PROPERTY_CMS_VALUE'],
            );

            if(!empty($arRes['DETAIL_PICTURE'])){
                $data['IMAGE2'] = CFile::GetPath($arRes['DETAIL_PICTURE']);
            }

            if(!empty($arRes['PREVIEW_PICTURE'])){
                $data['IMAGE'] = CFile::GetPath($arRes['PREVIEW_PICTURE']);
            }

            $arResult['ITEMS'][] = $data;

        }

        $obCache->EndDataCache($arResult);
    }
}

$this->IncludeComponentTemplate();