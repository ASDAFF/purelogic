<?

namespace Bitrix\Main\Grid\Panel;


class Actions
{
	const CREATE = "CREATE";
	const SEND = "SEND";
	const ACTIVATE = "ACTIVATE";
	const SHOW = "SHOW";
	const HIDE = "HIDE";
	const REMOVE = "REMOVE";
	const CALLBACK = "CALLBACK";
	const INLINE_EDIT = "INLINE_EDIT";
	const HIDE_ALL_EXPECT = "HIDE_ALL_EXPECT";
	const SHOW_ALL = "SHOW_ALL";

	public static function getList()
	{
		$reflection = new \ReflectionClass(__CLASS__);
		return $reflection->getConstants();
	}
}