<?
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if($exception = $APPLICATION->GetException())
    echo CAdminMessage::ShowMessage(array(
        "TYPE" => "ERROR",
        "MESSAGE" => Loc::getMessage("NOTEBOOK_MARKET_UNINSTALL_ERROR"),
        "DETAILS" => $exception->GetString(),
        "HTML" => true,
    ));
else
    echo CAdminMessage::ShowNote(Loc::getMessage("NOTEBOOK_MARKET_UNINSTALL_OK"));
?>

<form action="<?=$APPLICATION->GetCurPage();?>" name="formuninstall2">
    <?=bitrix_sessid_post();?>
    <input type="hidden" name="lang" value="<?=LANGUAGE_ID?>" />
    <input type="submit" name="backToList" value="<?=Loc::getMessage("NOTEBOOK_MARKET_BACK_TO_LIST");?>" />
</form>