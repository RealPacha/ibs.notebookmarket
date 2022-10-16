<?
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>

<form action="<?=$APPLICATION->GetCurPage();?>" name="forminstall1">
    <?=bitrix_sessid_post();?>
    <input type="hidden" name="lang" value="<?=LANGUAGE_ID?>"/>
    <input type="hidden" name="id" value="ibs.notebookmarket"/>
    <input type="hidden" name="install" value="Y"/>
    <input type="hidden" name="step" value="2"/>
    <?=CAdminMessage::ShowMessage(Loc::getMessage("NOTEBOOK_MARKET_INSTALL_WARNING"));?>
    <p><?=Loc::getMessage("NOTEBOOK_MARKET_INSTALL_DELETE_DATA");?></p>
    <p>
        <input type="checkbox" name="deletedata" id="deletedata" value="Y" checked />
        <label for="deletedata"><?=Loc::getMessage("NOTEBOOK_MARKET_INSTALL_DELETE_DATA_INFO");?></label>
    </p>
    <input type="submit" name="setup" value="<?=Loc::getMessage("NOTEBOOK_MARKET_INSTALL_INSTALL")?>" />
</form>