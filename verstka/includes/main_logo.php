<section class="main_logo">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-6 col-sm-5 сol-xs-12">
				<div class="logo">
					<a href="/"><img src="../img/main_logo.png" alt=""></a>
				</div>
				<a class="menu-toggle_cat hidden-lg hidden-md hidden-sm " href="#"><span>Menu</span></a>
			</div>

			<div class="col-md-6 col-lg-6 col-sm-7  padding-xs-0 col-xs-12">
			
				<div class="main_logo_menu ">
					<ul>
						<li class="hidden-xs"><a href="/" class="glavna">!</a></li>
						<li><a href="/main_categories.php">Каталог</a></li>
						<li><a href="/main_help.php">Поддержка</a></li>
						<li><a href="/company.php" class="last_a">О компании</a></li>
						<li class="hidden-lg hidden-sm hidden-md black_bg "><a href="#reg-05" class="obr_zvon_popop" >Обратный звонок</a></li>
						<li class="hidden-lg hidden-sm hidden-md black_bg"><a href="#reg-03" class="vhod_pop" >Личный кабинет</a></li>
						<!-- Popup kabinet -->
						<div id="reg-03" class="popup-modal reg_popup slider mfp-hide">
	                            <div id="login-form">
		                            <div class="logo_popup">
		                            	<img src="../img/main_logo.png" alt="">
		                            </div>
	                            	
	                                <form action="#" id="user_form" >
	                                    <input type="text" required value="" placeholder="Имя" >
	                                    <input type="password"  placeholder="Пароль" >
	                                    <input type="submit" class="btn" value="Войти">
	                                </form>
	                            </div>
	                        </div> 
	                    <!-- Popup obrat_zvonok -->
						<div id="reg-05" class="popup-modal reg_popup slider mfp-hide">
	                        <div id="login-form">
	                        <h2>Обратный звонок</h2>
		                      <form action="#" id="user_form" >
	                                <input type="text" name="" placeholder="Имя" />
									<input type="text" name="" placeholder="Телефон" />
									<input type="submit" name="" value="Перезвоните мне" class="submit btn" />
	                            </form>
	                        </div>
	                    </div> 


					</ul>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- Форма входа при клике  -->
<section class="main_logo_vhod">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-lg-4  col-sm-6 col-xs-5 ">
				<div class="logo">
					<img src="../img/main_logo.png" alt="">
				</div>
			</div>
			<div class="col-md-9 col-lg-8 col-sm-6 col-xs-7 ">
				<div class="main_vhod">
					<a href="/register.php">регистрация</a>
					<form class="hidden-sm hidden-xs" action="javascript:void(0);" method="get">

                             <label for="email">e-mail</label>
                            <input type="email" required value="" >
                            <label for="password">пароль</label>
                            <input  type="password" required value="" >
                           
                            <input type="submit" value="войти">
                         </form>
                    <a href="#reg-03" class="btn hidden-md hidden-lg user_header" >войти</a> 

                    <div id="reg-03" class="popup-modal reg_popup slider mfp-hide">
                            <div id="login-form">
	                            <div class="logo_popup">
	                            	<img src="../img/main_logo.png" alt="">
	                            </div>
                            	
                                <form action="#" id="user_form" >
                                    <input type="text" required value="" placeholder="Имя" >
                                    <input type="password"  placeholder="Пароль" >
                                    <input type="submit" class="btn" value="Войти">
                                </form>
                            </div>
                        </div>
					<a href="#" class="vspomnit_parol">вспомнить пароль</a>
				</div>
			</div>
		</div>
	</div>
</section>