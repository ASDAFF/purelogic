$(document).ready(function() {

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
    autoplay:true,
    autoplayTimeout:5000,

 
});

//obrat zvonok
$(".obr_zvon_a").click(function() {
    $(".zvon_form").slideToggle();
});


//korzina
$(".korzina_btn").click(function() {
    $(".korzina_podskazka").slideToggle();
});

//form vhod
$(".user_head").click(function() {
    $(".main_logo_vhod").slideToggle();
    $(".main_logo").slideToggle();


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
	
});

$(window).load(function() {

	$(".loader_inner").fadeOut();
	$(".loader").delay(400).fadeOut("slow");

});
