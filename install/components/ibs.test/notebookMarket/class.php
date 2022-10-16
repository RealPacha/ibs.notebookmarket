<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use \Bitrix\Main\Localization\Loc;

class notebookMarket extends CBitrixComponent
{
    protected function checkModules()
    {
        if(!IsModuleInstalled("ibs.notebookMarket"))
        {
            ShowError(Loc::getMessage("NOTEBOOK_MARKET_MODULE_NOT_INSTALLED"));
            return false;
        }
        return true;
    }

    public function executeComponent()
    {
        $this->includeComponentLang('class.php');

        if($this->checkModules())
        {
            $this->includeComponentTemplate();
        }
    }
}

?>