<?
#################################
#   Developer: Lynnik Danil     #
#   Site: http://bxmod.ru       #
#   E-mail: support@bxmod.ru    #
#################################

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

// ��� ������ ��������� �� ��������
if ( !CModule::IncludeModule("bxmod.auth") ) return false;

if ( !function_exists("bxmodAuthResponse") )
{
    /**
    * ������� �������������� ������ ������ ��� �������� ���� ������� � ����� ����� ��� ������ Ajax`��. ������ ����� � ������ � ���� ��������������� �����
    * 
    * @param array $response ����� ������ �����������
    * @param array $replace ������ ������������� ����� ������ � ����� �����
    */
    function bxmodAuthResponse ( $response, $replace = Array() )
    {
        global $APPLICATION;
        
        $APPLICATION->RestartBuffer();
        
        if ( $response["TYPE"] == "Error" && !empty( $replace ) && $response["FIELD"] )
        {
            foreach ( $replace AS $k=>$v )
            {
                $response["FIELD"] = str_replace($k, $v, $response["FIELD"]);
            }
            
            die("{$response["FIELD"]}[Error]:{$response["DESC"]}");
        }

        die( $response["TYPE"] );
    }
}

$arResult = Array();

// ������� ������������� �����������
$arParams["LOGIN_FORM"] = true;
// ��������� ������� ����� �����������, �����������, ��������������. RELOAD - ������������� ��������, AJAX - ���������� ���� ������������, ������ ������ �����������
$arParams["SUCCESS_TYPE"] = $arParams["SUCCESS_TYPE"] == "RELOAD" ? "RELOAD" : "AJAX";
// ����� ������ ��������� ����� �����������, �����������, ��������������
$arParams["SUCCESS_RELOAD_TIME"] = intval( $arParams["SUCCESS_RELOAD_TIME"] ) ? intval($arParams["SUCCESS_RELOAD_TIME"]) : 5;

// ���� ������������ ��� �����������
if( $USER->IsAuthorized() )
{
    // ������� ������������� �����������
    $arParams["LOGIN_FORM"] = false;
    // ������ ��� ������ (logout)
    $arResult["LOGOUT_LINK"] = $APPLICATION->GetCurPageParam("logout=yes", Array( "logout" ) );
    
    $arResult["USER_LOGIN"] = $USER->GetFullName();
    if ( !$arResult["USER_LOGIN"] ) $arResult["USER_LOGIN"] = $USER->GetLogin();
    if ( !$arResult["USER_LOGIN"] ) $arResult["USER_LOGIN"] = $USER->GetEmail();
}
// ���� ������������ ��� �� �����������
else
{
    // ��� ��������� ������ �����������
    $arParams["OPTIONS"] = BxmodAuth::GetOptions();
    
    // �������� ��������� �������� USER_CHECKWORD ��� �������������� �������
    $arParams["GET_RESTORE_CHECKWORD"] = $arParams["OPTIONS"]["GET_RESTORE_CHECKWORD"] ? $arParams["OPTIONS"]["GET_RESTORE_CHECKWORD"] : "USER_CHECKWORD";
    // �������� ��������� �������� USER_ID ��� �������������� �������
    $arParams["GET_RESTORE_USER_ID"] = $arParams["OPTIONS"]["GET_RESTORE_USER_ID"] ? $arParams["OPTIONS"]["GET_RESTORE_USER_ID"] : "USER_ID";
    // �������� ��������� �������� USER_ID ��� ������������� �����������
    $arParams["GET_CONFIRM_USER_ID"] = $arParams["OPTIONS"]["GET_CONFIRM_USER_ID"] ? $arParams["OPTIONS"]["GET_CONFIRM_USER_ID"] : "confirm_user_id";
    // �������� ��������� �������� CONFIRM_CODE ��� ������������� �����������
    $arParams["GET_CONFIRM_CODE"] = $arParams["OPTIONS"]["GET_CONFIRM_CODE"] ? $arParams["OPTIONS"]["GET_CONFIRM_CODE"] : "confirm_code";
    // ����� �������� ��� �� ������������
    $arParams["DOCUMENT_LOCATION"] = $APPLICATION->GetCurPageParam(false, Array("logout", $arParams["GET_RESTORE_CHECKWORD"], $arParams["GET_RESTORE_USER_ID"], $arParams["GET_CONFIRM_USER_ID"], $arParams["GET_CONFIRM_CODE"]));
    
    // ���������� jQuery
    CJSCore::Init(array("jquery"));
    
    // ������ ��� �����������
    if ( $arParams["OPTIONS"]["EMAIL_CAPTCHA"] == "Y" )
    {
        $arResult["CAPTCHA_LOGIN_CODE"] = $APPLICATION->CaptchaGetCode();
    }
    
    // ������ ��� ��������������
    if ( $arParams["OPTIONS"]["EMAIL_RESTORE_CAPTCHA"] == "Y" )
    {
        $arResult["CAPTCHA_RESTORE_CODE"] = $APPLICATION->CaptchaGetCode();
    }
    
    // ���� � ����� ���� ����� ������������
    $arResult["~USER_LOGIN"] = $_COOKIE[COption::GetOptionString("main", "cookie_name", "BITRIX_SM")."_LOGIN"];
    $arResult["USER_LOGIN"] = htmlspecialcharsbx($arResult["~USER_LOGIN"]);
    // ���� � ����� �� ���� � �� �������, �� �������� �������� ������������ � ����� �������
    // ��� ������� ��� ����, ��� �� � ���� e-mail ����������� ������ e-mail ������������, � �� ��� �����
    if ( $arResult["USER_LOGIN"] && (
        substr($arResult["USER_LOGIN"], 0, 2) == "G_" ||
        substr($arResult["USER_LOGIN"], 0, 3) == "MM_" ||
        substr($arResult["USER_LOGIN"], 0, 3) == "FB_" ||
        !$loginType = BxmodAuth::CheckLoginType( $arResult["USER_LOGIN"] ) ) )
    {
        $rsUser = CUser::GetByLogin( $arResult["USER_LOGIN"] );
        if ( $arUser = $rsUser->Fetch() )
        {
            $arResult["USER_LOGIN"] = htmlspecialcharsbx($arUser["EMAIL"]);
        }
    }
    
    // ��������� ��� ����� ���������� �������
    if ( $arParams["OPTIONS"]["USE_SOCIAL"] == "Y" )
    {
        $arResult["AUTH_SERVICES"] = BxmodAuth::GetSocList();
    }
    
    // ������������ ������ �� ������ ������������� ����������� �� email
    if ( isset( $_GET[$arParams["GET_CONFIRM_USER_ID"]] ) && isset( $_GET[$arParams["GET_CONFIRM_CODE"]] ) && !defined("BXMOD_AUTH_OPEN_DIALOG") )
    {
        // ��������� ����������� ��� ����, ��� �� �� ������������ ������ ������� �����������, ���� �� ��������� �� ��������
        define("BXMOD_AUTH_OPEN_DIALOG", true);
        
        $arResult["CONFIRM_EMAIL"] = Array(
            "SUCCESS" => "N"
        );
        
        // �������� ����������� �����������
        $regResult = BxmodAuth::Confirm( false, $_GET[$arParams["GET_CONFIRM_CODE"]], $_GET[ $arParams["GET_CONFIRM_USER_ID"] ] );
        if ( $regResult["TYPE"] == "Register" )
        {
            $arResult["CONFIRM_EMAIL"]["SUCCESS"] = "Y";
        }
    }
    // ������������ ������� �� ������ �������������� ������
    elseif ( isset( $_GET[ $arParams["GET_RESTORE_CHECKWORD"] ] ) && isset( $_GET[ $arParams["GET_RESTORE_USER_ID"] ] ) && !defined("BXMOD_AUTH_OPEN_DIALOG") )
    {
        // ��������� ����������� ��� ����, ��� �� �� ������������ ������ ������� �����������, ���� �� ��������� �� ��������
        define("BXMOD_AUTH_OPEN_DIALOG", true);
        
        // ���� ������������ � ��
        $rsUser = CUser::GetByID( $_GET[ $arParams["GET_RESTORE_USER_ID"] ] );
        
        // ���� ������������ ������
        if ( $arUser = $rsUser->Fetch() )
        {
            // ������ ��� �������� ������� ����������� � �������������� ������
            $arResult["RESTORE_PASS"] = Array(
                // ����� ������������
                "LOGIN" => $arUser["LOGIN"],
                // ��� ������ ������������
                "LOGIN_TYPE" => BxmodAuth::CheckLoginType( $arUser["LOGIN"] ),
                // ��� ������������� �������������� �������
                "CHECKWORD" => isset( $_GET[ $arParams["GET_RESTORE_CHECKWORD"] ] ) ? htmlspecialchars( $_GET[ $arParams["GET_RESTORE_CHECKWORD"] ], ENT_QUOTES ) : ""
            );
        }
    }
    
    // ����������� / �����������
    if ( isset( $_POST["bxmodAuthEmail"] ) )
    {
        $result = BxmodAuth::Login (
            $_POST["bxmodAuthEmail"],
            $_POST["bxmodAuthPass"],
            isset( $_POST["bxmodAuthCaptcha"] ) ? $_POST["bxmodAuthCaptcha"] : false,
            isset( $_POST["bxmodAuthCaptchaSid"] ) ? $_POST["bxmodAuthCaptchaSid"] : false,
            isset( $_POST["bxmodAuthRemember"] )
        );
        
        bxmodAuthResponse( $result, Array("login" => "bxmodAuthEmail", "password" => "bxmodAuthPass", "captcha" => "bxmodAuthCaptcha") );
    }
    // ������������� email / ������ ��������
    elseif ( isset( $_POST["bxmodAuthConfirmCode"] ) )
    {
        $result = BxmodAuth::Confirm (
            $_POST["bxmodAuthConfirmLogin"],
            $_POST["bxmodAuthConfirmCode"]
        );
        
        bxmodAuthResponse( $result, Array( "confirm_code" => "bxmodAuthConfirmCode" ) );
    }
    // ������ �������������� �������
    elseif ( isset( $_POST["bxmodAuthRestoreEmail"] ) )
    {
        $result = BxmodAuth::InitRestore (
            $_POST["bxmodAuthRestoreEmail"],
            isset( $_POST["bxmodAuthRestoreCaptcha"] ) ? $_POST["bxmodAuthRestoreCaptcha"] : false,
            isset( $_POST["bxmodAuthRestoreCaptchaSid"] ) ? $_POST["bxmodAuthRestoreCaptchaSid"] : false
        );
        
        bxmodAuthResponse( $result, Array( "login" => "bxmodAuthRestoreEmail", "captcha" => "bxmodAuthRestoreCaptcha" ) );
    }
    // ����� ������
    elseif ( isset( $_POST["bxmodAuthRestoreCode"] ) )
    {
        $result = BxmodAuth::Restore (
            $_POST["bxmodAuthRestoreLogin"],
            $_POST["bxmodAuthRestoreCode"],
            $_POST["bxmodAuthRestorePassword"],
            $_POST["bxmodAuthRestoreRePassword"]
        );
        
        bxmodAuthResponse( $result, Array( "restore_code" => "bxmodAuthRestoreCode", "password" => "bxmodAuthRestorePassword" ) );
    }
    // ���������� ������
    elseif ( isset( $_GET['reCaptcha'] ) )
    {
        $APPLICATION->RestartBuffer();
        die( $APPLICATION->CaptchaGetCode() );
    }
}

$this->IncludeComponentTemplate();
?>