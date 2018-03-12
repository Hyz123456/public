/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
  	if( $(".eventtext a").hasClass('current') ) {
		$(".current").parent().removeClass("hide");
		$(".current").parent().parent().find('.small').first().addClass("selected");
		$(".selected .sj_img").removeClass("hide");
		$(".current").parent().parent().find('.img_hide').addClass("hide");
		$(".current").parent().parent().find('.small').first().addClass("btl");
	} else {
		$(".current").parent().addClass('hide');
	}
  
  	$("#nav4 .small").click(function() {
        $("#nav4 .small .sj_img").addClass("hide");
        $("#nav4 .selected .img_hide").removeClass("hide");
	var index = $(this).index();
	if ($(this).hasClass('selected')) {
		$(this).removeClass("selected");
		$(this).parent().find('.eventtext').first().hide(500);
	} else {
		$(".small").removeClass("selected");
		$(this).addClass("selected");
		$(".selected .sj_img").removeClass("hide");
		$("#nav4 .selected .img_hide").addClass("hide");
		$(".eventtext").hide(500);
		var big = $(this).parent().find('.eventtext').first();
		big.show(500);
	}
	
    });
});