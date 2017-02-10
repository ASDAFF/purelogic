<?php include('includes/header.php'); ?>

<?php include('includes/main_logo.php'); ?>
<section class="card_company">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Оформление заказа</h2>
				<div class=" zakaz_table">
				
				

					<div class="zakaz_tovar">
						<div class="col-md-2">
							<p>PLD57</p>
						</div>
						<div class="col-md-7">
							<p>Компактный драйвер шагового двигателя нового поколения PLD57</p>
						</div>	
						<div class="col-md-1">
							<p>1</p>
						</div>
						<div class="col-md-2">
							<p class="right">5400 RUB</p>
						</div>
					</div>

					<div class="zakaz_tovar">
						<div class="col-md-2">
							<p>PLD57</p>
						</div>
						<div class="col-md-7">
							<p>Компактный драйвер шагового двигателя нового поколения PLD57</p>
						</div>	
						<div class="col-md-1">
							<p>1</p>
						</div>
						<div class="col-md-2">
							<p class="right">5400 RUB</p>
						</div>
					</div>

					<div class="zakaz_tovar">
						<div class="col-md-2">
							<p>PLD57</p>
						</div>
						<div class="col-md-7">
							<p>Компактный драйвер шагового двигателя нового поколения PLD57</p>
						</div>	
						<div class="col-md-1">
							<p>1</p>
						</div>
						<div class="col-md-2">
							<p class="right">5400 RUB</p>
						</div>
					</div>
					<div class="zakaz_itog">
						<div class="col-md-3 col-lg-2 col-md-offset-9 col-lg-offset-10">
							<p>Итог<span>21000 RUB</span></p>
						</div>
					</div>
				</div>
				<form action="#" id="user_form" class="card_company">
					<div class="col-md-12 padding_0">
						<textarea name="#" placeholder="Если это необходимо, напишите, пожалуйста, любую уточняющую информацию к Вашему заказу"></textarea>
						<p>Если Вам нужна обработка винтов и направляющих, приложите все необходимые чертежи.</p>
					</div>
					<div class="div_cherteg">
					<div class="col-md-6">
						<p>Прикрепить чертежи:</p>
						<ul>
							<li>Чертеж 1.png <a href="#">x</a></li>
							<li>Чертеж 1.png <a href="#">x</a></li></li>
						</ul>
					</div>
						
					</div>

					<div class="col-md-3 padding_0">
						<a href="#" class="zagr_foto btn">Загрузить файл</a>

					</div>
					<h3 class="card_setion_name">Личные данные</h3>
					

					<div class="col-md-9">
						
						<p>Заполните, пожалуйста, все поля формы</p>
						<div class="radio">
							<div class="col-md-4 col-xs-12 col-sm-6 padding-left_0">
								<input type="radio" name="#"> <p>Физичиское лицо</p>

							</div>
							
							<div class="col-md-4 col-xs-12 col-sm-6">
								<input type="radio" name="#" > <p>Юридическое лицо</p>
							</div>
						</div>
						<input type="email" placeholder="E-mail"  >
						<input type="password" placeholder="Пароль" >
						<input type="password" placeholder="Повторите пароль" >
						<input type="text" required value="" placeholder="Наименование организации" >
						<input type="text" required value="" placeholder="Телефон" >
						<h5>Реквизиты организации</h5>
						<p>Вы можете заполнить форму или загрузить документ с реквизитами.</p>

						<div class="col-md-6 padding-left_0">
							<a href="#" class="btn">Загрузить</a>
						</div>
						<div class="col-md-6 padding-left_0">
							<div class="div_cherteg">
								<ul>
									<li>Чертеж 1.png <a href="#">x</a></li>
									<li>Чертеж 1.png <a href="#">x</a></li></li>
								</ul>
							</div>
						</div>
						<textarea name="#" placeholder="Реквизиты юридического лица"></textarea>
					</div>
					<h3 class="card_setion_name">Доставка</h3>
					<p class="margin_top_40">Выберите удобный для Вас способ доставки. Поля, отмеченные звездочкой, обязательны для заполнения.
					<br/>Со стоимостью доставки можете ознакомиться на сайте транспортной компании.</p>
						<div class="radio">
							<div class="col-md-3  col-xs-12 col-sm-6">
								<input type="radio" name="имя"> <p>Самовывоз (г. Воронеж)</p>

							</div>
							
							<div class="col-md-3  col-xs-12 col-sm-6">
								<input type="radio" name="имя" > <p><span>EMS</span></p>
							</div>
							<div class="col-md-3 col-xs-12 col-sm-6">
								<input type="radio" name="имя" > <p><span>СПСР</span>www.spsr.ru</p>
							</div>
		                    <div class="col-md-3 col-xs-12 col-sm-6">
		                    	<div class="col-md-4 padding_0"><input type="radio" name="имя" ><p>Другое</p></div>
							</div>
							
						</div>
					<div class="col-md-6 padding-left_0">
						<input type="text" required value="" placeholder="Почтовый индекс*" >
						<input type="text" required value="" placeholder="Страна*" >
						<input type="text" required value="" placeholder="Регион, область, край*" >
						<input type="text" required value="" placeholder="Район*" >
						<input type="text" required value="" placeholder="Населеный пункт*" >
					</div>	
					<div class="col-md-6 ">
						<input type="text" required value="" placeholder="Улица*" >
						<input type="text" required value="" placeholder="Корпус,строение" >
						<input type="text" required value="" placeholder="Дом*" >
						<input type="text" required value="" placeholder="Квартира,офис*" >
						
					</div>	
					<div class="col-md-12 padding_0">
						<p>После того, как заказ будет подтвержден, с Вами свяжется менеджер и уточнит информацию по заказу.Если ответа от Вас не будет в течение двух рабочих дней, то заказ будет
						аннулирован.</p>
					</div>
					<div class="col-md-6 col-md-offset-6">
						<div class="col-md-6 col-sm-6 padding-left_0">
							<a href="#" class="btn_grey">Вернуться в козину</a>
							
						</div>
						<div class="col-md-6 col-sm-6 padding-left_0">
							
							<input type="submit" class="btn" required value="отправить" >
						</div>
					</div>
				</form>	


			</div>
		</div>
	</div>
</section>
<?php include('includes/news_blok_slider.php'); ?>

<!-- FOOTER -->
<?php include('includes/footer.php'); ?>			