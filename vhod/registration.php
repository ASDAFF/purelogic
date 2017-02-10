<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

?>

<?
global $USER;
if (!$USER->IsAuthorized()){
   
      
if($_POST["name"]!=""&&$_POST["email"]!=""){
$user = new CUser;
$arFields = Array(
  "NAME"              => $_POST["name"],

  "EMAIL"             => $_POST["email"],
  "LOGIN"             => $_POST["email"],
  "LID"               => "ru",
  "ACTIVE"            => "Y",
  "GROUP_ID"          => array(3,4,6),
  "PASSWORD"          => $_POST["password"],
  "CONFIRM_PASSWORD"  => $_POST["confirm_password"],
  
);

$ID = $user->Add($arFields);
if (intval($ID) > 0)
{
$USER->Authorize($ID);
    echo "Пользователь успешно добавлен.";
	?>
	<script>window.location="/";</script>
	<?
	}
else
    echo $user->LAST_ERROR;

}
  

?>

<section class="register">
	<div class="container">
	<h2>Регистрация нового пользователя</h2>
		<div class="row">
		<form method="post" action="" class="register">
			
			<p>Заполните, пожалуйста, все поля формы:</p>
				<div class="col-md-6">
					<input type="text" required name="name" placeholder="Ваше имя">
					
					<input type="text" required name="email" placeholder="E-mail">
				</div>
				<div class="col-md-6">
				<input type="password" required name="password" placeholder="Пароль" >
				<input type="password" required name="confirm_password" placeholder="Повторите пароль" >
					
				</div>
				<div class="col-md-6">
					<input type="submit" value="Регистрация">
				</div>
			</form>
		</div>
	</div>
</section>

	<?}else{?>
	Вы уже авторизованы
	<?}?>
   
			
		<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>	