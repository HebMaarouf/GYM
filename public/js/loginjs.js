
$(function(){ 

$("login input:first").on("blur",function(){

    if($("input:first").val()==="ayat")
    {
        $("textbox1 span").fadeIn(1000,function(){
            $(this).fadeOut(2000);
        }).text(" Correct");
    }
    else{

        $("textbox1 span").fadeIn(1000,function(){
            $(this).fadeOut(2000);
        }).text(" Not Correct").css("color",red);

    }

},
function(){

    if($("login input:last").val().length >10)
    {
        $("textbox2 span").fadeIn(1000,function(){
            $(this).fadeOut(2000);
        }).text(" Correct");
    }
    else{

        $("textbox2 span").fadeIn(1000,function(){
            $(this).fadeOut(2000);
        }).text(" Not Correct").css("color",red);;

    }


});

});
 