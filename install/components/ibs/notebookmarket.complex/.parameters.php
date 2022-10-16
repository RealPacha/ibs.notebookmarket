<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

    use Bitrix\Main\Localization\Loc;
    
    Loc::loadMessages(__FILE__);

    $arSortFields = array(
        "ID" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_ID_NAME"),
        "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_NAME_NAME"),
        "ACTIVE_FROM" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_ACTIVE_FROM_NAME"),
        "SORT" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_SORT_NAME"),
        "TIMESTAMP_X" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_TIMESTAMP_X_NAME"),
    );

    $arComponentParameters = array(
        "GROUP" => array(),
        "PARAMETERS" => array(
            "VARIABLE_ALIASES" => array(
                "ELEMENT_ID" => array("NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_ELEMENT_ID_NAME")),
            ),
            "SEF_MODE" => array(
                "manufacturer" => array(
                    "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_MANUFACTURER_NAME"),
                    "DEFAULT" => "#SEF_FOLDER#/",
                    "VARIABLES" => array(),
                ),
                "brand" => array(
                    "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_BRAND_NAME"),
                    "DEFAULT" => "#SEF_FOLDER#/#BRAND#/",
                    "VARIABLES" => array(),
                ),
                "model" => array(
                    "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_MODEL_NAME"),
                    "DEFAULT" => "#SEF_FOLDER#/#BRAND#/#MODEL#/",
                    "VARIABLES" => array(),
                ),
                "detail" => array(
                    "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_DETAIL_NAME"),
                    "DEFAULT" => "#SEF_FOLDER#/detail/#NOTEBOOK#/",
                    "VARIABLES" => array(),
                ),
            ),
            "IBLOCK_TYPE" => array(
                "PARENT" => "BASE",
                "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_IBLOCK_TYPE_NAME"),
                "TYPE" => "LIST",
                "VALUES" => $arIBlockType,
                "REFRESH" => "Y",
            ),
            "IBLOCK_ID" => array(
                "PARENT" => "BASE",
                "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_IBLOCK_ID_NAME"),
                "TYPE" => "LIST",
                "VALUES" => $arIBlock,
                "REFRESH" => "Y",
                "ADDITIONAL_VALUES" => "Y",
            ),
            "SORT_BY1" => array(
                "PARENT" => "DATA_SOURCE",
                "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_SORT_BY_NAME"),
                "TYPE" => "LIST",
                "VALUES" => $arSortFields,
                "ADDITIONAL_VALUES" => "Y",
            ),
            "SORT_ORDER1" => array(
                "PARENT" => "DATA_SOURCE",
                "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_SORT_ORDER_NAME"),
                "TYPE" => "LIST",
                "DEFAULT" => "DESC",
                "VALUES" => $arSorts,
                "ADDITIONAL_VALUES" => "Y",
            ),
            "CACHE_TIME" => array("DEFAULT" => 36000000),
            "CACHE_FILTER" => array(
                "PARENT" => "CACHE_SETTINGS",
                "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_CACHE_FILTER_NAME"),
                "TYPE" => "LIST",
                "DEFAULT" => "Y",
            ),
            "CACHE_GROUPS" => array(
                "PARENT" => "CACHE_SETTINGS",
                "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_PARAMETERS_CACHE_GROUPS_NAME"),
                "TYPE" => "CHECKBOX",
                "DEFAULT" => "Y",
            ),
        )
    )
?>