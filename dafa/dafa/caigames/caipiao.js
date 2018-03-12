/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function(){

                                        
        $('#ion-navicon').click(function(){
            $('.popover-backdrop').addClass("active");
        });
        $('.popover-backdrop').click(function(){
            $('.popover-backdrop').removeClass("active");
        });


        $('#typename').click(function(){
           if( $('.seList').attr('id')=='seList2'){
               $('.seList').removeAttr('id');
               //$('.seList_right').css('display','none');
           }else{
               $('.seList').attr('id','seList2');
               //$('.seList_right').css('display','block');
           }
        });
        
        $('.seList').mouseover(function(){
            $('.seList').removeAttr('id');
        });
    var kjqy=$(window).height();
    
    var aside=$('aside').height();
    $(".lotterListBox").css("height", kjqy-aside-2);
    $(".seList_right").css("height", kjqy-2);
    
    $(".numBox").css("height", kjqy-aside-$('.sub').height());
    $(".lotteryBtn").css("height", kjqy-aside-$('.lotterListBox .sub').height());
    $("html").css("max-width", $(window).width());
    $("html").css("width", $(window).width());
    $("body").css("max-width", $(window).width());
    $("body").css("width", $(window).width());
    $(".numBox").css("width", $(".lotterListBox").width()-$('.lotteryBtn').width()-2);
    
    

    var num_youzhu_zong=[];
    $('dis').click(function(){
        if( $(this).attr('class')=='xuanz'){
            $(this).removeClass('xuanz');
            num_youzhu_zong.splice($.inArray($(this).find('input').attr('name'),num_youzhu_zong),1);
        }else{
            $(this).addClass('xuanz');
            $('.lotteryBtn .active .smallround').addClass("menus-choose");
            num_youzhu_zong.push($(this).find('input').attr('name'));
        }
        $('.sub .text-yellow').html(num_youzhu_zong.length);   
    });

    $('#reset').click(function(){
        $('.lotteryBtn .smallround').removeClass("menus-choose");
        $('dis').removeClass("xuanz");
        num_youzhu_zong=[];
        $('dis input').val('');
        $('.sub .text-yellow').html(num_youzhu_zong.length);
    });
    $('#submit').click(function(){
        var money_sub=$('#money_sub').val();
        if(money_sub==0 || money_sub==''){
           alert("请输入金额"); 
           return false;
        }
        if(num_youzhu_zong.length==0 || num_youzhu_zong==''){
            alert("请选择投注对象");
            return false;
        }
        $('dis input').val('');
        for (var i=0;i<num_youzhu_zong.length;i++){
            $("dis input[name='"+num_youzhu_zong[i]+"']").val(money_sub);
        }
    });
})();