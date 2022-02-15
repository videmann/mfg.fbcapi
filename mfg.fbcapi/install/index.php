<?

IncludeModuleLangFile(__FILE__);
use \Bitrix\Main\ModuleManager;

Class MFG_FbCApi extends CModule
{

    var $MODULE_ID = "mfg.fbcapi";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $PARTNER_NAME = "Melon Fashion Group";
    var $PARTNER_URI = "https://www.melonfashion.ru/";
    var $errors;

    function __construct()
    {
        //$arModuleVersion = array();
        $this->MODULE_VERSION = "0.0.1";
        $this->MODULE_VERSION_DATE = "15.02.2022";
        $this->MODULE_NAME = "Facebook Conversion Api";
        $this->MODULE_DESCRIPTION = "The Conversions API creates a connection between an advertiser’s marketing data and the Meta systems that optimize ad targeting, decrease cost per action and measure results. In the case of direct integrations, this entails establishing a connection between an advertiser’s server and Meta.";
    }

    function DoInstall()
    {
        $this->InstallDB();
        $this->InstallEvents();
        $this->InstallFiles();
        \Bitrix\Main\ModuleManager::RegisterModule($this->MODULE_ID);
        return true;
    }

    function DoUninstall()
    {
        $this->UnInstallDB();
        $this->UnInstallEvents();
        $this->UnInstallFiles();
        \Bitrix\Main\ModuleManager::UnRegisterModule($this->MODULE_ID);
        return true;
    }

    function InstallDB()
    {
        return true;
    }

    function UnInstallDB()
    {
        return true;
    }

    function InstallEvents()
    {
        return true;
    }

    function UnInstallEvents()
    {
        return true;
    }

    function InstallFiles()
    {
        return true;
    }

    function UnInstallFiles()
    {
        return true;
    }
}