<?
global $MESS;
$MESS["VBCH_CLPAY_SPCP_DTITLE"] = "Банковские карты Visa, MasterCard (процессинг CloudPayments)";
$MESS["VBCH_CLPAY_SPCP_DDESCR"] = "<a href=\"http://cloudpayments.ru/\">CloudPayments</a>.<br>Приём платежей онлайн с помощью банковской карты через систему CloudPayments <Br/>
Для функционирования платежной системы в личном кабинете CloudPayment в настройках Вашего сайта пропишите данные поля<br/>
<b>Запрос на проверку платежа</b> http://#SITEURL#/bitrix/tools/vbcherepanov.cloudpayment/check.php<br/>
<b>Уведомление о принятом платеже</b> http://#SITEURL#/bitrix/tools/vbcherepanov.cloudpayment/pay.php<br/>
<b>Уведомление об отклоненном платежеа</b> http://#SITEURL#/bitrix/tools/vbcherepanov.cloudpayment/fail.php<br/>
<b>Во всех значениях метод передачи данных POST, кодировка должна соответствовать кодировке Вашего сайта #CODING#";

$MESS['VBCH_CLPAY_APIKEY']='Public ID';
$MESS['VBCH_CLPAY_APIKEY_DESCR']='Ключ доступа (из личного кабинета CloudPayments)';
$MESS['VBCH_CLPAY_APIPASS']='Пароль для API';
$MESS['VBCH_CLPAY_APIPASS_DESCR']='Пароль доступа (из личного кабинета CloudPayments)';
$MESS['VBCH_CLPAY_PAYTYPE']='Способы оплаты';
$MESS['VBCH_CLPAY_PAYTYPE_DESCR']='Один из нескольких способов оплаты';
$MESS['VBCH_CLPAY_PAYTOSTUD']='Схемы проведения платежа';
$MESS['VBCH_CLPAY_PAYTOSTUD_DESCR']='Одностадийная или Двухстадийная оплата';
$MESS['VBCH_CLPAY_PAYTOSTUD1']="Одностадийная";
$MESS['VBCH_CLPAY_PAYTOSTUD2']="Двухстадийная";
$MESS['VBCH_CLPAY_PAYER_EMAIL']='Email покупателя';
$MESS['VBCH_CLPAY_PAYER_EMAIL_DESCR']='';
$MESS['VBCH_CLPAY_SHOULD_PAY']='Сумма заказа';
$MESS['VBCH_CLPAY_SHOULD_PAY_DESCR']='Сумма к оплате';
$MESS['VBCH_CLPAY_CURRENCY']='Валюта';
$MESS['VBCH_CLPAY_CURRENCY_DESCR']='Валюта в которой производится оплата';
$MESS['VBCH_CLPAY_DATE_INSERT']='Дата создания заказа';
$MESS['VBCH_CLPAY_DATE_INSERT_DESCR']='';
$MESS['VBCH_CLPAY_ORDER_PAY']='Номер заказа';
$MESS['VBCH_CLPAY_ORDER_PAY_DESCR']='';
$MESS['VBCH_CLPAY_WIDGET']='Виджет';
$MESS['VBCH_CLPAY_DS']='3D Secure';
$MESS['VBCH_CLPAY_SM']='Выставление счета на почту';
$MESS['VBCH_CLPAY_SB']='Оплата по подписке';
$MESS["VBCH_CLPAY_MM_DESC"]='заказ № #ORDER_ID# на "#SITE_NAME#" от #DATE#';
$MESS['VBCH_CLOUDPAY_TITLE']="Вы собираетесь оплатить банковской картой";
$MESS['VBCH_CLOUDPAY_DESC']=" Cчет №  #ORDER_ID#  от #DATE#<br>Сумма к оплате по счету: <b>#SUMMA#</b>";
$MESS['VBCH_CLOUDPAY_BUTTON']="Перейти к оплате";
$MESS['VBCH_CLOUDPAY_SUCCESS']='Оплата проведена успешно!';

$MESS['VBCH_CLOUDPAYMENT_5001']="Свяжитесь с вашим банком или воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5005']="Свяжитесь с вашим банком или воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5006']="Отказ сети проводить операцию или неправильный CVV код";
$MESS['VBCH_CLOUDPAYMENT_5012']="Карта не предназначена для онлайн платежей";
$MESS['VBCH_CLOUDPAYMENT_5013']="Проверьте сумму";
$MESS['VBCH_CLOUDPAYMENT_5030']="Повторите попытку позже";
$MESS['VBCH_CLOUDPAYMENT_5031']="Воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5034']="Свяжитесь с вашим банком или воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5041']="Свяжитесь с вашим банком";
$MESS['VBCH_CLOUDPAYMENT_5043']="Свяжитесь с вашим банком";
$MESS['VBCH_CLOUDPAYMENT_5051']="Недостаточно средств на карте";
$MESS['VBCH_CLOUDPAYMENT_5054']="Проверьте реквизиты или воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5057']="Свяжитесь с вашим банком или воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5065']="Свяжитесь с вашим банком или воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5082']="Проверьте реквизиты или воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5091']="Повторите попытку позже или воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5092']="Повторите попытку позже или воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5096']="Повторите попытку позже";
$MESS['VBCH_CLOUDPAYMENT_5204']="Повторите попытку позже или воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5206']="Свяжитесь с вашим банком или воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5207']="Свяжитесь с вашим банком или воспользуйтесь другой картой";
$MESS['VBCH_CLOUDPAYMENT_5300']="Воспользуйтесь другой картой";

$MESS["VBCH_CLOUDPAY_ORDERID"]="номер заказа - ";
$MESS["VBCH_CLOUDPAY_ORDERNUM"]="номер платежа - ";
$MESS["VBCH_CLOUDPAY_MESSAGE"]="сообщение - ";
$MESS["VBCH_CLOUDPAY_DATEPAY"]="дата платежа - ";
$MESS["VBCH_CLOUDPAY_ERRORCODE"]="код ошибки - ";
$MESS["VBCH_CLOUDPAY_BUYEREMAIL"]="Email покупателя - ";
$MESS["VBCH_CLOUDPAY_SUCCESCODE"]="Код подтверждения платежа - ";
$MESS['VBCH_CLOUDPAYMENT_DESCRIPTION']="<p><b>Инструкция</b></p>
		<p>Hажмите кнопку \"Оплатить\".</p>
		<p>В появившемся окне введите реквизиты банковской карты и нажмите кнопку \"Перейти к оплате\". Если потребуется подтверждение вашего банка, дождитесь СМС сообщения с одноразовым паролем и введите его в предложенную форму.</p>
		<p>К оплате принимаются карты платежных систем Visa, MasterCard, Maestro. Платеж будет зачислен в течение нескольких минут.</p>";
$MESS['VBCH_CLOUDPAYMENT_DESCRIPTION1']="<p><b>Гарантии безопасности</b></p>
			<p>Процессинговый центр CloudPayments защищает и обрабатывает данные Вашей банковской карты по стандарту безопасности PCI DSS 3.0. Передача информации в платежный шлюз происходит с применением технологии шифрования SSL. Дальнейшая передача информации происходит по закрытым банковским сетям, имеющим наивысший уровень надежности. CloudPayments не передает данные Вашей карты нам и иным третьим лицам. Для дополнительной аутентификации держателя карты используется протокол 3D Secure.</p>
			<p>В случае, если у Вас есть вопросы по совершенному платежу, Вы можете обратиться в службу поддержки клиентов по электронной почте support@cloudpayments.ru.</p>
			<p><b>Безопасность онлайн платежей</b></p>
			<p>Предоставляемая Вами персональная информация (имя, номер договора, e-mail, номер кредитной карты) является конфиденциальной и не подлежит разглашению.</p>
			<p>Данные Вашей кредитной карты передаются только в зашифрованном виде и не сохраняются на нашем Web-сервере.</p>
            <p>Безопасность обработки Интернет-платежей гарантирует ООО «Клаудпэйментс». Все операции с платежными картами происходят в соответствии с требованиями VISA International, MasterCard и других платежных систем. При передаче информации используется специальные технологии безопасности карточных онлайн-платежей, обработка данных ведется на безопасном высокотехнологичном сервере процессинговой компании.</p>";