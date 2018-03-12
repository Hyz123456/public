


/*
$(document).ready(function(){
	
	
	

   var newImage = new Image();  //‘§‘ÿ»ÎÕº∆¨

   var oadImage = $('.aa').attr('src');
      var obdImage = $('.ab').attr('src');
	        var ocdImage = $('.ac').attr('src');
			      var oddImage = $('.ad').attr('src');
	        var oedImage = $('.ae').attr('src');
		      var ofdImage = $('.af').attr('src');
	        var ogdImage = $('.ag').attr('src');
				        var ohdImage = $('.ah').attr('src');
						    var oidImage = $('.ai').attr('src');
								    var ojdImage = $('.aj').attr('src');

   newImage.src = './icon/list_hover.png';


   $('.aa').hover(function(){ // Û±Íª¨π˝Õº∆¨«–ªª

    $('.aa').attr('src',newImage.src);
	


	

    },

    function(){

    $('.aa').attr('src',oadImage);
	
 

    });
	
	
	
	
	
	   $('.ab').hover(function(){ // Û±Íª¨π˝Õº∆¨«–ªª

    $('.ab').attr('src',newImage.src);

    },

    function(){

    $('.ab').attr('src',obdImage);
	
 

    });
		   $('.ac').hover(function(){ // Û±Íª¨π˝Õº∆¨«–ªª

    $('.ac').attr('src',newImage.src);

    },

    function(){

    $('.ac').attr('src',ocdImage);
	
 

    });
			   $('.ad').hover(function(){ // Û±Íª¨π˝Õº∆¨«–ªª

    $('.ad').attr('src',newImage.src);

    },

    function(){

    $('.ad').attr('src',oddImage);
	
 

    });
	
	
	
				   $('.ae').hover(function(){ // Û±Íª¨π˝Õº∆¨«–ªª

    $('.ae').attr('src',newImage.src);

    },

    function(){

    $('.ae').attr('src',oedImage);
	
 

    });
		
				   $('.af').hover(function(){ // Û±Íª¨π˝Õº∆¨«–ªª

    $('.af').attr('src',newImage.src);

    },

    function(){

    $('.af').attr('src',ofdImage);
	
 

    });
	
		
				   $('.ag').hover(function(){ // Û±Íª¨π˝Õº∆¨«–ªª

    $('.ag').attr('src',newImage.src);

    },

    function(){

    $('.ag').attr('src',ogdImage);
	
 

    });
	
	
	
	
		
				   $('.ah').hover(function(){ // Û±Íª¨π˝Õº∆¨«–ªª

    $('.ah').attr('src',newImage.src);

    },

    function(){

    $('.ah').attr('src',ohdImage);
	
 

    });
	
			
				   $('.ai').hover(function(){ // Û±Íª¨π˝Õº∆¨«–ªª

    $('.ai').attr('src',newImage.src);

    },

    function(){

    $('.ai').attr('src',oidImage);
	
 

    });
					   $('.aj').hover(function(){ // Û±Íª¨π˝Õº∆¨«–ªª

    $('.aj').attr('src',newImage.src);

    },

    function(){

    $('.aj').attr('src',ojdImage);
	
 

    });





});




*/


$(function () {
$(".ocs").hover(
	function () {
		$(this).find(".dask").stop().delay(50).attr({style:"display:block"}).animate({"top":0,opacity:0.9},300)
	 },
	function () {
		$(this).find(".dask").stop().animate({"top":0,opacity:0},300)
	}
	
)
})














function blinklink()
{
if (!document.getElementById('blink').style.color)
 {
 document.getElementById('blink').style.color="green"
 }
if (document.getElementById('blink').style.color=="green")
 {
 document.getElementById('blink').style.color="#1AA1B3"
 }
else
 {
 document.getElementById('blink').style.color="green"
 }
timer=setTimeout("blinklink()",500)










}

function stoptimer()
{
clearTimeout(timer)
}













