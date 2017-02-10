<?php include('includes/header.php'); ?>

<?php include('includes/main_logo.php'); ?>
<section class="user_acaunnt">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2>Кабинет пользователя</h2>
				<input type="text"  class="user_name" value="info@purelogic.ru"> 
				<div class="time_ucaunt">
					<p>Вы зарегистрированы как физическое лицо <span>12.02.2015, 09:18  </span></p>     
					<span>|</span>     
					<p>Последняя авторизация:  <span>13.02.2015, 08:06</span></p>
				</div>
			
			</div>
			<div class="col-md-4">
				<div class="col-md-4 col-sm-4 col-xs-6 padding_0">
					<div class="icon_but_wr">
						<a href="#" class="icon_but">
							<img src="img/icon/text.png" alt="">
						</a>
						<p>Заказы</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 hidden-xs padding_0">
					<div class="icon_but_wr">
						<a href="#" class="icon_but">
							<img src="img/icon/forum.png" alt="">
						</a>
						<p>Форум</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-6 padding_0">
					<div class="icon_but_wr">
						<a href="#" class="icon_but">
							<img src="img/icon/cal.png" alt="">
						</a>
						<p>Поддержка</p>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<section class="user_inf">
					<div class="hidden-md hidden-sm hidden-xs col-lg-2">
						<div class="img_form_user">
							<img src="img/icon/people_user.png" alt="">
						</div>
					</div>
					<form action="#" id="user_form">
						<div class="col-md-12 col-lg-3">
							<h4>Личная информация</h4>
						</div>
						<div class="col-md-12 col-lg-7 ">
							<p>Поля, отмеченные звездочкой, обязательны для заполнения</p>
						</div>
						<div class="col-md-5 col-lg-3">
							<label for="text">Фамилия, имя, отчество (полностью)*</label>
						</div>
						<div class="col-md-7">
							<input type="text" required value="" >
						</div>
	                    <div class="col-md-5 col-lg-3">
							<label for="email">Дополнительная электронная почта</label>
						</div>
						<div class="col-md-7">
							<input type="email"  >
						</div>
						<div class="col-md-5 col-lg-3">
							<label for="tel">Контактный телефон</label>
						</div>
						<div class="col-md-7">
							<input type="tel" >
						</div>
						<div class="col-md-5 col-lg-3">
							<label for="password">Для смены пароля введите новый:</label>
						</div>
						<div class="col-md-7">
							<input type="password"  >
						</div>
						<div class="col-md-5 col-lg-3">
							<label for="password">Подтвердите новый пароль:</label>
						</div>
						<div class="col-md-7">
							<input type="password" >
						</div>
						<div class="col-md-5 col-lg-3">
							<label>Дополнительная информация</label>
						</div>
						<div class="col-md-7">
							<textarea name="#" ></textarea>
						</div>

						<div class="col-md-8 col-sm-10 col-ld-6 col-xs-10">
							<label>Подписка на рассылку новостей и специальных предложений от Purelogic R&D </label>  
						</div>
						<div class="col-md-1 col-sm-2 col-xs-2 padding-left_0">
							<input type="checkbox" name="rasl" value="rasl">
						</div>	
						<div class="col-md-8 col-sm-10 col-ld-6 col-xs-10" >
							<label>Согласен на обработку моих персональных данных* <a href="#">Условия предоставления</a></label>
						</div>
						<div class="col-md-1 col-sm-2 col-xs-2 padding-left_0">
							<input type="checkbox" name="rasl" value="rasl">
						</div>
						<div class="col-md-12 col-sm-4 col-lg-3 col-lg-offset-7">
							<input type="submit" value="сохранить">
						</div>
					</form>
				</section>
				
			</div>
			<div class="col-md-12">
				<section class="user_inf_dostavka">
					<div class="hidden-md  hidden-sm hidden-xs col-lg-2">
						<div class="img_form_user">
							<img src="img/icon/bus.png" alt="">
						</div>
					</div>
					<form action="#" id="user_form">
					<div class="col-md-12 col-lg-3">
							<h4>Информация о доставке</h4>
						</div>
						<div class="col-md-12 col-lg-7">
							<p>Поля, отмеченные звездочкой, обязательны для заполнения</p>
						</div>
						<div class="radio">
							<div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
							<input type="radio" name="имя"> <p>Самовывоз (г. Воронеж)</p>

							</div>
							
							<div class="col-md-6 col-lg-2 col-sm-6 col-xs-12">
								<input type="radio" name="имя" > <p><span>EMS</span></p>
							</div>
							<div class="col-md-6 col-lg-2 col-sm-6 col-xs-12">
								<input type="radio" name="имя" > <p><span>СПСР</span>www.spsr.ru</p>
							</div>
		                    <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
		                    	<div class="col-md-4 col-sm-5 col-xs-6 padding_0"><input type="radio" name="имя" ><p>Другое</p></div>
								<div class="col-md-8 col-sm-7 col-xs-6"><input type="text" ></div>
								
							</div>
							
						</div>
						<div class="col-lg-7 col-md-12 col-lg-offset-3 col-xs-12">
								<p>Со стоимостью доставки Вы можете ознакомиться на сайте транспортной компании</p>
							</div>
						
					
						<div class="col-md-3">
							<label for="tel">Почтовый индекс*</label>
						</div>
						<div class="col-md-2">
							<input type="tel" >
						</div>
						<div class="col-md-1">
							<label>Страна*</label>
						</div>
						<div class="col-md-4">
							<select id="demo" tabindex="1">
			                    <option >Российская Федерация</option>
			                    <option >Казахстан</option>
			                    <option >Украина</option>
			                    <option >Беларусь</option>
			                    <option >Молдова</option>
			                   	<option >Румуния</option>
			                   
			                </select>
						</div>

						
						
						<div class="col-md-3">
							<label for="text">Регион, область, край*</label>
						</div>
						<div class="col-md-7">
							<input type="text" required value="" >
						</div>
						<div class="col-md-3">
							<label for="text">Район*</label>
						</div>
						<div class="col-md-7">
							<input type="text" required value="" >
						</div>
						<div class="col-md-3">
							<label for="text">Населеный пункт*</label>
						</div>
						<div class="col-md-7">
							<input type="text" required value="" >
						</div>
						<div class="col-md-3">
							<label for="text">Улица*</label>
						</div>
						<div class="col-md-7">
							<input type="text" required value="" >
						</div>
						<div class="col-md-3">
							<label for="text">Корпус,строение</label>
						</div>
						<div class="col-md-2">
							<input type="text" required value="" >
						</div>
						<div class="col-md-3">
							<div class="col-md-4 padding-left_0"> 
								<label for="text">Дом*</label>
							</div> 	
							<div class="col-md-8 padding-left_0"> 
								<input type="text" required value="" >
							</div>	
						</div>
						<div class="col-md-2">
							<div class="col-md-6 padding_0"> 
								<label for="text">Квартира</label>
							</div> 	
							<div class="col-md-6 padding_0"> 
								<input type="text" required value="" >
							</div>	
						</div>
						<div class="col-md-10">
							<textarea name="" id="" cols="30" rows="10" placeholder="Если это необходимо, напишите, пожалуйста, любую уточняющую информацию "></textarea>
						</div>
						<div class="col-lg-3 col-lg-offset-9 col-md-10">
							<input type="submit" value="сохранить">
						</div>
						
					</form>
				</section>
				
			</div>
		</div>
	</div>
</section>


<?php include('includes/news_blok_slider.php'); ?>

<?php include('includes/footer.php'); ?>