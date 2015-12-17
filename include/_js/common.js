//------------- resize --------------------
$(document).ready(function() {
    $(window).load(function() {
	    resizeMainFrame();
	    resetFormDesign()
	});
	$(window).resize(function() {
	    resizeMainFrame();
	});    
});
function resetFormDesign() {
	$('.icheck input').iCheck({
		checkboxClass: 'icheckbox_minimal',
		radioClass: 'iradio_minimal',
		increaseArea: '20%' // optional
	});
	// Select List 스타일 적용
	$("select.select").selectOrDie();
}
function resizeMainFrame() {
    var h_height = $(window).height();
    var h_height1 = h_height - 125;
    var h_content = h_height1 - 55;
    
    $("#wrap").height(h_height);
    $(".full_height").height(h_height);
    $("#content, .h_con").height(h_content);
    $(".full_height1, #content.full_height1").height(h_height1);
}
// bxSlider 롤링
function slideInit(){
	if( $(".img_view").find(".slide_ul > *").length < 2 ){
		roll_cnt = "false";	
	} else {
		roll_cnt = "true";
	}
	var thumb = $(".img_view").find(".slideWrap .thumb");
	$(".img_view").find(".slideWrap .slide_ul > *").each(function(i) {
		thumb.append('<a data-slide-index="' + i + '" href=""></a>');
	});

	slide = $(".img_view").bxSlider({
		mode: 'fade',
		auto:true,
		speed:1500,
		pause:5000,
		controls:false,
		pager: true,
		pagerCustom: $("#img_view").find(".slideWrap .thumb"),
		onSlideAfter:function($slideElement, oldIndex, newIndex) {
		},
		onSliderLoad: function() {
			resizeSlide();
		}
	});
	if(roll_cnt == "true"){
		autoPlayCtrl($(".img_view"), slide);	
	}
	return slide;
}