<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

    use Bitrix\Main\Localization\Loc;
    
    Loc::loadMessages(__FILE__);

    $arComponentDescription = array(
        "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_NAME"),
        "DESCRIPTION" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_DESC"),
        "COMPLEX" => "Y",
        "PATH" => array(
            "ID" => "Тестовый компонент",
            "NAME" => Loc::getMessage("NOTEBOOK_MARKET_COMPONENT_NAME"),
        )
    );
?>