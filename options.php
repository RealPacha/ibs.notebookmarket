<?
    use Bitrix\Main\Localization\Loc;
    use Bitrix\Main\Config\Option;

    $module_id = 'ibs.notebookmarket';

    Loc::loadMessages(__FILE__);

    if($APPLICATION->GetGroupRight($module_id)<"S")
        $APPLICATION->AuthForm(Loc::getMessage("NOTEBOOK_MARKET_TAB_RIGHTS_ACCESS_DENIED"));

    Bitrix\Main\Loader::includeModule($module_id);

    $request = Bitrix\Main\HttpApplication::getInstance()->getContext()->getRequest();

    $aTabs = array(
        array(
            "DIV" => 'edit1',
            "TAB" => Loc::getMessage("NOTEBOOK_MARKET_TAB_RIGHTS"),
            "TITLE" => Loc::getMessage("NOTEBOOK_MARKET_TAB_TITLE_RIGHTS")
        ),
    );

    $tabControl = new CAdminTabControl('tabControl', $aTabs);

    $tabControl->Begin();
?>

<form method="post" action="<?=$APPLICATION->GetCurPage()?>?mid=<?=htmlspecialcharsbx($request['mid'])?>&amp;lang=<?=$request['lang']?>" name="ibs_notebookmarket_settings">
    
    <?$tabControl->BeginNextTab();?>

    <?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");?>

    <?$tabControl->Buttons();?>

    <input type="submit" name="Update" class="adm-btn-save" value="<?=Loc::getMessage("NOTEBOOK_MARKET_TAB_RIGHTS_BUTTON_SAVE")?>" />
    <input type="reset" name="reset" value="<?=Loc::getMessage("NOTEBOOK_MARKET_TAB_RIGHTS_BUTTON_RESET")?>" />
    <?=bitrix_sessid_post();?>
</form>
<?$tabControl->End();?>