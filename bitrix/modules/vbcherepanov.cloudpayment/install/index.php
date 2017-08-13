<?
global $MESS;
$PathInstall = str_replace("\\", "/", __FILE__);
$PathInstall = substr($PathInstall, 0, strlen($PathInstall) - strlen("/index.php"));
IncludeModuleLangFile($PathInstall . "/install.php");

if(class_exists("vbcherepanov_cloudpayment")) return;

class vbcherepanov_cloudpayment extends CModule
{
	var $MODULE_ID = "vbcherepanov.cloudpayment";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_GROUP_RIGHTS = "Y";
	
	function __construct()
	{
		$arModuleVersion = array();
		include(dirname(__FILE__)."/version.php");
		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		$this->MODULE_NAME = GetMessage("vbcherepanov.cloudpayment_MODULE_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("vbcherepanov.cloudpayment_MODULE_DESC");
		$this->PARTNER_NAME = GetMessage("vbcherepanov.cloudpayment_PARTNER_NAME");
		$this->PARTNER_URI = GetMessage("vbcherepanov.cloudpayment_PARTNER_URI");
	}
  
	function DoInstall()
	{	
		$this->InstallFiles();
		RegisterModule($this->MODULE_ID);
		return true;
	}

	function InstallDB()
	{
	
		return true;
	}

	function InstallFiles($arParams = array())
	{
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/tools", $_SERVER["DOCUMENT_ROOT"]."/bitrix/tools",true,true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/sale/payment",  $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/sale/payment",true,true);
		return true;
	}
	function UnInstallFiles()
	{
		DeleteDirFilesEx('/bitrix/tools/'.$this->MODULE_ID."/");
		DeleteDirFilesEx('/bitrix/modules/sale/payment/cloudpayments/');
		
		return true;
	}

	function DoUninstall()
	{	
		$this->UnInstallDB();
		$this->UnInstallFiles();
		UnRegisterModule($this->MODULE_ID);
		return true;
	}
	function UnInstallDB()
	{	
		return true;
	}
}?>