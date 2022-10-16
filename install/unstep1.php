<?
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>

<form action="<?=$APPLICATION->GetCurPage();?>" name="formuninstall1">
    <?=bitrix_sessid_post();?>
    <input type="hidden" name="lang" value="<?=LANGUAGE_ID?>"/>
    <input type="hidden" name="id" value="ibs.notebookmarket"/>
    <input type="hidden" name="uninstall" value="Y"/>
    <input type="hidden" name="step" value="2"/>
    <?=CAdminMessage::ShowMessage(Loc::getMessage("NOTEBOOK_MARKET_UNINSTALL_WARNING"));?>
    <p><?=Loc::getMessage("NOTEBOOK_MARKET_UNINSTALL_SAVE_DATA");?></p>
    <p>
        <input type="checkbox" name="savedata" id="savedata" value="Y" checked />
        <label for="savedata"><?=Loc::getMessage("NOTEBOOK_MARKET_UNINSTALL_SAVE_TABLES");?></label>
    </p>
    <input type="submit" name="delete" value="<?=Loc::getMessage("NOTEBOOK_MARKET_UNINSTALL_DELETE_MODULE")?>" />
</form>