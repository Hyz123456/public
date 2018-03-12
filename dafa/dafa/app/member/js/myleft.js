(function(){
	var tab = $('#head_top .head_right .bigtab'), tablist = $('#head_bottom .bisai');
	tab.on('click', function(){
		tab.removeClass('active').eq( $(this).index() ).addClass('active');

		if( $(this).index() == 2 ){
			tablist.removeClass('active').eq( 1 ).addClass('active');
		}else {
			tablist.removeClass('active').eq( 0 ).addClass('active');
		}
		//
		//tab.eq( $(this).index() ).find('.bisai_top a').removeClass('active');
		//tab.eq( $(this).index() ).find('.bisai_top a').eq(0).addClass('active');
	});
})();

(function(){
	var tab = $('.bisai .bisai_top a');
	tab.on('click', function(){
		var tablist =  $(this).parents('.bisai').find('.bisai_bottom');
		tab.removeClass('active').eq( $(this).index() ).addClass('active');
		tablist.removeClass('active').eq( $(this).index() ).addClass('active');
		tablist.eq( $(this).index() ).find('a').removeClass('active');
		tablist.eq( $(this).index() ).find('a').eq(0).addClass('active');
	});
})();

(function(){
	var tab = $('.bisai_bottom a');
	tab.on('click', function(){
		$(this).parents('.bisai_bottom').find('a').removeClass('active');
		$(this).addClass('active');
	});
})();

(function(){
	var box = $('#todayTime');
	getTime();
	function getTime(){
		var myDate = new Date();
		//var mytime=myDate.toLocaleTimeString();     获取当前时间
		box.html( myDate.toLocaleString() );
		setTimeout(getTime,1000);
	}
	


})();