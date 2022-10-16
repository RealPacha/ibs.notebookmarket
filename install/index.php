<?
  use Bitrix\Main\Localization\Loc;
  use Bitrix\Main\Loader;
  use Bitrix\Main\Entity\Base;
  use Bitrix\Main\Application;
  use Bitrix\Main\Config\Option;

  Loc::loadMessages(__FILE__);

  class ibs_notebookmarket extends CModule
  {
    function __construct()
    {
        $arModuleVersion = array();
        include(__DIR__.'/version.php');

        $this->MODULE_ID = 'ibs.notebookmarket';
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = Loc::getMessage("NOTEBOOK_MARKET_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("NOTEBOOK_MARKET_MODULE_DESC");

        $this->PARTNER_NAME = Loc::getMessage("NOTEBOOK_MARKET_PARTNER_NAME");
    }

    function GetPath($notDocumentRoot=false)
    {
        if($notDocumentRoot)
            return str_ireplace(Application::getDocumentRoot(), '', dirname(__DIR__));
        else
            return dirname(__DIR__);
    }

    function InstallFiles()
    {
        CopyDirFiles($this->GetPath()."/install/components", $_SERVER["DOCUMENT_ROOT"]."/local/components", true, true);

        return true;
    }

    function UnInstallFiles()
    {
        return true;
    }

    function InstallDB()
    {
        Loader::includeModule($this->MODULE_ID);

        if(!Application::getConnection(\Ibs\Notebookmarket\NotebookTable::getConnectionName())->isTableExists(Base::getInstance('Ibs\Notebookmarket\NotebookTable')->getDBTableName()))
            Base::getInstance('\Ibs\Notebookmarket\NotebookTable')->createDbTable();

        if(!Application::getConnection(\Ibs\Notebookmarket\ManufacturerTable::getConnectionName())->isTableExists(Base::getInstance('Ibs\Notebookmarket\ManufacturerTable')->getDBTableName()))
            Base::getInstance('\Ibs\Notebookmarket\ManufacturerTable')->createDbTable();

        if(!Application::getConnection(\Ibs\Notebookmarket\ModelTable::getConnectionName())->isTableExists(Base::getInstance('Ibs\Notebookmarket\ModelTable')->getDBTableName()))
            Base::getInstance('\Ibs\Notebookmarket\ModelTable')->createDbTable();

        if(!Application::getConnection(\Ibs\Notebookmarket\OptionMatrixTable::getConnectionName())->isTableExists(Base::getInstance('Ibs\Notebookmarket\OptionMatrixTable')->getDBTableName()))
            Base::getInstance('\Ibs\Notebookmarket\OptionMatrixTable')->createDbTable();

        if(!Application::getConnection(\Ibs\Notebookmarket\OptionMemoryTypeTable::getConnectionName())->isTableExists(Base::getInstance('Ibs\Notebookmarket\OptionMemoryTypeTable')->getDBTableName()))
            Base::getInstance('\Ibs\Notebookmarket\OptionMemoryTypeTable')->createDbTable();

        if(!Application::getConnection(\Ibs\Notebookmarket\OptionBatteryTypeTable::getConnectionName())->isTableExists(Base::getInstance('Ibs\Notebookmarket\OptionBatteryTypeTable')->getDBTableName()))
            Base::getInstance('\Ibs\Notebookmarket\OptionBatteryTypeTable')->createDbTable();
    }

    function UnInstallDB()
    {
        Loader::includeModule($this->MODULE_ID);

        Application::getConnection(\Ibs\Notebookmarket\NotebookTable::getConnectionName())->
            queryExecute('drop table if exists '.Base::getInstance('\Ibs\Notebookmarket\NotebookTable')->getDBTableName());

        Application::getConnection(\Ibs\Notebookmarket\ManufacturerTable::getConnectionName())->
            queryExecute('drop table if exists '.Base::getInstance('\Ibs\Notebookmarket\ManufacturerTable')->getDBTableName());

        Application::getConnection(\Ibs\Notebookmarket\ModelTable::getConnectionName())->
            queryExecute('drop table if exists '.Base::getInstance('\Ibs\Notebookmarket\ModelTable')->getDBTableName());

        Application::getConnection(\Ibs\Notebookmarket\OptionMatrixTable::getConnectionName())->
            queryExecute('drop table if exists '.Base::getInstance('\Ibs\Notebookmarket\OptionMatrixTable')->getDBTableName());

        Application::getConnection(\Ibs\Notebookmarket\OptionMemoryTypeTable::getConnectionName())->
            queryExecute('drop table if exists '.Base::getInstance('\Ibs\Notebookmarket\OptionMemoryTypeTable')->getDBTableName());

        Application::getConnection(\Ibs\Notebookmarket\OptionBatteryTypeTable::getConnectionName())->
            queryExecute('drop table if exists '.Base::getInstance('\Ibs\Notebookmarket\OptionBatteryTypeTable')->getDBTableName());
            
        Option::delete($this->MODULE_ID);
    }

    function DoInstall()
    {
        global $APPLICATION;

        include($this->GetPath().'../lib/notebook.php');
        include($this->GetPath().'../lib/manufacturer.php');
        include($this->GetPath().'../lib/model.php');
        include($this->GetPath().'../lib/optionmatrix.php');
        include($this->GetPath().'../lib/optionmemorytype.php');
        include($this->GetPath().'../lib/optionbatterytype.php');

        $request = Application::getInstance()->getContext()->getRequest();

        if($request["step"]<2)
        {
            $APPLICATION->IncludeAdminFile(Loc::getMessage("NOTEBOOK_MARKET_INSTALL_TITLE"), $this->GetPath()."/install/step1.php");
        }
        elseif($request["step"]==2)
        {
            if($request["deletedata"] == "Y")
                $this->UnInstallDB();

            $this->InstallDB();
            $this->InstallEvents();
            $this->installFiles();
            
            RegisterModule($this->MODULE_ID);

            $APPLICATION->IncludeAdminFile(Loc::getMessage("NOTEBOOK_MARKET_INSTALL_TITLE"), $this->GetPath()."/install/step2.php");
        }
    }

    function DoUninstall()
    {
        global $APPLICATION;

        $request = Application::getInstance()->getContext()->getRequest();

        if($request["step"]<2)
        {
            $APPLICATION->IncludeAdminFile(Loc::getMessage("NOTEBOOK_MARKET_UNINSTALL_TITLE"), $this->GetPath()."/install/unstep1.php");
        }
        elseif($request["step"]==2)
        {
            $this->UnInstallEvents();
            $this->UnInstallFiles();

            if($request["savedata"] != "Y")
                $this->UnInstallDB();

            UnRegisterModule($this->MODULE_ID);

            $APPLICATION->IncludeAdminFile(Loc::getMessage("NOTEBOOK_MARKET_UNINSTALL_TITLE"), $this->GetPath()."/install/unstep2.php");
        }
    }

    function GetModuleRightList()
    {
        return array(
            "reference_id" => array("D", "R", "S", "W"),
            "reference" => array(
                "[D] ".Loc::getMessage("NOTEBOOK_MARKET_RIGHT_DENIED"),
                "[R] ".Loc::getMessage("NOTEBOOK_MARKET_RIGHT_READ_COMPONENT"),
                "[S] ".Loc::getMessage("NOTEBOOK_MARKET_RIGHT_WRITE_SETTINGS"),
                "[W] ".Loc::getMessage("NOTEBOOK_MARKET_RIGHT_FULL"),
            )
        );
    }
  }
?>