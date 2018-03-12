(function(){
	var timeBox = $('.nav_list a').eq(0);
	var time = 60;
	setInterval(function(){
		time--;
		timeBox.html( '刷新'+time );
		if( time<=0 ){
			location.reload();
		}
	},1000);
})();