/**
 * Created by Administrator on 2017/8/30.
 */
$(function () {
    var wjx_s = "★";
    var wjx_k = "☆";
    $(".comment li").mouseenter(function () {
        $(this).text(wjx_s).css('color','#ffb346').prevAll().text(wjx_s).css('color','#ffb346');
        $(this).nextAll(wjx_k);
    });
    $(".comment li").mouseleave(function () {
        $(".comment li").text(wjx_k).css('color','#eaeaea')
        $("li.current").text(wjx_s).css('color','#ffb346').prevAll().text(wjx_s).css('color','#ffb346');
    });
    $(".comment li").click(function () {
        var $index = $(this).index()
        $(this).parent().siblings('div').find('.fen').text($index+1);//统计分数
        $(this).addClass("current").siblings().removeClass("current")//添加class
    })
})