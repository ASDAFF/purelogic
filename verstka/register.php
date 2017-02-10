<?php include('includes/header.php'); ?>

<?php include('includes/main_logo.php'); ?>
<section class="register">
	<div class="container">
	<h2>Регистрация нового пользователя</h2>
		<div class="row">
			<form action="#" class="register">
			<p>Заполните, пожалуйста, все поля формы:</p>
				<div class="col-md-6">
					<input type="text" required value="" placeholder="Ваше имя" >
					<input type="email" placeholder="E-mail"  >
					
				</div>
				<div class="col-md-6">
					<input type="password" placeholder="Пароль" >
					<input type="password" placeholder="Повторите пароль" >
				</div>
				<div class="col-md-6">
					<input type="submit" value="Регистрация">
				</div>
			</form>
		</div>
	</div>
</section>


<!-- Novosti slider -->
<?php include('includes/slider_novosti.php'); ?>

<!-- Popular tovar -->
<?php include('includes/popular_slider.php'); ?>

<!-- FOOTER -->
<?php include('includes/footer.php'); ?>