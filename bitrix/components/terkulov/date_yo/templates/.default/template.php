<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?


?>
<?

$tt=explode(":",$arParams["TIME"]);

			$now = new DateTime();
$future_date = new DateTime($arParams["WHEN"]);
$interval = $future_date->diff($now);

if($now>$future_date)
{
if($interval->h-(int)$tt[0]<0)
{
echo "<p>Перерыв</p>";
}
else
{
if($interval->i-(int)$tt[1]<0)
echo "<p>Перерыв</p>";
else
echo "<p>Обеденный перерыв будет <span>через ".(24-$interval->h)." ч. ".(60-$interval->i)." м.</span> </p>";

}


}
else
{
echo "<p>Обеденный перерыв будет <span>через ".($interval->h)." ч. ".$interval->i." м.</span> </p>";
}



				?>
