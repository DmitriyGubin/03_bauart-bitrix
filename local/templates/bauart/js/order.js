$(document).ready(function(){

	$("#for_send").on("click",function(){


        var err=0;

        // person name
        if ( $("#pop-up-name").val() == '' )
        {
            err++;
            $("#pop-up-name").addClass("hasError");
        } 
        else 
        {
            $("#pop-up-name").removeClass("hasError");
        }

        // person phone
        if ( $("#pop-up-phone").val() == '' )
        {
            err++;
            $("#pop-up-phone").addClass("hasError");
        } 
        else 
        {
            $("#pop-up-phone").removeClass("hasError");
        }
    
    if (err == 0)
    {
         
        $.ajax({
            type: "POST",
            url: '/ajax/order.php',
            data: {
                // 'name': $("#pop-up-name").val(),
                // 'phone': $("#pop-up-phone").val(),
                // 'house_name': $("#house-name").val(),
                // 'house_price': $("#house-price").val()

                'PERSON_NAME': $("#pop-up-name").val(),
                'PHONE': $("#pop-up-phone").val(),
                'HOUSE_NAME': $("#house-name").val(),
                'HOUSE_PRICE': $("#house-price").val()
            },
            dataType: "json",
            success: function(data){

                if (data.status == true)
                {
                    $("#pop-up-name").val('');
                    $("#pop-up-phone").val('');
                    $("#house-name").val('');
                    $("#house-price").val('');

                    $("#form-content").addClass("hide");
                    $("#succes_order").addClass("show");
                }
            }
        });
    }
 
	});
});






/*
$(".md-resp-send").on("click",function(e){
    e.preventDefault();
     
    $(".md-resp-msg").hide();
    $(".md-resp-msg").html('');
     
    var err=0;
 
    // person name
    if ( $("#md-resp-name").val() == '' ){
        err++
        $("#md-resp-name").addClass("hasError");
    } else {
        $("#md-resp-name").removeClass("hasError");
    }
     
    // phone
    if ( $("#md-resp-phone").val() == '' ){
        err++
        $("#md-resp-phone").addClass("hasError");
    } else {
        $("#md-resp-phone").removeClass("hasError");
    }
 
    // email
    if ( $("#md-resp-email").val() != '' ){
        var pattern = /\S+@\S+\.\S+/;
        if ( !pattern.test( $("#md-resp-email").val() )){
            err++
            $("#md-resp-email").addClass("hasError");
        } else {
            $("#md-resp-email").removeClass("hasError");
        }
    } else {
        $("#md-resp-email").removeClass("hasError");
    }
 
    var resp_type = '';
    if ( $("#resp_item_id").val() == 0 ){
        resp_type = '?action=call';
    }
 
    if (err == 0){
         
        $.ajax({
            type: "POST",
            url: '/ajax.customer-response.php'+resp_type,
            data: {
                'item_id': $("#resp_item_id").val(), // set in catalog.js
                'name': $("#md-resp-name").val(),
                'phone': $("#md-resp-phone").val(),
                'email': $("#md-resp-email").val(),
                'message': $("#md-resp-message").val()
            },
            dataType: "json",
            success: function(data){
 
                if (data.status == true){
                    $("#md-resp-name").val('');
                    $("#md-resp-phone").val('');
                    $("#md-resp-email").val('');
                    $("#md-resp-message").val('');
                }
                 
                if (data.msg && data.msg.length > 0){
                    $(".md-resp-msg").fadeIn();
                    $.each( data.msg, function( key,field ) {
                        if (field.type == true){
                            $(".md-resp-msg").append('<p class="md-true">'+field.text+'</p>');
                        } else {
                            $(".md-resp-msg").append('<p class="md-error">'+field.text+'</p>');
                        }
                    });
                }
 
            }
        });
    }
 
});