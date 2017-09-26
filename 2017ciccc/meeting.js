/**
 * Created by user on 2017/3/26.
 */
$(document).ready(function(){
    $(".tab li").click(function(){
        $(".tab li").eq($(this).index()).addClass("cur").siblings().removeClass('cur');
        $(".dis").hide().eq($(this).index()).show();
        //��һ�ַ���: $("div").eq($(".tab li").index(this)).addClass("on").siblings().removeClass('on');

    });
});


$(document).ready(function () {
    $(".menu ul").css("display","none");
    $(".menu .btn").on("click", function () {
        $(this).siblings('ul').toggle();
    })
})



$(document).ready(function(){
    $(window).scroll(function(){
        var sc=$(window).scrollTop();
        var rwidth=$(window).width()
        if(sc>0){
            $("#goTopBtn").css("display","block");
//            $("#goTopBtn").css("left",(rwidth-36)+"px")
        }else{
            $("#goTopBtn").css("display","none");
        }
    })
    $("#goTopBtn").click(function(){
        var sc=$(window).scrollTop();
        $('body,html').animate({scrollTop:0},500);
    })
})