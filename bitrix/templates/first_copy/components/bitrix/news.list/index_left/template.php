<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news_left">
	<div class="title_news" onclick="window.open('/support/news/')">Новости</div>
	<div id="content-news-scroll" class="content-news-scroll" style="height: 501px;">
		<? foreach($arResult["ITEMS"] as $arItem):?>

			<div class="scroll-box">

			<div class="media">
				<!--
				<div class="media-left">
					<a href="<?//$arItem['DETAIL_PAGE_URL']?>">
						<img alt="64x64" class="media-object" src="<?//$arItem['PREVIEW_PICTURE']['SRC'];?>" data-holder-rendered="true">
					</a>
				</div>
				-->

				<div class="media-body">
						<span class="scroll-text-date"><?=$arItem['DATE_ACTIVE_FROM'];?></span>
						<p class="scroll-text"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME'];?></a></p>
				</div>

			</div>

			</div>

		<? endforeach; ?>

	</div>

</div>

<script>
	$(function(){
		$(".content-news-scroll").mCustomScrollbar({
			theme:"3d",
			scrollInertia: 250,
			scrollbarPosition:"inside",
			callbacks: {
				onTotalScroll: function () {
				//	myCallback(this)
				},
			}
		});

		var startFrom = 2;
		function myCallback(el){

			$.ajax({
				url: '/ajax/ajax-news-scroll.php',
				method: 'POST',
				data: {"startFrom" : startFrom},
				beforeSend: function() {
					inProgress(true);
				}
			}).done(function(data){
				data = jQuery.parseJSON(data);
				if (data.length > 0) {

					$.each(data, function(index, data){
						$(".news_left .mCSB_container").append("<div class='scroll-box'><div class='media'><div class='media-body'><span class='scroll-text-date'>"+ data.data +"</span><p class='scroll-text'><a href='"+ data.url +"'>"+ data.text +"</a></p></div></div></div>");
					});

					inProgress(false);
					startFrom += 1;
				}else{
					inProgress(false);
					$(".news_left .mCSB_container").append("<p style='text-align: center;'>Новостей больше нет.</p>");
				}
			});

		}

		function inProgress(val){
			if(val == true){
				$(".news_left .mCSB_container").append("<p style='text-align: center;'><img style='max-width: 50px;' src=\"/img/load_scroll_news.gif\"></p>");
			}
			if(val == false){
				$(".mCSB_container > p").remove();
			}

		}




	});
</script>

<style>
	.scroll-box{
		min-height: 100px;
	}
	.scroll-box > .media{
		padding: 10px 15px;
	}
	.media-body > .scroll-text,
	.media-body > .scroll-text-date{
		font-size: 12px;
		margin: 0px;
	}

	.media-body > .scroll-text > a{
		color: black;
	}

	.media-body > .scroll-text-date{
		font-style: italic;
		font-weight: 500;
	}
	.media > .media-left{
		padding-right: 10px;
		display: table-cell;
		vertical-align: top;
	}
	.media > .media-body{
		display: table-cell;
		vertical-align: top;
	}

	#content-news-scroll .scroll-box:nth-child(2n) {
		background: #FAFBF5;
	}
	#content-news-scroll{
		border-right: 1px solid #DADADA;
		border-left: 1px solid #DADADA;
		border-bottom: 1px solid #DADADA;
	}

	.media-left a {
		background: #fff;
		border: 2px solid #DADADA;
		width: 100px;
		height: 78px;
		display: block;
	}

	.media-left > a > img{
		height: 100%;
		width: 100%;
		object-fit: contain;
	}

	.scroll-box:hover{
		background: #AECE70!important;
	}

	.mCSB_inside > .mCSB_container{
		margin-right: 0px;
	}
	.mCSB_scrollTools{
		margin: 10px auto;
	}

	.mCS-3d.mCSB_scrollTools .mCSB_draggerRail, .mCS-3d-dark.mCSB_scrollTools .mCSB_draggerRail{
		background-color: transparent;
		box-shadow: none;
	}

	.news_left .title_news{
		cursor: pointer;
		padding: 5px;
		text-transform: uppercase;
		text-align: center;
		font-weight: 400;
		font-size: 22px;
		background: #FAFBF5;
		border-bottom: 1px solid #DADADA;
		border-top: 2px solid #94B830;
		border-left: 1px solid #DADADA;
		border-right: 1px solid #DADADA;
	}

</style>