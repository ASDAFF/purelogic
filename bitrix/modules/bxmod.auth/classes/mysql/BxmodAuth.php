<?php
#################################
#   Developer: Lynnik Danil     #
#   Site: http://bxmod.ru       #
#   E-mail: support@bxmod.ru    #
#################################

IncludeModuleLangFile(__FILE__);

class BxmodAuth
{
    /**
    * Возвращает список активных соц.сервисов для авторизации
    */
    public function GetSocList()
    {
        global $APPLICATION;
        
        $result = Array();
        
        $options = self::GetOptions();
        
        // Запоминаем страницу вызова метода в сессию.
        // Это необходимо для успешного редиректа пользователя после авторизации через социальные сервисы
        if ( is_object( $APPLICATION ) ) {
            $_SESSION["BXMOD_AUTH_LAST_PAGE"] = $APPLICATION->GetCurUri();
        }
        
        if ( $options["USE_SOCIAL"] == "Y" )
        {
            // Соотвествие включенному в настройках типу классу
            $supportedTypes = Array(
                "soc_fb" => "BxmodAuthSocServFB",
                "soc_gg" => "BxmodAuthSocServGG",
                "soc_mr" => "BxmodAuthSocServMR",
                "soc_ok" => "BxmodAuthSocServOK",
                "soc_vk" => "BxmodAuthSocServVK",
                "soc_ya" => "BxmodAuthSocServYA",
                "soc_tw" => "BxmodAuthSocServTW",
            );
            
            // Сортируем, исходя из настроек
            $res = Array();
            foreach ( $supportedTypes AS $k => $v )
            {
                if ( $options[ $k ] == "Y" )
                {
                    $res[ $options[$k . "_order"] . $v ] = $v::Get();
                }
            }
            ksort( $res );
            
            foreach ( $res AS $v )
            {
                $result[ $v["CLASS"] ] = $v;
            }
        }
        return $result;
    }
    
    /**
    * Возвращает текущие настройки модуля включая описание
    */
    public function GetSettings()
    {
        $setting = Array(
            Array (
                // Использовать вход по E-mail
                Array (
                    "ID" => "USE_EMAIL",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_USE_EMAIL"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "Y",
                ),
                // Использовать вход по номеру телефона
                Array (
                    "ID" => "USE_PHONE",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_USE_PHONE"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "Y"
                ),
                // Использовать вход через соц. сервисы
                Array (
                    "ID" => "USE_SOCIAL",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_USE_SOCIAL"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "Y",
                    "MESSAGE" => GetMessage("BXMOD_AUTH_MESSAGE_ALL_HELP"),
                )
            ),
            Array (
                // Выводить CAPTCHA при авторизации
                Array (
                    "ID" => "EMAIL_CAPTCHA",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_EMAIL_CAPTCHA"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "N",
                    "HEADING" => GetMessage("BXMOD_AUTH_PARAM_AUTH_HEADING")
                ),
                // Через сколько попыток неверной авторизации выводить CAPTCHA
                Array (
                    "ID" => "EMAIL_CAPTCHA_COUNT",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_EMAIL_CAPTCHA_COUNT"),
                    "FIELD" => 'text',
                    "DEFAULT" => "0"
                ),
                // Выводить CAPTCHA при восстановлении пароля
                Array (
                    "ID" => "EMAIL_RESTORE_CAPTCHA",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_EMAIL_RESTORE_CAPTCHA"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "Y"
                ),
                // Выводить галочку &laquo;запомнить меня&raquo;
                Array (
                    "ID" => "EMAIL_REMIND",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_EMAIL_REMIND"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "Y"
                ),
                // Минимальная длинна пароля пользователя
                Array (
                    "ID" => "PASSWORD_LENGTH_MIN",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_PASSWORD_LENGTH_MIN"),
                    "FIELD" => 'text',
                    "DEFAULT" => "6"
                ),
                // Максимальная длинна пароля пользователя
                Array (
                    "ID" => "PASSWORD_LENGTH_MAX",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_PASSWORD_LENGTH_MAX"),
                    "FIELD" => 'text',
                    "DEFAULT" => "20"
                ),
                // Название параметра передачи USER_CHECKWORD при восстановлении доступа
                Array (
                    "ID" => "GET_RESTORE_CHECKWORD",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_GET_RESTORE_CHECKWORD"),
                    "FIELD" => 'text',
                    "DEFAULT" => "USER_CHECKWORD"
                ),
                // Название параметра передачи USER_ID при восстановлении доступа
                Array (
                    "ID" => "GET_RESTORE_USER_ID",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_GET_RESTORE_USER_ID"),
                    "FIELD" => 'text',
                    "DEFAULT" => "USER_ID"
                ),
                // Название параметра передачи USER_ID при подтверждении регистрации
                Array (
                    "ID" => "GET_CONFIRM_USER_ID",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_GET_CONFIRM_USER_ID"),
                    "FIELD" => 'text',
                    "DEFAULT" => "confirm_user_id"
                ),
                // Название параметра передачи CONFIRM_CODE при подтверждении регистрации
                Array (
                    "ID" => "GET_CONFIRM_CODE",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_GET_CONFIRM_CODE"),
                    "FIELD" => 'text',
                    "DEFAULT" => "confirm_code"
                ),
                // Максимальное количество SMS на один номер телефона в час
                Array (
                    "ID" => "PHONE_MAX_SMS",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_PHONE_MAX_SMS"),
                    "FIELD" => 'text',
                    "DEFAULT" => "0",
                    "HEADING" => GetMessage("BXMOD_AUTH_PARAM_PHONE_HEADING")
                ),
                // Текст SMS сообщения при подтверждении регистрации
                Array (
                    "ID" => "PHONE_SMS_CONFIRM_MSG",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_PHONE_SMS_CONFIRM_MSG"),
                    "FIELD" => 'textarea',
                    "DEFAULT" => GetMessage("BXMOD_AUTH_PARAM_PHONE_SMS_CONFIRM_DEFAULT"),
                ),
                // Текст SMS сообщения при восстановлении пароля
                Array (
                    "ID" => "PHONE_SMS_RESTORE_MSG",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_PHONE_SMS_RESTORE_MSG"),
                    "FIELD" => 'textarea',
                    "DEFAULT" => GetMessage("BXMOD_AUTH_PARAM_PHONE_SMS_RESTORE_DEFAULT"),
                ),
                // Ваш ID в системе SMS.ru
                Array (
                    "ID" => "PHONE_SMSRU_ID",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_PHONE_SMSRU_ID"),
                    "FIELD" => 'text',
                    "DEFAULT" => "",
                ),
                // Ваш ID в системе SMS.ru
                Array (
                    "ID" => "PHONE_SMSRU_FROM",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_PHONE_SMSRU_FROM"),
                    "FIELD" => 'text',
                    "DEFAULT" => "",
                )
            ),
            Array (
            // ВКонтакте
                // Использовать вход через ВКонтакте
                Array (
                    "ID" => "soc_vk",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_VK"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "N",
                    "HEADING" => GetMessage("BXMOD_AUTH_PARAM_SOC_VK_HEADING")
                ),
                // ID приложения
                Array (
                    "ID" => "soc_vkID",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_VK_ID"),
                    "FIELD" => 'text',
                    "DEFAULT" => "",
                ),
                // Секретный ключ
                Array (
                    "ID" => "soc_vkKey",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_VK_KEY"),
                    "FIELD" => 'text',
                    "DEFAULT" => "",
                ),
                // Сортировка
                Array (
                    "ID" => "soc_vk_order",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_ORDER"),
                    "FIELD" => 'text',
                    "DEFAULT" => "10",
                    "MESSAGE" => GetMessage("BXMOD_AUTH_PARAM_SOC_VK_MESS")
                ),
            // Одноклассники
                // Использовать вход через Одноклассники
                Array (
                    "ID" => "soc_ok",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_OK"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "N",
                    "HEADING" => GetMessage("BXMOD_AUTH_PARAM_SOC_OK_HEADING")
                ),
                // ID приложения
                Array (
                    "ID" => "soc_okID",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_OK_ID"),
                    "FIELD" => 'text',
                    "DEFAULT" => "",
                ),
                // Ключ приложения
                Array (
                    "ID" => "soc_odKey",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_OK_KEY"),
                    "FIELD" => 'text',
                    "DEFAULT" => ""
                ),
                // Секретный код приложения
                Array (
                    "ID" => "soc_odSecretKey",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_OK_SECRET"),
                    "FIELD" => 'text',
                    "DEFAULT" => "",
                ),
                // Сортировка
                Array (
                    "ID" => "soc_ok_order",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_ORDER"),
                    "FIELD" => 'text',
                    "DEFAULT" => "20",
                    "MESSAGE" => GetMessage("BXMOD_AUTH_PARAM_SOC_OK_MESS")
                ),
            // Google
                // Использовать вход через Google
                Array (
                    "ID" => "soc_gg",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_GG"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "N",
                    "HEADING" => GetMessage("BXMOD_AUTH_PARAM_SOC_GG_HEADING")
                ),
                // Идентификатор (Client ID)
                Array (
                    "ID" => "soc_ggID",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_GG_ID"),
                    "FIELD" => 'text',
                    "DEFAULT" => "",
                ),
                // Секретный код (Client secret)
                Array (
                    "ID" => "soc_ggKey",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_GG_KEY"),
                    "FIELD" => 'text',
                    "DEFAULT" => ""
                ),
                // Сортировка
                Array (
                    "ID" => "soc_gg_order",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_ORDER"),
                    "FIELD" => 'text',
                    "DEFAULT" => "30",
                    "MESSAGE" => GetMessage("BXMOD_AUTH_PARAM_SOC_GG_MESS")
                ),
            // Facebook
                // Использовать вход через Facebook
                Array (
                    "ID" => "soc_fb",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_FB"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "N",
                    "HEADING" => GetMessage("BXMOD_AUTH_PARAM_SOC_FB_HEADING")
                ),
                // Идентификатор приложения (App ID)
                Array (
                    "ID" => "soc_fbID",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_FB_ID"),
                    "FIELD" => 'text',
                    "DEFAULT" => "",
                ),
                // Секретный код приложения (App Secret)
                Array (
                    "ID" => "soc_fbKey",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_FB_KEY"),
                    "FIELD" => 'text',
                    "DEFAULT" => "",
                ),
                // Сортировка
                Array (
                    "ID" => "soc_fb_order",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_ORDER"),
                    "FIELD" => 'text',
                    "DEFAULT" => "40",
                    "MESSAGE" => GetMessage("BXMOD_AUTH_PARAM_SOC_FB_MESS")
                ),
            // Яндекс
                // Использовать вход через Яндекс
                Array (
                    "ID" => "soc_ya",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_YA"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "N",
                    "HEADING" => GetMessage("BXMOD_AUTH_PARAM_SOC_YA_HEADING")
                ),
                // ID приложения
                Array (
                    "ID" => "soc_yaID",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_YA_ID"),
                    "FIELD" => 'text',
                    "DEFAULT" => "",
                ),
                // Секретный ключ
                Array (
                    "ID" => "soc_yaKey",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_YA_KEY"),
                    "FIELD" => 'text',
                    "DEFAULT" => ""
                ),
                // Сортировка
                Array (
                    "ID" => "soc_ya_order",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_ORDER"),
                    "FIELD" => 'text',
                    "DEFAULT" => "50",
                    "MESSAGE" => GetMessage("BXMOD_AUTH_PARAM_SOC_YA_MESS")
                ),
            // Mail.ru
                // Использовать вход через Mail.ru
                Array (
                    "ID" => "soc_mr",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_MR"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "N",
                    "HEADING" => GetMessage("BXMOD_AUTH_PARAM_SOC_MR_HEADING")
                ),
                // ID сайта
                Array (
                    "ID" => "soc_mrID",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_MR_ID"),
                    "FIELD" => 'text',
                    "DEFAULT" => ""
                ),
                // Приватный ключ
                Array (
                    "ID" => "soc_mrKey",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_MR_KEY"),
                    "FIELD" => 'text',
                    "DEFAULT" => ""
                ),
                // Секретный ключ
                Array (
                    "ID" => "soc_mrSecretKey",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_MR_SECRET"),
                    "FIELD" => 'text',
                    "DEFAULT" => ""
                ),
                // Сортировка
                Array (
                    "ID" => "soc_mr_order",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_ORDER"),
                    "FIELD" => 'text',
                    "DEFAULT" => "60",
                    "MESSAGE" => GetMessage("BXMOD_AUTH_PARAM_SOC_MR_MESS")
                ),
            // Twitter
                // Использовать вход через Twitter
                Array (
                    "ID" => "soc_tw",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_TW"),
                    "FIELD" => 'checkbox',
                    "DEFAULT" => "N",
                    "HEADING" => GetMessage("BXMOD_AUTH_PARAM_SOC_TW_HEADING")
                ),
                // ID сайта
                Array (
                    "ID" => "soc_twID",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_TW_ID"),
                    "FIELD" => 'text',
                    "DEFAULT" => ""
                ),
                // Приватный ключ
                Array (
                    "ID" => "soc_twKey",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_TW_KEY"),
                    "FIELD" => 'text',
                    "DEFAULT" => "",
                    "MESSAGE" => GetMessage("BXMOD_AUTH_PARAM_SOC_TW_MESS")
                ),
            // Страница редиректа при не успешной авторизации
            Array (
                    "ID" => "fail_url",
                    "NAME" => GetMessage("BXMOD_AUTH_PARAM_SOC_FAIL"),
                    "FIELD" => 'text',
                    "DEFAULT" => "/",
                    "HEADING" => GetMessage("BXMOD_AUTH_PARAM_SOC_ADDIT_HEADING")
                ),
            ),
        );
        
        // Выставляем значения полей в соотвествии с сохраненными ранее. Если сохраненных нет, то выставляем занчения по-умолчанию
        $options = COption::GetOptionString( "bxmod.auth", "options" );
        if ( $options ) $options = unserialize( $options );

        foreach ( $setting AS $K=>$V )
        {
            foreach ( $V AS $k=>$v )
            {
                if ( isset( $options[ $v["ID"] ] ) )
                {
                    $setting[$K][$k]["VALUE"] = $options[ $v["ID"] ];
                }
                else
                {
                    $setting[$K][$k]["VALUE"] = $v["DEFAULT"];
                }
            }
        }
        
        return $setting;
    }
    
    /**
    * Возвращает текущие настройки модуля
    */
    public function GetOptions()
    {
        $allOptions = Array();
        $options = self::GetSettings();
        foreach ( $options AS $option )
        {
            foreach ( $option AS $v )
            {
                $allOptions[ $v["ID"] ] = $v["VALUE"];
            }
        }
        return $allOptions;
    }
    
    /**
    * Проверяет номер телефона на корректное число цифр и вырезает из него все кроме цифр
    * 
    * @param string $phone Номер телефона
    */
    public function CheckPhone( $phone )
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        if ( strlen( $phone ) == 10 || ( strlen( $phone ) == 11 && ( substr( $phone, 0, 1 ) == 8 || substr( $phone, 0, 1 ) == 7 ) ) )
        {
            if ( strlen( $phone ) == 10 ) $phone = "7" . $phone;
            $phone = "7" . substr( $phone, 1, 3 ) . substr( $phone, 4, 3 ) . substr( $phone, 7 );
            
            return $phone;
        }
        
        return false;
    }
    
    /**
    * Проверка типа логина
    * 
    * @param string $str Логин пользователя
    * @return mixed Вернет email || phone || false
    */
    public function CheckLoginType ( $str )
    {
        if ( preg_match("~^([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z0-9])+$~i", $str) )
        {
            return "email";
        }
        elseif ( self::CheckPhone( $str ) )
        {
            return "phone";
        }
        
        return false;
    }
    
    /**
    * Отправка SMS на номер
    * 
    * @param string $phone Номер телефона
    * @param ineger $text Текст сообщения
    */
    public function SendSMS ( $phone, $text )
    {
        $sendSMS = true;
        
        // Проверяем обработку события, если возвращает false, то СМС не отправляем
        $rsHandlers = GetModuleEvents("bxmod.auth", "OnBeforeSendSMS");
        while ( $arHandler = $rsHandlers->Fetch() )
        {
            if ( !ExecuteModuleEvent($arHandler, $phone, $text) ) {
                $sendSMS = false;
            }
        }
        
        // Иначе отправляем смс через sms.ru
        if ( $sendSMS ) {
            $options = self::GetOptions();
            
            if ( !empty($options["PHONE_SMSRU_ID"]) )
            {
                $text = urlencode( self::StrToUtf8( $text ) );
                
                $query = "http://sms.ru/sms/send?api_id={$options["PHONE_SMSRU_ID"]}&to={$phone}&text={$text}&partner_id=36537";
                
                if ( !empty($options["PHONE_SMSRU_ID"]) )
                {
                    $query .= "&from={$options["PHONE_SMSRU_FROM"]}";
                }
                
                $response = file_get_contents($query);
                return true;
            }
        }
        return false;
    }
    
    /**
    * Проверка корректности пары Логин/Пароль без попытки авторизации
    * 
    * @param string $login Логин пользователя
    * @param string $password Пароль пользователя
    * @param array $arUser Массив данных пользователя
    */
    public function CheckLoginPassword ( $login, $password, $arUser = false )
    {
        global $DB;
        
        if ( !$arUser )
        {
            $arUser = self::GetUserByEmail( $login );
        }
        
        if ( $arUser )
        {
            if ( strlen($arUser["PASSWORD"]) > 32 )
            {
                $salt = substr( $arUser["PASSWORD"], 0, strlen($arUser["PASSWORD"]) - 32 );
                $db_password = substr( $arUser["PASSWORD"], -32 );
            }
            else
            {
                $salt = "";
                $db_password = $arUser["PASSWORD"];
            }
            
            // если пароль верный
            if ( md5($salt . $password) == $db_password )
            {
                return true;
            }
        }
        
        $strSql = "UPDATE `b_user` SET `LOGIN_ATTEMPTS` = `LOGIN_ATTEMPTS` + 1 WHERE `LOGIN` = '". $DB->ForSql($login) ."'";
        $DB->Query($strSql);
        
        return false;
    }
    
    /**
    * Отправка пользователю инструкций по восстановлению пароля
    * 
    * @param integer $userID ID пользователя
    * @param string $loginType Тип логина (email или phone)
    */
    public function SendRestore ( $userID = false, $loginType )
    {
        global $DB;
        
        // Настройки модуля
        $options = self::GetOptions();
        
        $rsUser = CUser::GetByID( intval( $userID ) );
        $arUser = $rsUser->Fetch();
        
        if ( $loginType && $arUser["LOGIN"] )
        {
            $user = new CUser;
            
            if ( $loginType == "email" )
            {
                $arRes = $user->SendPassword($arUser["LOGIN"], $arUser["EMAIL"]);
                if ( $arRes["TYPE"] == "OK" )
                {
                    return true;
                }
            }
            elseif ( $loginType == "phone" )
            {
                $res = $DB->Query( "SELECT * FROM `b_bxmod_auth_smscontrol` WHERE `phone`='" . $DB->ForSql($arUser["LOGIN"]) . "'" );
                if ( $res = $res->Fetch() )
                {
                    // если превышен лимит на отправку смс на этот номер
                    if ( self::GetPhoneTimeLimit( $arUser["LOGIN"] ) )
                    {
                        return false;
                    }
                    $DB->Query("UPDATE `b_bxmod_auth_smscontrol` SET `sendTime`=". time() ." WHERE `phone`='". $DB->ForSql( $arUser["LOGIN"] ) ."'");
                }
                else
                {
                    $DB->Query("INSERT INTO `b_bxmod_auth_smscontrol` (`phone`, `sendTime`) VALUES (". $DB->ForSql( $arUser["LOGIN"] ) .",". time() .")");
                }
                
                $salt = randString(8);
                $code = rand(10000, 99999);
                
                $checkWordTime = date("Y-m-d H:i:s", mktime(date("H"), date("i") + 10, date("s"), date("m"), date("d"), date("Y")));
                
                $DB->Query("UPDATE `b_user` SET `CHECKWORD`='". $salt . md5($salt . $code) ."', `CHECKWORD_TIME`='". $checkWordTime ."' WHERE `ID`=" . intval($arUser["ID"]));
                
                self::SendSMS( $arUser["LOGIN"], str_replace("#CODE#", $code, $options["PHONE_SMS_RESTORE_MSG"]) );
                
                return true;
            }
        }
        return false;
    }
    
    /**
    * Проверка возможности отправки SMS на номер телефона. Необходима, если в настройках указан лимит количества отправляемых SMS на один номер в час
    * Возвращает количество секунд, в течение которых отправка не возможна.
    * Либо false, если отправка возможна немедленно
    * 
    * @param Int $phone номер телефона
    */
    public function GetPhoneTimeLimit ( $phone )
    {
        global $DB;
        
        $options = self::GetOptions();
        $options["PHONE_MAX_SMS"] = intval( $options["PHONE_MAX_SMS"] );
        
        if ( $options["PHONE_MAX_SMS"] > 0 )
        {
            $res = $DB->Query( "SELECT * FROM `b_bxmod_auth_smscontrol` WHERE `phone`='" . $DB->ForSql($phone) . "'" );
            if ( $res = $res->Fetch() )
            {
                $timeLimit = 3600 / $options["PHONE_MAX_SMS"] - (time() - $res["sendTime"]);
                
                if ( $timeLimit > 0 )
                {
                    return $timeLimit;
                }
            }
        }
        
        return false;
    }
    
    /**
    * Проверка корректности пароля
    * 
    * @param string $password Пароль
    * @param string $rePassword Подтверждение пароля
    */
    public function CheckPassword ( $password, $rePassword )
    {
        // Настройки модуля
        $options = self::GetOptions();
        
        // Если пароль короче, чем указано в настройках
        if ( strlen( $password ) < intval($options["PASSWORD_LENGTH_MIN"]) )
        {
            return GetMessage('BXMOD_AUTH_ERROR_SHORT_PASSWORD') . intval($options["PASSWORD_LENGTH_MIN"]);
        }
        // Если пароль длиннее, чем указано в настройках
        elseif ( strlen( $password ) > intval($options["PASSWORD_LENGTH_MAX"]) )
        {
            return GetMessage('BXMOD_AUTH_ERROR_LONG_PASSWORD') . intval($options["PASSWORD_LENGTH_MAX"]);
        }
        // Если пароль и его подтверждение не совпадают
        elseif ( $password != $rePassword )
        {
            return GetMessage('BXMOD_AUTH_ERROR_REPASSWORD');
        }
        
        return false;
    }
    
    /**
    * Авторизация / регистрация пользователя
    * 
    * @param string $login Логин пользователя
    * @param string $password Пароль пользователя
    * @param string $captchaCode Код каптчи
    * @param string $captchaSid Sid каптчи
    * @param boolean $remember Запомнить ли пользователя
    * @return string Описание результата
    */
    public function Login ( $login, $password, $captchaCode = false, $captchaSid = false, $remember = false )
    {
        global $USER, $APPLICATION, $DB;
        
        if ( !is_object( $USER ) )
        {
            $USER = new CUser;
        }
        
        // Настройки модуля
        $options = self::GetOptions();
        
        // Проверка типа авторизации (мыло или номер телефона)
        if ( !$loginType = self::CheckLoginType( $login ) )
        {
            // Если введен не корректный логин, то выводим соотв. сообщение
            if ( $options["USE_EMAIL"] == "Y" && $options["USE_PHONE"] == "Y" )
            {
                return self::Response("Error", "login_error_ep", "login");
            }
            elseif ( $arParams["OPTIONS"]["USE_EMAIL"] == "Y" )
            {
                return self::Response("Error", "login_error_e", "login");
            }
            else
            {
                return self::Response("Error", "login_error_p", "login");
            }
        }
        // Если введен номер телефона, но авторизация по нему не возможна
        elseif( $loginType == "phone" && $options["USE_PHONE"] != "Y" )
        {
            return self::Response("Error", "login_error_e", "login");
        }
        // Если введен адрес email, но авторизация по нему не возможна
        elseif( $loginType == "email" && $options["USE_EMAIL"] != "Y" )
        {
            return self::Response("Error", "login_error_p", "login");
        }
        
        // Определяем логин
        if ( $loginType == 'email' )
        {
            $userLogin = $userEmail = $login;
        }
        // Если авторизация по номеру телефона, то делаем из номера телефона псевдо e-mail
        else
        {
            $userLogin = self::CheckPhone( $login );
            $userEmail = $userLogin . "@register.phone";
        }
        
        // пользователь в БД найден
        if ( $arUser = self::GetUserByEmail( $userEmail ) )
        {
            // при необходимости проверяем правильность ввода каптчи
            if ( $options["EMAIL_CAPTCHA"] == "Y" )
            {
                // если в настройках указано выводить каптчу всегда, или пользователь уже сделал больше попыток входа, чем указано в настройках, то проверяем каптчу
                if ( ( $options["EMAIL_CAPTCHA_COUNT"] == 0 || $options["EMAIL_CAPTCHA_COUNT"] < $arUser["LOGIN_ATTEMPTS"] ) && !$APPLICATION->CaptchaCheckCode($captchaCode, $captchaSid) )
                {
                    return self::Response("Error", "login_error_captcha", "captcha");
                }
            }
            
            // если введен верный пароль
            if ( self::CheckLoginPassword( $arUser["LOGIN"], $password, $arUser ) )
            {
                // если пользователь зарегистрировался, но еще не подтвердил свой емайл или номер телефона
                if ( $arUser["ACTIVE"] == "N" && strlen( $arUser["CONFIRM_CODE"] ) > 0 )
                {
                    if ( $loginType == 'phone' )
                    {
                        return self::Response("RegisterPhoneConfirm", "register_confirm_phone");
                    }
                    else
                    {
                        return self::Response("RegisterEmailConfirm", "register_confirm_email");
                    }
                }
                // если пользователь деактивирован админом
                elseif ( $arUser["ACTIVE"] == "N" )
                {
                    return self::Response("Error", "login_error_unactive", "login");
                }
                // если все нормально, авторизуем
                else
                {
                    if ( $USER->Authorize($arUser["ID"], $remember) )
                    {
                        return self::Response("Login", "login_success");
                    }
                }
                return self::Response("Error", "unknown_error", "unknown");
            }
            return self::Response("Error", "login_error_password", "password");
        }
        // Если пользователь не зареган, пытаемся зарегать
        else
        {
            if ( $passError = self::CheckPassword( $password, $password ) )
            {
                return self::Response("Error", "register_error_password", "password", $passError);
            }
            
            // пытаемся зарегистрировать
            $arRegisterResult = $USER->Register($userLogin, "", "", $password, $password, $userEmail);
            
            // если регистрация прошла успешно
            if ( $arRegisterResult["TYPE"] == "OK" )
            {
                $arUser = self::GetUserByEmail( $userLogin );
                    
                // если регистрация по номеру телефона и требуется подтверждение номера телефона
                if ( COption::GetOptionString("main", "new_user_registration_email_confirmation") == "Y" )
                {
                    if ( $loginType == 'phone' )
                    {
                        // Отправляем СМС с кодом активации
                        $code = rand(10000, 99999);
                        $DB->Query("UPDATE `b_user` SET `CONFIRM_CODE`='". $code ."', `ACTIVE`='N' WHERE `ID`=" . intval($arUser["ID"]));
                    
                        $codeText = str_replace( "#CODE#", $code, $options["PHONE_SMS_CONFIRM_MSG"] );
                        self::SendSMS($userLogin, $codeText);
                        
                        // сообщаем о необходимости подтверждения номера телефона
                        return self::Response("RegisterPhoneConfirm", "register_confirm_phone");
                    }
                    // если регистрация по email и требуется подтверждение email
                    else
                    {
                        // сообщаем о необходимости подтверждения email
                        return self::Response("RegisterEmailConfirm", "register_confirm_email");
                    }
                }
                // если никакое подтверждение не требуется, пытаемся авторизовать
                else
                {
                    // успешно авторизовали
                    if ( $USER->Authorize($arUser["ID"]) )
                    {
                        return self::Response("Register", "register_success");
                    }
                }
            } else {
                return self::Response("Error", "register_error_password", "password", $arRegisterResult["MESSAGE"]);
            }
        }
        return self::Response("Error", "unknown_error", "unknown");
    }
    
    /**
    * Подтверждение регистрации
    * 
    * @param string $login Логин пользователя
    * @param string $confirmCode Код подтверждения
    * @param string $userID ID пользователя. Укажите, если не известен логин
    * @return string Описание результата
    */
    public function Confirm ( $login, $confirmCode, $userID = false )
    {
        if ( $login )
        {
            $arUser = self::GetUserByEmail( $login );
        }
        elseif ( $userID )
        {
            $rsUser = CUser::GetByID( $userID );
            $arUser = $rsUser->Fetch();
        }
        
        // если пользователь найден и действительно требуется подтверждение
        if ( $arUser["ACTIVE"] == "N" && strlen($arUser["CONFIRM_CODE"]) > 0 )
        {
            // если введен корректный код
            if ( $arUser["CONFIRM_CODE"] == $confirmCode )
            {
                $user = new CUser;
                $user->Update($arUser["ID"], Array( "ACTIVE" => "Y", "CONFIRM_CODE" => "" ));
                
                // успешно авторизовали
                if ( $user->Authorize($arUser["ID"]) )
                {
                    return self::Response("Register", "confirm_success");
                }
            }
            else
            {
                return self::Response("Error", "confirm_error_code", "confirm_code");
            }
        }
        
        return self::Response("Error", "unknown_error", "unknown");
    }
    
    /**
    * Начинает процедуру восстановления пароля
    * 
    * @param string $login Логин пользователя
    * @param string $captchaCode Код каптчи
    * @param string $captchaSid Sid каптчи
    * @return string Описание результата
    */
    public function InitRestore ( $login, $captchaCode = false, $captchaSid = false )
    {
        global $APPLICATION;
        
        // Настройки модуля
        $options = self::GetOptions();
        
        // Если логин не корректен
        if ( !$loginType = self::CheckLoginType( $login ) )
        {
            if ( $options["USE_EMAIL"] == "Y" && $options["USE_PHONE"] == "Y" )
            {
                return self::Response("Error", "initrestore_error_ep", "login");
                
            }
            elseif ( $arParams["OPTIONS"]["USE_EMAIL"] == "Y" )
            {
                return self::Response("Error", "initrestore_error_e", "login");
            }
            else
            {
                return self::Response("Error", "initrestore_error_p", "login");
            }
        }
        // Если введен номер телефона, но авторизация по нему не возможна
        elseif( $loginType == "phone" && $options["USE_PHONE"] != "Y" )
        {
            return self::Response("Error", "initrestore_error_e", "login");
        }
        // Если введен адрес email, но авторизация по нему не возможна
        elseif( $loginType == "email" && $options["USE_EMAIL"] != "Y" )
        {
            return self::Response("Error", "initrestore_error_p", "login");
        }
        
        // Если пользователь найден в БД
        if ( $arUser = self::GetUserByEmail( $login ) )
        {
            if ( $options["EMAIL_RESTORE_CAPTCHA"] == "Y" && !$APPLICATION->CaptchaCheckCode($captchaCode, $captchaSid) )
            {
                return self::Response("Error", "initrestore_error_captcha", "captcha");
            }
            
            // Если превышен временной лимит отправки сообщений
            if ( $loginType == "phone" && $timeLimit = self::GetPhoneTimeLimit( $arUser["LOGIN"] ) )
            {
                $hrs = str_pad(floor($timeLimit / 3600), 2, "0", STR_PAD_LEFT);
                $min = str_pad(floor(($timeLimit - $hours * 3600) / 60), 2, "0", STR_PAD_LEFT);
                $sec = str_pad($timeLimit - ($hours * 3600) - ($min * 60), 2, "0", STR_PAD_LEFT);
                
                $limitStr = str_replace(Array("#HOUR#", "#MIN#", "#SEC#"), Array($hrs, $min, $sec), GetMessage('BXMOD_AUTH_INITRESTORE_SMS_LIMIT'));
                return self::Response("Error", "initrestore_error_smslimit", "sms_limit", $limitStr);
            }
            
            // если отправка кода восстановления пароля прошла успешно
            if ( self::SendRestore( $arUser["ID"], $loginType ) )
            {
                if ( $loginType == "phone" )
                {
                    return self::Response("RestoreSendPhone", "initrestore_send_phone");
                }
                else
                {
                    return self::Response("RestoreSendEmail", "initrestore_send_email");
                }
            }
        }
        
        return self::Response("Error", "unknown_error", "unknown");
    }
    
    /**
    * Попытка смены пароля пользователя
    * 
    * @param string $login Логин пользователя
    * @param string $restoreCode Код восстановления доступа
    * @param string $password Новый пароль
    * @param string $rePassword Новый пароль повторно
    * @return Описание результата
    */
    public function Restore ( $login, $restoreCode, $password, $rePassword )
    {
        // ищем пользователя
        $arUser = self::GetUserByEmail( $login );
        
        if ( $arUser["ACTIVE"] == "Y" )
        {
            // Выбираем "соль" контрольного слова из БД
            if ( strlen($arUser["CHECKWORD"]) > 32 )
            {
                $salt = substr( $arUser["CHECKWORD"], 0, strlen($arUser["CHECKWORD"]) - 32 );
                $checkword = substr( $arUser["CHECKWORD"], -32 );
            }
            else
            {
                $salt = "";
                $checkword = $arUser["CHECKWORD"];
            }
            
            // Проверяем код на соответствие коду в БД
            if ( $checkword != md5($salt . $restoreCode ) )
            {
                return self::Response("Error", "restore_error_code", "restore_code");
            }
            
            // Проверяем поля пароля и подтверждения пароля
            if ( $passError = self::CheckPassword( $password, $rePassword ) )
            {
                return self::Response("Error", "restore_error_password", "password", $passError);
            }
            
            $user = new CUser;
            $arRes = $user->ChangePassword($arUser["LOGIN"], $restoreCode, $password, $rePassword);
            if ( $arRes["TYPE"] == "OK")
            {
                // пытаемся авторизовать
                $user->Authorize($arUser["ID"]);
                
                return self::Response("Restore", "restore_success");
            } else {
                return self::Response("Error", "restore_error_password", "password", $arRes["MESSAGE"]);
            }
        }
        return self::Response("Error", "unknown_error", "unknown");
    }
    
    /**
    * Ищем пользователя с заданным e-mail в БД
    * 
    * @param string $email
    */
    public function GetUserByEmail ( $email )
    {
        if ( $email && $loginType = self::CheckLoginType( $email ) )
        {
            // Ищем юзера
            if ( $loginType == "email" ) {
                $userEmail = $email;
            } else {
                if ( !$userLogin = self::CheckPhone( $email ) ) return false;
                $userEmail = $userLogin . "@register.phone";
            }
            
            // ищем пользователя с таким e-mail в БД
            $rsUser = CUser::GetList($by, $order, Array("EMAIL" => $userEmail, "EXTERNAL_AUTH_ID" => false));
            // Если пользователь найден в БД
            if ( $arUser = $rsUser->Fetch() )
            {
                return $arUser;
            }
        }
        return false;
    }
    
    /**
    * Строит массив ответа
    * 
    * @param string $type - Тип ответа
    * @param string $code - Код события
    * @param string $field - Поле, на котором возникло событие
    * @param string $desc - Описание события
    */
    public function Response ( $type, $code = false, $field = false, $desc = false )
    {
        $result = Array(
            "TYPE" => $type,
            "DESC" => $desc ? $desc : GetMessage( "BXMOD_AUTH_" . strtoupper( $code ) ),
            "FIELD" => $code,
            "FIELD" => $field
        );
        
        return $result;
    }
    
    /**
    * Конвертирует строку из кодировки сайта в UTF-8
    * 
    * @param String $str
    * @return String
    */
    public function StrToUtf8( $str )
    {
        if ( defined("LANG_CHARSET") && strtolower( LANG_CHARSET ) != "utf-8" )
        {
            $str = iconv( LANG_CHARSET, "utf-8", $str );
        }
        
        return $str;
    }
    
    /**
    * Конвертирует строку из UTF-8 в кодировку сайта
    * 
    * @param String $str
    * @return String
    */
    public function StrFromUtf8( $str )
    {
        if ( defined("LANG_CHARSET") && strtolower( LANG_CHARSET ) != "utf-8" )
        {
            $str = iconv( "utf-8", LANG_CHARSET, $str );
        }
        
        return $str;
    }
}
?>