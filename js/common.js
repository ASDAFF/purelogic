$(document).ready(function() {

    //console.log(123321);
    $('.other-btn-product-docs').mouseenter(function(){
        $('.other-block-product-docs',$(this).parent()).css('display','block');
    });
    $('.other-block-product-docs').mouseleave(function(){
        $(this).removeAttr('style');
    })

$( ".new_left_menu li" ).mouseenter(function() {

    $('.background-icon-menu',this).css('display','none');
    $('.uf-menu-pic-hover',this).css('display','block');

      if($(".new_left_menu").height() > $("#"+$(this).attr("data-id")+" .lftnnv").height()){
          $("#"+$(this).attr("data-id")+" .lftnnv").css('min-height',$(".new_left_menu").height()-30);
      }
 $(".big-back-formenu").addClass("yes");
    $("#"+$(this).attr("data-id")).addClass( "yes" );
  });

$( ".new_left_menu li" ).mouseleave(function() {

    $('.background-icon-menu',this).css('display','block');
    $('.uf-menu-pic-hover',this).css('display','none');

   $("#"+$(this).attr("data-id")).removeClass( "yes" );
   $(".big-back-formenu").removeClass("yes");
  });


$(window).scroll(function () {
  if ($(this).scrollTop() > 700 && $(this).scrollTop()< ($(".main_katalog").height())) {
   $(".fixed_dlv").addClass("fix");
  } else {
     $(".fixed_dlv").removeClass("fix");
  }
});


jQuery(".sort_up").click(function(){
jQuery("#sort_name").val(jQuery(this).attr("data-sort"));

jQuery("#firs_sort").val("ASC");
jQuery("#sort_form").submit();
});
jQuery(".sort_down").click(function(){ 
 
jQuery("#sort_name").val(jQuery(this).attr("data-sort"));
jQuery("#firs_sort").val("DESC");
jQuery("#sort_form").submit();
});
jQuery('select[name="cnt"]').change(function(){
jQuery("#sort_form").submit();

});
jQuery("form.add_in_card").append('<div class="plus_inpt">+</div><div class="minus_inpt">-</div>');
jQuery(".plus_inpt").click(function(){
jQuery(this).parent().find('input[name="quantity"]').val(parseInt(jQuery(this).parent().find('input[name="quantity"]').val())+1);
});
jQuery(".minus_inpt").click(function(){
if(parseInt(jQuery(this).parent().find('input[name="quantity"]').val())-1>0)
jQuery(this).parent().find('input[name="quantity"]').val(parseInt(jQuery(this).parent().find('input[name="quantity"]').val())-1);
});
jQuery(".open_descr").click(function(){
jQuery(this).toggleClass("yes");
jQuery(this).parent().parent().find(".detail_text").toggleClass("no");
jQuery(this).closest(".tovar_wr").find(".back-fon-yelow").toggleClass("yes");
});
    jQuery(".open_product").click(function(){
        jQuery(this).toggleClass("yes");
        jQuery(this).parent().parent().find(".box-products-group").toggleClass("no");
        //jQuery(this).closest(".tovar_wr").find(".col-md-9").toggleClass("yes");
    });

jQuery(".index_slider .l-r .right_news").click(function(){

var slider=jQuery(this).closest(".index_slider").find(".in_index_slider");

slider.animate({"left":-(slider.find(".img").width()+parseInt(slider.find(".img").css("margin-right"))+parseInt(slider.find(".img").css("margin-left")))},500,function(){
slider.append(slider.find(".img.current"));
slider.find(".img.current").removeClass("current");
slider.find(".img:first-child").addClass("current");
slider.css("left","0px");
});

});

jQuery(".index_slider .l-r .left_news").click(function(){

var slider=jQuery(this).closest(".index_slider").find(".in_index_slider");


slider.prepend(slider.find(".img:last-child"));

slider.css("left",-slider.find(".img").width());
slider.animate({"left":0},500,function(){
slider.find(".img.current").removeClass("current");
slider.find(".img:first-child").addClass("current");

});

});

jQuery(".block_nov").hover(function(){
jQuery("body").append('<div class="hover_yo"></div>');
jQuery(".hover_yo").append(jQuery(this).clone());
jQuery(".hover_yo").css("top",jQuery(this).offset().top-86);
jQuery(".hover_yo").css("left",jQuery(this).offset().left-117);
}, function(){

jQuery("body").find(".hover_yo").remove();
});


jQuery(".news_left .right_news").click(function(){

var slider=jQuery(this).closest(".news_left").find(".in_news_left");

slider.animate({"left":-(slider.find(".img").width()+parseInt(slider.find(".img").css("margin-right"))+parseInt(slider.find(".img").css("margin-left")))},500,function(){
slider.append(slider.find(".img.current"));
slider.find(".img.current").removeClass("current");
slider.find(".img:first-child").addClass("current");
slider.css("left","0px");
});
});


jQuery(".news_left .left_news").click(function(){

var slider=jQuery(this).closest(".news_left").find(".in_news_left");


slider.prepend(slider.find(".img:last-child"));

slider.css("left",-slider.find(".img").width());
slider.animate({"left":0},500,function(){
slider.find(".img.current").removeClass("current");
slider.find(".img:first-child").addClass("current");

});
});



jQuery(document).delegate(".form_author1","submit",function(e){

e.preventDefault();
var msg   = $('.form_author1').serialize();
$.ajax({
			type: "post",
			url: $(this).attr("action"),
			 data: msg,
		}).done(function(data) { 
		
		$(".form_vtt1").html($(data).find(".form_vtt1").html());
		
		});
		

});
jQuery(document).delegate(".form_author2","submit",function(e){

e.preventDefault();
var msg   = $('.form_author2').serialize();
$.ajax({
			type: "post",
			url: $(this).attr("action"),
			 data: msg,
		}).done(function(data) { 
		
		$(".form_vtt2").html($(data).find(".form_vtt2").html());
		
		});
		

});
$( ".error_yo .notetext:contains('Контрольная строка, а также ваши регистрационные данные были высланы по E-Mail. Пожалуйста, дождитесь письма, так как контрольная строка изменяется при каждом запросе.')" ).remove();
function explode(){ 
  
if($(".alx_feed_back_form_mess_ok").length>0)
  $(".zvon_form").slideToggle();
}
jQuery(document).delegate(".alx_feed_back_form_submit_block input","click",function(){ 

setTimeout(explode, 7000);
});

jQuery("span.open_brd").click(function(){
jQuery(this).parent().find(".mm_br").toggleClass("no");
if(jQuery(this).text()=="▼")
jQuery(this).text("▲");
else
jQuery(this).text("▼");
});

$(".card_company.take_form_order").submit(function(event ){
event.preventDefault();

$.getJSON( "", $( this ).serialize() )
  .done(function( json ) {
  if(json.order.ERROR !== undefined){
  if(json.order.ERROR.PROPERTY !== undefined){
$(".here_error").html("");
 jQuery.each(json.order.ERROR.PROPERTY, function() {
 $(".here_error").append('<p style="color:red">'+this+'</p>');
});
$("html, body").animate({ scrollTop: $('.here_error').offset().top }, 1000);
}
 if(json.order.ERROR.AUTH !== undefined) 
  alert("Авторизуйтесь");
  
  }
  if(json.order.REDIRECT_URL !== undefined)
  {
  window.location=json.order.REDIRECT_URL;
  }
 });

});
$(document).delegate("#basket_form_container .card_reset","click",function(e){
e.preventDefault();
$.ajax({
			type: "GET",
			url: $(this).attr("href"),
			
		}).done(function(data) {
		$("#basket_form_container").html($(data).find("#basket_form_container").html());
		});
});

jQuery(".go_auth").click(function(){

jQuery(".bx-system-auth-form input[name='USER_LOGIN']").val(jQuery(".i-email").val());
jQuery(".bx-system-auth-form input[name='USER_PASSWORD']").val(jQuery(".i-pass").val());
jQuery(".bx-system-auth-form form").submit();
});
jQuery(".go_user_p").click(function(){
jQuery(".inp_th_prs").val(jQuery(this).parent().find("input").val());
jQuery(".inp_th_prs").closest("form").submit();
});
jQuery('.deliv_chck').click(function(){
jQuery(".inp_deliv_prs").val(jQuery(this).parent().find("input").val());
jQuery(".inp_deliv_prs").closest("form").submit();
});
jQuery('.pay_chck').click(function(){
jQuery(".inp_pay_prs").val(jQuery(this).parent().find("input").val());
jQuery(".inp_pay_prs").closest("form").submit();
});

/*jQuery('input[name="DELIVERY_ID"]').click(function(){
jQuery(".yo-delivss").html(jQuery(this).clone());
jQuery(".yo-delivss").closest("form").submit();
});*/

jQuery(".div_cherteg .input input[type='file']").change(function(){

       var files = $(this).prop("files"); 
var names = $.map(files, function(val) { return val.name; });
var str="";

names.forEach(function(item, i, arr) {
  str=str+'<li>'+item+'</li>';
});
$(".its_files").html(str);
});


jQuery(".input-order input[type='file']").change(function(){

       var files = $(this).prop("files"); 
var names = $.map(files, function(val) { return val.name; });
var str="";
var tho=jQuery(this);
names.forEach(function(item, i, arr) {
if(tho.attr("data-id")==3)
  str=str+'<li><input type="hidden" name="ORDER_PROP_20['+tho.attr("data-prop")+'][ID]" value=""><input type="file" name="ORDER_PROP_20['+tho.attr("data-prop")+']" style="position: absolute; visibility: hidden;">'+item+'<a class="go_del_file">x</a></li>';
  else
  str=str+'<li><input type="hidden" name="ORDER_PROP_21['+tho.attr("data-prop")+'][ID]" value=""><input type="file" name="ORDER_PROP_21['+tho.attr("data-prop")+']" style="position: absolute; visibility: hidden;">'+item+'<a class="go_del_file">x</a></li>';
});

var zz=jQuery(".chert1").find(".its_files").append(str);
jQuery(".chert1").find(".its_files li:last-child input[type='file']").prop("files",jQuery(this).prop("files"));
jQuery(this).attr("data-prop",(parseInt(jQuery(this).attr("data-prop"))+1));
});

jQuery(".input-order-ino input[type='file']").change(function(){

       var files = $(this).prop("files"); 
var names = $.map(files, function(val) { return val.name; });
var str="";
var tho=jQuery(this);
names.forEach(function(item, i, arr) {

  str=str+'<li><input type="hidden" name="ORDER_PROP_22['+tho.attr("data-prop")+'][ID]" value=""><input type="file" name="ORDER_PROP_22['+tho.attr("data-prop")+']" style="position: absolute; visibility: hidden;">'+item+'<a class="go_del_file">x</a></li>';
 });

var zz=jQuery(".chert2").find(".its_files").append(str);
jQuery(".chert2").find(".its_files li:last-child input[type='file']").prop("files",jQuery(this).prop("files"));
jQuery(this).attr("data-prop",(parseInt(jQuery(this).attr("data-prop"))+1));
});

$(document).delegate(".go_del_file","click",function(e){
e.preventDefault();
jQuery(this).parent().remove();
});
//menu_togle
    var toggleButton_1 = $('.menu-toggle.main_menu'),
    nav_1 = $('.topnav_adapt');

   // toggle button
   toggleButton_1.on('click', function(e) {

    e.preventDefault();
    toggleButton_1.toggleClass('is-clicked');
    nav_1.slideToggle();

  });

//menu_togle podergka
    var toggleButton = $('.togle_podergka'),
    nav = $('.topnav.pogergka_menu');

   // toggle button
   toggleButton.on('click', function(e) {

    e.preventDefault();
    toggleButton.toggleClass('is-clicked');
    nav.slideToggle();

  });

//menu_togle
    var toggleButtonLog = $('.menu-toggle_cat'),
    navLog = $('.main_logo_menu');

   // toggle button
   toggleButtonLog.on('click', function(e) {

    e.preventDefault();
    toggleButtonLog.toggleClass('is-clicked');
    navLog.slideToggle();

  });

//main slider
	$('.main_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
     navText:[
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>"
        ],
    items:1,
    autoplay:true,
    autoplayTimeout:7000,

 
});



    $('.kompany_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
     navText:[
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>"
        ],
    items:1,
    autoplay:true,
autoplayTimeout:4000,

 
});
        $('.new_slider_wr').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
     navText:[
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>"
        ],
    items:1,
    autoplay:true,
autoplayTimeout:4000,

 
});
//stanok slider
	$('.stanok_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
     navText:[
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>"
        ],
    items:1,
    //autoplay:true,
  //  autoplayTimeout:3000,

 
});



//popup
    $('.search_sm,.vhod_pop,.obr_zvon_popop').magnificPopup({

      type:'inline',
      fixedContentPos: false,
      removalDelay: 300,
      showCloseBtn: false,
      mainClass: 'mfp-fade'

   });

$(".togle_clas_tovar").on('click', function() {
jQuery(this).toggleClass("toggled");
    $(this).next('.clas_tovar_wr').slideToggle();
    if ($(this).text()=='Развернуть +') {$(this).text('Свернуть -');}
 
    else {$(this).text('Развернуть +');}
});

$('.video_slider').owlCarousel({
   loop:true,
    margin:10,
    nav:true,
     navText:[
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>"
        ],
    items:2,
    autoplay:true,
    autoplayTimeout:5000,

 responsive:{
        0:{
            items:1
        },
        400:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
});

$('.video_poduct_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText:[
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>"
        ],
    items:3,
    autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{
            items:1
        },
        400:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});

//novosti slider
$('.slider_novosti,.ranee_smotreli_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText:[
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>"
        ],
    items:4,
    autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{
            items:1
        },
        400:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        },
        1200:{
            items:4
        }
    }
});
 
$('.slider_popular').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText:[
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>"
        ],
    items:4,
    autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{
            items:1
        },
        400:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        },
        1200:{
            items:4
        }
    }
});


//product slider
    $('.product_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
     navText:[
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>"
        ],
    items:1,
    autoplay:false,
    autoplayTimeout:5000,

 
});

//obrat zvonok
$(".obr_zvon_a").click(function() {
    $(".zvon_form").slideToggle();
});


//korzina
$("form.add_in_card").submit(function(e) {
		$.ajax({
			type: "GET",
			url: "/ajax/add2basket.php",
			data: $(this).serialize()
		}).done(function(data) {
            console.log(data);
		$(".cnea").text($('.cnea',data).text());
		$(".korzina_price").text($('.korzina_price',data).text());
			  $(".korzina_podskazka").slideToggle();
			  $('html, body').animate({scrollTop: 0},500);
		});
		e.preventDefault();
		return false;
});

$(".add_to_group").click(function(e){
e.preventDefault();

var msg   = $(".group_add").serialize();
		$.ajax({
			type: "GET",
			url: "",
			data: msg
		}).done(function(data) {
		$("#cucuca").html($(data).find("#cucuca").html());
	
			  $(".korzina_podskazka").slideToggle();
			  $('html, body').animate({scrollTop: 0},500);
		});
});


//form vhod
$(".user_head").click(function() {
    $(".main_logo_vhod").slideToggle();
   // $(".main_logo").slideToggle();


});     

$(".oblast_kart").hover(function() {
    $(".obl_podskaz").css("opacity","1");
});    

$(".moskva").click(function() {
        $(".voroneg_map ").addClass("map_none");
        $(".moskov_map ").removeClass("map_none");

});

$(".voroneg").click(function() {
       
        $(".voroneg_map ").removeClass("map_none");
        $(".moskov_map ").addClass("map_none");
       
});

$(".map_name span").click(function() {
       
        $(".map_name span ").removeClass("active_map");
        $(this).addClass("active_map");


});
  

//SELECT
$('select').wSelect();

        $('#demo, #demo-multi').change(function() {
          console.log($(this).val());
        });

        $('#demo').val('AU').change(); // should see in console
        $('#demo').val('PL').wSelect('change'); // should see the selected option change to three
        $('#demo').wSelect('reset');
        $('#demo').val('dis').change();
        
        $('#demo-multi').val(['soccer', 'archery']).change();

        // Testing append from one select to another.
        $('#demo option:last').appendTo('#demo-multi');
        $('#demo, #demo-multi').wSelect('reset');


	//SVG Fallback
	if(!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function() {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};

	//Аякс отправка форм
	//Документация: http://api.jquery.com/jquery.ajax/
	$("#form").submit(function() {
		$.ajax({
			type: "POST",
			url: "mail.php",
			data: $(this).serialize()
		}).done(function() {
			alert("Спасибо за заявку!");
			setTimeout(function() {
				
				$("#form").trigger("reset");
			}, 1000);
		});
		return false;
	});

	//Chrome Smooth Scroll
	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	};

	$("img, a").on("dragstart", function(event) { event.preventDefault(); });
	
	$(document).delegate(".downl_choice select","change",function(){
	
	var ch=$(this).parent();
	if(!ch.hasClass("elem_choice")){
	var cur_q=ch.index();
	$.ajax({
			type: "GET",
			url: "?SECTION_ID="+$(this).find("option:selected").val(),
			
		}).done(function(data) {
		$(".downl_choice").each(function(){
		if($(this).index()>cur_q){
		$(this).remove();
		cur_q=cur_q-1;}
		});
		 if($(data).find(".elem_choice").length==0){
		ch.after('<div class="downl_choice">'+$(data).find(".downl_choice").html()+'</div>');
		$('select').wSelect();
		}else
		{
		ch.after('<div class="downl_choice elem_choice">'+$(data).find(".downl_choice").html()+'</div>');
		$('select').wSelect();
		}
		});
		}
	else
	{
	
	$.ajax({
			type: "GET",
			url: "?ELEM_ID="+$(this).find("option:selected").val(),
			
		}).done(function(data) {
		$(".show_d_elelms").html($(data).find(".show_d_elelms").html());
		$('.show_d_elelms .product_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
     navText:[
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>"
        ],
    items:1,
    autoplay:true,
    autoplayTimeout:5000,

 
});
		});
	}
	});
	
});


