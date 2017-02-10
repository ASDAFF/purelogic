<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$data = array(
	'NAME' => Loc::getMessage("SBLP_DTITLE"),
	'SORT' => 100,
	'CODES' => array(
		"PAYMENT_ID" => array(
			"NAME" => Loc::getMessage("SBLP_ORDER_ID"),
			'SORT' => 100,
			'GROUP' => 'PAYMENT',
			"DEFAULT" => array(
				"VALUE" => "ID",
				"TYPE" => "PAYMENT"
			)
		),
		"DATE_INSERT" => array(
			"NAME" => Loc::getMessage("SBLP_DATE"),
			'SORT' => 200,
			"DESCRIPTION" => Loc::getMessage("SBLP_DATE_DESC"),
			'GROUP' => 'PAYMENT',
			'DEFAULT' => array(
				"VALUE" => "DATE_BILL_DATE",
				"TYPE" => "PAYMENT"
			)
		),
		"DATE_PAY_BEFORE" => array(
			"NAME" => Loc::getMessage("SBLP_PAY_BEFORE"),
			'SORT' => 300,
			'GROUP' => 'PAYMENT',
			'DEFAULT' => array(
				"VALUE" => "DATE_PAY_BEFORE",
				"TYPE" => "ORDER"
			)
		),
		"SELLER_COMPANY_NAME" => array(
			'GROUP' => 'SELLER_COMPANY',
			'SORT' => 400,
			"NAME" => Loc::getMessage("SBLP_SUPPLI"),
			"DESCRIPTION" => Loc::getMessage("SBLP_SUPPLI_DESC"),
		),
		"SELLER_COMPANY_BANK_ACCOUNT" => array(
			'GROUP' => 'SELLER_COMPANY',
			"NAME" => Loc::getMessage("SBLP_ORDER_SUPPLI"),
			'SORT' => 500,
			"DESCRIPTION" => Loc::getMessage("SBLP_ORDER_SUPPLI_DESC"),
		),
		"SELLER_COMPANY_BANK_NAME" => array(
			'GROUP' => 'SELLER_COMPANY',
			'SORT' => 600,
			"NAME" => Loc::getMessage("SBLP_ORDER_BANK"),
		),
		"SELLER_COMPANY_MFO" => array(
			'GROUP' => 'SELLER_COMPANY',
			'SORT' => 700,
			"NAME" => Loc::getMessage("SBLP_ORDER_MFO"),
		),
		"SELLER_COMPANY_ADDRESS" => array(
			'GROUP' => 'SELLER_COMPANY',
			"NAME" => Loc::getMessage("SBLP_ADRESS_SUPPLI"),
			'SORT' => 800,
			"DESCRIPTION" => Loc::getMessage("SBLP_ADRESS_SUPPLI_DESC"),
		),
		"SELLER_COMPANY_PHONE" => array(
			'GROUP' => 'SELLER_COMPANY',
			"NAME" => Loc::getMessage("SBLP_PHONE_SUPPLI"),
			'SORT' => 900,
			"DESCRIPTION" => Loc::getMessage("SBLP_PHONE_SUPPLI_DESC"),
		),
		"SELLER_COMPANY_EDRPOY" => array(
			'GROUP' => 'SELLER_COMPANY',
			'SORT' => 1000,
			"NAME" => Loc::getMessage("SBLP_EDRPOY_SUPPLI"),
			"DESCRIPTION" => Loc::getMessage("SBLP_EDRPOY_SUPPLI_DESC"),
		),
		"SELLER_COMPANY_IPN" => array(
			'GROUP' => 'SELLER_COMPANY',
			'SORT' => 1100,
			"NAME" => Loc::getMessage("SBLP_IPN_SUPPLI"),
			"DESCRIPTION" => Loc::getMessage("SBLP_IPN_SUPPLI_DESC"),
		),
		"SELLER_COMPANY_PDV" => array(
			'GROUP' => 'SELLER_COMPANY',
			'SORT' => 1200,
			"NAME" => Loc::getMessage("SBLP_PDV_SUPPLI"),
			"DESCRIPTION" => Loc::getMessage("SBLP_PDV_SUPPLI_DESC"),
		),
		"SELLER_COMPANY_SYS" => array(
			'GROUP' => 'SELLER_COMPANY',
			'SORT' => 1300,
			"NAME" => Loc::getMessage("SBLP_SYS_SUPPLI"),
			"DESCRIPTION" => Loc::getMessage("SBLP_SYS_SUPPLI_DESC"),
		),
		"SELLER_COMPANY_ACCOUNTANT_NAME" => array(
			'GROUP' => 'SELLER_COMPANY',
			'SORT' => 1400,
			"NAME" => Loc::getMessage("SBLP_ACC_SUPPLI"),
		),
		"SELLER_COMPANY_ACCOUNTANT_POSITION" => array(
			'GROUP' => 'SELLER_COMPANY',
			'SORT' => 1500,
			"NAME" => Loc::getMessage("SBLP_ACC_POS_SUPPLI"),
		),
		"BUYER_PERSON_COMPANY_NAME" => array(
			'GROUP' => 'BUYER_PERSON_COMPANY',
			'SORT' => 1600,
			"NAME" => Loc::getMessage("SBLP_CUSTOMER"),
			"DESCRIPTION" => Loc::getMessage("SBLP_CUSTOMER_DESC"),
			"VALUE" => "COMPANY_NAME",
			"TYPE" => "PROPERTY"
		),
		"BUYER_PERSON_COMPANY_ADDRESS" => array(
			'GROUP' => 'BUYER_PERSON_COMPANY',
			'SORT' => 1700,
			"NAME" => Loc::getMessage("SBLP_CUSTOMER_ADRES"),
			"DESCRIPTION" => Loc::getMessage("SBLP_CUSTOMER_ADRES_DESC"),
			'DEFAULT' => array(
				"VALUE" => "ADDRESS",
				"TYPE" => "PROPERTY"
			)
		),
		"BUYER_PERSON_COMPANY_FAX" => array(
			'GROUP' => 'BUYER_PERSON_COMPANY',
			'SORT' => 1800,
			"NAME" => Loc::getMessage("SBLP_CUSTOMER_FAX"),
			"DESCRIPTION" => Loc::getMessage("SBLP_CUSTOMER_FAX_DESC"),
		),
		"BUYER_PERSON_COMPANY_PHONE" => array(
			'GROUP' => 'BUYER_PERSON_COMPANY',
			'SORT' => 1900,
			"NAME" => Loc::getMessage("SBLP_CUSTOMER_PHONE"),
			"DESCRIPTION" => Loc::getMessage("SBLP_CUSTOMER_PHONE_DESC"),
			'DEFAULT' => array(
				"VALUE" => "PHONE",
				"TYPE" => "PROPERTY"
			)
		),
		"BUYER_PERSON_COMPANY_DOGOVOR" => array(
			'GROUP' => 'BUYER_PERSON_COMPANY',
			'SORT' => 2000,
			"NAME" => Loc::getMessage("SBLP_CUSTOMER_DOGOVOR"),
			"DESCRIPTION" => Loc::getMessage("SBLP_CUSTOMER_DOGOVOR"),
			),
		"BILLUA_COMMENT1" => array(
			'GROUP' => 'FOOTER_SETTINGS',
			'SORT' => 2100,
			"NAME" => Loc::getMessage("SBLP_COMMENT1"),
			'DEFAULT' => array(
				"VALUE" => Loc::getMessage("SBLP_COMMENT1_VALUE"),
				"TYPE" => 'VALUE'
			)
		),
		"BILLUA_COMMENT2" => array(
			'GROUP' => 'FOOTER_SETTINGS',
			'SORT' => 2200,
			"NAME" => Loc::getMessage("SBLP_COMMENT2")
		),
		"BILLUA_PATH_TO_STAMP" => array(
			'GROUP' => 'SELLER_COMPANY',
			'SORT' => 2300,
			"NAME" => Loc::getMessage("SBLP_PRINT"),
			"DESCRIPTION" => Loc::getMessage("SBLP_PRINT_DESC"),
			'INPUT' => array(
				'TYPE' => 'FILE'
			)
		),
		"SELLER_COMPANY_ACC_SIGN" => array(
			'GROUP' => 'SELLER_COMPANY',
			'SORT' => 2400,
			"NAME" => Loc::getMessage("SBLP_ACC_SIGN_SUPPLI"),
			'INPUT' => array(
				'TYPE' => 'FILE'
			)
		),
		"BILLUA_BACKGROUND" => array(
			"NAME" => Loc::getMessage("SBLP_BACKGROUND"),
			'SORT' => 2500,
			'GROUP' => 'VISUAL_SETTINGS',
			"DESCRIPTION" => Loc::getMessage("SBLP_BACKGROUND_DESC"),
			'INPUT' => array(
				'TYPE' => 'FILE'
			)
		),
		"BILLUA_BACKGROUND_STYLE" => array(
			"NAME" => Loc::getMessage("SBLP_BACKGROUND_STYLE"),
			'SORT' => 2600,
			'GROUP' => 'VISUAL_SETTINGS',
			"INPUT" => array(
				'TYPE' => 'ENUM',
				'OPTIONS' => array(
					'none' => Loc::getMessage("SBLP_BACKGROUND_STYLE_NONE"),
					'tile' => Loc::getMessage("SBLP_BACKGROUND_STYLE_TILE"),
					'stretch' => Loc::getMessage("SBLP_BACKGROUND_STYLE_STRETCH")
				)
			),
			"TYPE" => "SELECT"
		),
		"BILLUA_MARGIN_TOP" => array(
			"NAME" => Loc::getMessage("SBLP_MARGIN_TOP"),
			'SORT' => 2700,
			'GROUP' => 'VISUAL_SETTINGS',
			'DEFAULT' => array(
				"VALUE" => "15",
				"TYPE" => 'VALUE'
			)
		),
		"BILLUA_MARGIN_RIGHT" => array(
			"NAME" => Loc::getMessage("SBLP_MARGIN_RIGHT"),
			'SORT' => 2800,
			'GROUP' => 'VISUAL_SETTINGS',
			'DEFAULT' => array(
				"VALUE" => "15",
				"TYPE" => 'VALUE'
			)
		),
		"BILLUA_MARGIN_BOTTOM" => array(
			"NAME" => Loc::getMessage("SBLP_MARGIN_BOTTOM"),
			'SORT' => 2900,
			'GROUP' => 'VISUAL_SETTINGS',
			'DEFAULT' => array(
				"VALUE" => "15",
				"TYPE" => 'VALUE'
			)
		),
		"BILLUA_MARGIN_LEFT" => array(
			"NAME" => Loc::getMessage("SBLP_MARGIN_LEFT"),
			'SORT' => 3000,
			'GROUP' => 'VISUAL_SETTINGS',
			'DEFAULT' => array(
				"VALUE" => "20",
				"TYPE" => 'VALUE'
			)
		),
		"BILLUA_COLUMN_NUMBER_SHOW" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_NUMBER_SHOW"),
			'SORT' => 3100,
			'GROUP' => 'COLUMN_SETTINGS',
			"INPUT" => array(
				'TYPE' => 'Y/N'
			),
			'DEFAULT' => array(
				"PROVIDER_VALUE" => "Y",
				"PROVIDER_KEY" => "INPUT"
			)
		),
		"BILLUA_COLUMN_NUMBER_TITLE" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_NUMBER_TITLE"),
			'SORT' => 3200,
			'GROUP' => 'COLUMN_SETTINGS',
			'DEFAULT' => array(
				"PROVIDER_VALUE" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_NUMBER_VALUE"),
				"PROVIDER_KEY" => "VALUE"
			)
		),
		"BILLUA_COLUMN_NAME_SHOW" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_NAME_SHOW"),
			'SORT' => 3300,
			'GROUP' => 'COLUMN_SETTINGS',
			"INPUT" => array(
				'TYPE' => 'Y/N'
			),
			'DEFAULT' => array(
				"PROVIDER_VALUE" => "Y",
				"PROVIDER_KEY" => "INPUT"
			)
		),
		"BILLUA_COLUMN_NAME_TITLE" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_NAME_TITLE"),
			'SORT' => 3400,
			'GROUP' => 'COLUMN_SETTINGS',
			'DEFAULT' => array(
				"PROVIDER_VALUE" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_NAME_VALUE"),
				"PROVIDER_KEY" => "VALUE"
			)
		),
		"BILLUA_COLUMN_QUANTITY_SHOW" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_QUANTITY_SHOW"),
			'SORT' => 3500,
			'GROUP' => 'COLUMN_SETTINGS',
			"INPUT" => array(
				'TYPE' => 'Y/N'
			),
			'DEFAULT' => array(
				"PROVIDER_VALUE" => "Y",
				"PROVIDER_KEY" => "INPUT"
			)
		),
		"BILLUA_COLUMN_QUANTITY_TITLE" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_QUANTITY_TITLE"),
			'SORT' => 3600,
			'GROUP' => 'COLUMN_SETTINGS',
			'DEFAULT' => array(
				"PROVIDER_VALUE" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_QUANTITY_VALUE"),
				"PROVIDER_KEY" => "VALUE"
			)
		),
		"BILLUA_COLUMN_MEASURE_SHOW" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_MEASURE_SHOW"),
			'SORT' => 3700,
			'GROUP' => 'COLUMN_SETTINGS',
			"INPUT" => array(
				'TYPE' => 'Y/N'
			),
			'DEFAULT' => array(
				"PROVIDER_VALUE" => "Y",
				"PROVIDER_KEY" => "INPUT"
			)
		),
		"BILLUA_COLUMN_MEASURE_TITLE" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_MEASURE_SHOW"),
			'SORT' => 3800,
			'GROUP' => 'COLUMN_SETTINGS',
			'DEFAULT' => array(
				"PROVIDER_VALUE" => Loc::getMessage('SALE_HPS_BILL_UA_COLUMN_MEASURE_VALUE'),
				"PROVIDER_KEY" => "VALUE"
			)
		),
		"BILLUA_COLUMN_PRICE_SHOW" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_PRICE_SHOW"),
			'SORT' => 3900,
			'GROUP' => 'COLUMN_SETTINGS',
			"INPUT" => array(
				'TYPE' => 'Y/N'
			),
			'DEFAULT' => array(
				"PROVIDER_VALUE" => "Y",
				"PROVIDER_KEY" => "INPUT"
			)
		),
		"BILLUA_COLUMN_PRICE_TITLE" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_PRICE_TITLE"),
			'SORT' => 4000,
			'GROUP' => 'COLUMN_SETTINGS',
			'DEFAULT' => array(
				"PROVIDER_VALUE" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_PRICE_VALUE"),
				"PROVIDER_KEY" => "VALUE"
			)
		),
		"BILLUA_COLUMN_PRICE_TAX_TITLE" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_PRICE_TAX_TITLE"),
			'SORT' => 4100,
			'GROUP' => 'COLUMN_SETTINGS',
			'DEFAULT' => array(
				"PROVIDER_VALUE" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_PRICE_TAX_VALUE"),
				"PROVIDER_KEY" => "VALUE"
			)
		),
		"BILLUA_COLUMN_SUM_SHOW" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_SUM_SHOW"),
			'SORT' => 4200,
			'GROUP' => 'COLUMN_SETTINGS',
			"INPUT" => array(
				'TYPE' => 'Y/N'
			),
			'DEFAULT' => array(
				"PROVIDER_VALUE" => "Y",
				"PROVIDER_KEY" => "INPUT"
			)
		),
		"BILLUA_COLUMN_SUM_TITLE" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_SUM_TITLE"),
			'SORT' => 4300,
			'GROUP' => 'COLUMN_SETTINGS',
			'DEFAULT' => array(
				"PROVIDER_VALUE" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_SUM_VALUE"),
				"PROVIDER_KEY" => "VALUE"
			)
		),
		"BILLUA_COLUMN_SUM_TAX_TITLE" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_SUM_TAX_TITLE"),
			'SORT' => 4400,
			'GROUP' => 'COLUMN_SETTINGS',
			'DEFAULT' => array(
				"PROVIDER_VALUE" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_SUM_TAX_VALUE"),
				"PROVIDER_KEY" => "VALUE"
			)
		),
		"BILLUA_COLUMN_VAT_RATE_SHOW" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_VAT_RATE_SHOW"),
			'SORT' => 4500,
			'GROUP' => 'COLUMN_SETTINGS',
			"INPUT" => array(
				'TYPE' => 'Y/N'
			),
			'DEFAULT' => array(
				"PROVIDER_VALUE" => "N",
				"PROVIDER_KEY" => "INPUT"
			)
		),
		"BILLUA_COLUMN_VAT_RATE_TITLE" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_COLUMN_VAT_RATE_TITLE"),
			'SORT' => 4600,
			'GROUP' => 'COLUMN_SETTINGS',
			'DEFAULT' => array(
				"PROVIDER_VALUE" => Loc::getMessage('SALE_HPS_BILL_UA_COLUMN_VAT_RATE_VALUE'),
				"PROVIDER_KEY" => "VALUE"
			)
		),
		"BILLUA_HEADER" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_HEADER"),
			'SORT' => 4700,
			'GROUP' => 'HEADER_SETTINGS',
			'DEFAULT' => array(
				"PROVIDER_VALUE" => Loc::getMessage('SALE_HPS_BILL_UA_HEADER_VALUE'),
				"PROVIDER_KEY" => "VALUE"
			)
		),
		"BILLUA_TOTAL_SHOW" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_TOTAL_SHOW"),
			'SORT' => 4900,
			'GROUP' => 'FOOTER_SETTINGS',
			"INPUT" => array(
				'TYPE' => 'Y/N'
			),
			'DEFAULT' => array(
				"PROVIDER_VALUE" => "Y",
				"PROVIDER_KEY" => "INPUT"
			)
		),
		"BILLUA_SELLER_SHOW" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_SELLER_SHOW"),
			'SORT' => 5000,
			'GROUP' => 'HEADER_SETTINGS',
			"INPUT" => array(
				'TYPE' => 'Y/N'
			),
			'DEFAULT' => array(
				"PROVIDER_VALUE" => "Y",
				"PROVIDER_KEY" => "INPUT"
			)
		),
		"BILLUA_PAYER_SHOW" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_PAYER_SHOW"),
			'SORT' => 5100,
			'GROUP' => 'BUYER_PERSON_COMPANY',
			"INPUT" => array(
				'TYPE' => 'Y/N'
			),
			'DEFAULT' => array(
				"PROVIDER_VALUE" => "Y",
				"PROVIDER_KEY" => "INPUT"
			)
		),
		"BILLUA_FOOTER_SHOW" => array(
			"NAME" => Loc::getMessage("SALE_HPS_BILL_UA_FOOTER_SHOW"),
			'SORT' => 5200,
			'GROUP' => 'FOOTER_SETTINGS',
			"INPUT" => array(
				'TYPE' => 'Y/N'
			),
			'DEFAULT' => array(
				"PROVIDER_VALUE" => "Y",
				"PROVIDER_KEY" => "INPUT"
			)
		),
	)
);