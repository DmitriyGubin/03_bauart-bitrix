$(document).ready(function(){

	$("#send-order-partners").on("click",function(e){

        e.preventDefault();
        var err=0;


        var arr = ['#full_name_clientt',
                    '#phonee',
                    '#agencyy',
                    '#full_name_agentt',
                    '#agent_phonee'
                  ];

        for (let item of arr)
        {
            if ( $(item).val() == '' )
            {
                err++;
                $(item).addClass("hasError");
            } 
            else 
            {
                $(item).removeClass("hasError");
            }
        }

        var pattern = /\S+@\S+\.\S+/;
        if ( !pattern.test( $("#emailll").val() ) && $("#emailll").val() != '')
        {
            err++
            $("#emailll").addClass("hasError");
        } 
        else 
        {
            $("#emailll").removeClass("hasError");
        }


    if (err == 0)
    {
         
        $.ajax({
            type: "POST",
            url: '/ajax/order.php',
            data: {
                'CLIENT_FULL_NAME': $("#full_name_clientt").val(),
                'CLIENT_PHONE': $("#phonee").val(),
                'AGENCY_NAME': $("#agencyy").val(),
                'AGENT_FULL_NAME': $("#full_name_agentt").val(),
                'AGENT_PHONE': $("#agent_phonee").val(),
                'AGENT_EMAIL': $("#emailll").val(),
                'OBJECT_NAME': $("#objectt").val(),
                'COMMENT': $("#comments").val() 
            },
            dataType: "json",
            success: function(data){

                if (data.status == true)
                {
                    // $("#full_name_clientt").val('');
                    // $("#phonee").val('');
                    // $("#agencyy").val('');
                    // $("#full_name_agentt").val('');
                    // $("#agent_phonee").val('');
                    // $("#emailll").val('');
                    // $("#objectt").val('');
                    // $("#comments").val('');

                    Show_PopUp_Order();
                    $("#form-content").addClass("hide");
                    $("#succes_order").addClass("show");
                }
            }
        });
    }
 
	 });
});






