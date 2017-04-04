<?php

namespace Bitrix\Sale\Cashbox;

use Bitrix\Main\NotImplementedException;

abstract class Ofd
{
	const TEST_MODE = 0;
	const ACTIVE_MODE = 1;

	protected $testModeOn = false;

	/**
	 * @return array
	 */
	public static function getHandlerList()
	{
		return array(
			'\Bitrix\Sale\Cashbox\FirstOfd' => FirstOfd::getName()
		);
	}

	/**
	 * @param string $handler
	 * @return Ofd|null
	 */
	public static function create($handler)
	{
		if (class_exists($handler))
			return new $handler();

		return null;
	}

	/**
	 * Operator constructor.
	 */
	private function __construct() {}

	/**
	 * @param $data
	 * @return string
	 */
	abstract public function generateCheckLink($data);

	/**
	 * @throws NotImplementedException
	 * @return string
	 */
	public static function getName()
	{
		throw new NotImplementedException();
	}

	/**
	 * @param $mode
	 */
	public function setMode($mode)
	{
		$this->testModeOn = ($mode === static::TEST_MODE);
	}
}