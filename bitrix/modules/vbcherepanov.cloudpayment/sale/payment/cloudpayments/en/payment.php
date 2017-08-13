<?
global $MESS;
$MESS ["VBCH_CLPAY_SPCP_DTITLE"] = "Credit cards Visa, MasterCard (processing CloudPayments)";
$MESS ["VBCH_CLPAY_SPCP_DDESCR"] = "<a href=\"http://cloudpayments.ru/\"> CloudPayments </a>. <br> Accepting payments online by credit card via CloudPayments <br/>
For the functioning of the payment system in the private office settings CloudPayment your site list the data fields <br/>
<b> Query to check payment </b> http: //#SITEURL#/bitrix/tools/vbcherepanov.cloudpayment/check.php <br/>
<b> Notifications of acceptance of payment </b> http: //#SITEURL#/bitrix/tools/vbcherepanov.cloudpayment/pay.php <br/>
<b> The notice of rejection platezhea </b> http: //#SITEURL#/bitrix/tools/vbcherepanov.cloudpayment/fail.php <br/>
<b> All values ​​data transfer method POST, the encoding must match the encoding of your site #CODING# ";
$MESS ['VBCH_CLPAY_APIKEY'] = 'Public ID';
$MESS ['VBCH_CLPAY_APIKEY_DESCR'] = 'Access Key (from a personal cabinet CloudPayments)';
$MESS ['VBCH_CLPAY_APIPASS'] = 'The password for API';
$MESS ['VBCH_CLPAY_APIPASS_DESCR'] = 'access password (from your account CloudPayments)';
$MESS ['VBCH_CLPAY_PAYTYPE'] = 'Payment';
$MESS ['VBCH_CLPAY_PAYTYPE_DESCR'] = 'One of the few ways to pay';
$MESS ['VBCH_CLPAY_PAYTOSTUD'] = 'schemes of payment';
$MESS ['VBCH_CLPAY_PAYTOSTUD_DESCR'] = 'One-stage or two-stage payment';
$MESS ['VBCH_CLPAY_PAYTOSTUD1'] = "One-step";
$MESS ['VBCH_CLPAY_PAYTOSTUD2'] = "two-stage";
$MESS ['VBCH_CLPAY_PAYER_EMAIL'] = 'Email buyer';
$MESS ['VBCH_CLPAY_PAYER_EMAIL_DESCR'] = '';
$MESS ['VBCH_CLPAY_SHOULD_PAY'] = 'The amount of the order';
$MESS ['VBCH_CLPAY_SHOULD_PAY_DESCR'] = 'Payment amount';
$MESS ['VBCH_CLPAY_CURRENCY'] = 'currency';
$MESS ['VBCH_CLPAY_CURRENCY_DESCR'] = 'currency in which the payment is made';
$MESS ['VBCH_CLPAY_DATE_INSERT'] = 'Creation Date Order';
$MESS ['VBCH_CLPAY_DATE_INSERT_DESCR'] = '';
$MESS ['VBCH_CLPAY_ORDER_PAY'] = 'Order';
$MESS ['VBCH_CLPAY_ORDER_PAY_DESCR'] = '';
$MESS ['VBCH_CLPAY_WIDGET'] = 'widget';
$MESS ['VBCH_CLPAY_DS'] = '3D Secure';
$MESS ['VBCH_CLPAY_SM'] = 'invoice to e-mail';
$MESS ['VBCH_CLPAY_SB'] = 'Payment subscription ';
$MESS ["VBCH_CLPAY_MM_DESC"] = 'Order #ORDER_ID# on \"# SITE_NAME #\" from # DATE #';
$MESS ['VBCH_CLOUDPAY_TITLE'] = "You are going to pay by credit card";
$MESS ['VBCH_CLOUDPAY_DESC'] = "Account № #ORDER_ID# of #DATE# <br> payment amount on the account: <b> #SUMMA# </b>";
$MESS ['VBCH_CLOUDPAY_BUTTON'] = "Go to payment";
$MESS ['VBCH_CLOUDPAY_SUCCESS'] = 'Payment has been successful!';
$MESS ['VBCH_CLOUDPAYMENT_5001'] = "Please contact your bank, or use another card";
$MESS ['VBCH_CLOUDPAYMENT_5005'] = "Please contact your bank, or use another card";
$MESS ['VBCH_CLOUDPAYMENT_5006'] = "Failure of the network to carry out the operation or the wrong CVV code";
$MESS ['VBCH_CLOUDPAYMENT_5012'] = "The card is not designed for online payments";
$MESS ['VBCH_CLOUDPAYMENT_5013'] = "Check sum";
$MESS ['VBCH_CLOUDPAYMENT_5030'] = "Try again later";
$MESS ['VBCH_CLOUDPAYMENT_5031'] = "Use another card";
$MESS ['VBCH_CLOUDPAYMENT_5034'] = "Please contact your bank, or use another card";
$MESS ['VBCH_CLOUDPAYMENT_5041'] = "Please contact your bank";
$MESS ['VBCH_CLOUDPAYMENT_5043'] = "Please contact your bank";
$MESS ['VBCH_CLOUDPAYMENT_5051'] = "Insufficient funds on the map";
$MESS ['VBCH_CLOUDPAYMENT_5054'] = "Check the details of another card, or use";
$MESS ['VBCH_CLOUDPAYMENT_5057'] = "Please contact your bank, or use another card";
$MESS ['VBCH_CLOUDPAYMENT_5065'] = "Please contact your bank, or use another card";
$MESS ['VBCH_CLOUDPAYMENT_5082'] = "Check the details of another card, or use";
$MESS ['VBCH_CLOUDPAYMENT_5091'] = "Please try again later or use another card";
$MESS ['VBCH_CLOUDPAYMENT_5092'] = "Please try again later or use another card";
$MESS ['VBCH_CLOUDPAYMENT_5096'] = "Try again later";
$MESS ['VBCH_CLOUDPAYMENT_5204'] = "Please try again later or use another card";
$MESS ['VBCH_CLOUDPAYMENT_5206'] = "Please contact your bank, or use another card";
$MESS ['VBCH_CLOUDPAYMENT_5207'] = "Please contact your bank, or use another card";
$MESS ['VBCH_CLOUDPAYMENT_5300'] = "Use another card";
$MESS ["VBCH_CLOUDPAY_ORDERID"] = "order number -";
$MESS ["VBCH_CLOUDPAY_ORDERNUM"] = "number of payment -";
$MESS ["VBCH_CLOUDPAY_MESSAGE"] = "message -";
$MESS ["VBCH_CLOUDPAY_DATEPAY"] = "date of payment -";
$MESS ["VBCH_CLOUDPAY_ERRORCODE"] = "error code -";
$MESS ["VBCH_CLOUDPAY_BUYEREMAIL"] = "Email buyer -";
$MESS ["VBCH_CLOUDPAY_SUCCESCODE"] = "Confirmation code of payment -";
$MESS ['VBCH_CLOUDPAYMENT_DESCRIPTION'] = "<p> <b> Note </b> </p>
<p> Press the button \"Pay \". </p>
<p> In the window that appears, enter the details of a credit card, and then click \"Go to payment\". If you need proof of your bank and wait for SMS messages with one-time password and enter it in the form below. </p>
<p> We accept card payment systems Visa, MasterCard, Maestro. The payment will be credited within a few minutes. </p> ";
$MESS ['VBCH_CLOUDPAYMENT_DESCRIPTION1'] = "<p> <b> Security Guarantee </b> </p>
<p> The processing center CloudPayments protects and handles the data of your credit card security standard PCI DSS 3.0. Transmission of information to the payment gateway comes with encryption technology SSL. Further information transfer takes place via closed banking networks with the highest level of reliability. CloudPayments not sending us your credit card and other third parties. For additional cardholder authentication protocol used by 3D Secure. </p>
<p> If you have questions about making a payment, you can contact customer support by e-mail support@cloudpayments.ru. </p>
<p> <b> Secure online payment </b> </p>
<p> you provide personal information (name, contract number, e-mail, credit card number) is confidential and shall not be disclosed. </p>
<p> Your credit card details are transmitted in encrypted form and are not stored on our Web-server. </p>
<p> Secure Internet payment processing ensures LLC \"Klaudpeyments.\" All transactions with payment cards occur in accordance with the requirements of VISA International, MasterCard and other payment systems. When you communicate using special technology security card online payments, data processing is carried out on a secure server, high-tech processing company. </p>";