$(document).ready(function(){

    var sliderLength = $(".slideShow .navContainer .navBtn").length;
    var sliderIndex = 0;
    $('.slideShow .navContainer .navBtn .shadeDiv').eq(0).addClass('active');

    var int = setInterval(function(){
        playSlider(sliderIndex);
        sliderIndex++;
        if(sliderIndex == sliderLength){
            sliderIndex = 0;
        }
    },5000);

    $('.slideShow').hover(
        function(){
            clearInterval(int);
        },
        function(){
            int = setInterval(function(){
                playSlider(sliderIndex);
                sliderIndex++;
                if(sliderIndex == sliderLength){
                    sliderIndex = 0;
                }
            },5000);
        }
    );

    $(".slideShow .navContainer .navBtn a").click(function(){
        $(this).blur();
        sliderIndex = $(this).parent('.navBtn').index();
        playSlider(sliderIndex);
    });

})

function playSlider(sliderIndex){
    var sliderLeft = 727 * sliderIndex;
    var indicatorLeft = 182 * sliderIndex;
    $('.slideShow .sliderContainer').stop().animate({left: "-"+sliderLeft+"px"},1000,"swing");
    $('.slideShow .indicator').stop().animate({left: indicatorLeft+"px"},300,"swing");
    $('.slideShow .navContainer .navBtn .shadeDiv').removeClass('active');
    $(".slideShow .navContainer .navBtn").eq(sliderIndex).children('.shadeDiv').addClass('active');
}