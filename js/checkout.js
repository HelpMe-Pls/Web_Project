
(function ($) {
    "use strict";
    

    
    /*==================================================================
    [ Validate ]*/
    var fname = $('#billing_first_name') ;
    var lname = $('#billing_last_name');  
    var address = $('#billing_address_1');
    var city = $('#billing_city');
    var post = $('#billing_postcode');
    var phone = $('#billing_phone');
    var pass =$('#account_password');

    $('.checkoutt').click(function(){
        event.preventDefault();
        var check = true;

        if($(lname).val().trim() == ''){
            $(lname).css('border','1px solid red');
            check=false;
        }

        if($(fname).val().trim() == ''){
           $(fname).css('border','1px solid red');
            check=false;
        }

        if($(address).val().trim() == ''){
           $(address).css('border','1px solid red');
            check=false;
        }

        

        if($(city).val().trim() == ''){
           $(city).css('border','1px solid red');
            check=false;
        }

         if($(post).val().trim() == ''){
            $(post).css('border','1px solid red');
            check=false;
        }

         if($(phone).val().trim() == ''){
            $(phone).css('border','1px solid red');
            check=false;
        }

         if($(pass).val().trim() == ''){
            $(pass).css('border','1px solid red');
            check=false;
        }
        if (check== true) alert('đã xác nhận thanh toán');
        else (alert('vui lòng điền đầy đủ thông tin'));
        //else alert('submit thanh cong');

        return check;
    });


    // $('.validate-form .input1').each(function(){
    //     $(this).focus(function(){
    //        hideValidate(this);
    //    });
    // });

    // function showValidate(input) {
    //     var thisAlert = $(input).parent();

    //     $(thisAlert).addClass('alert-validate');
    // }

    // function hideValidate(input) {
    //     var thisAlert = $(input).parent();

    //     $(thisAlert).removeClass('alert-validate');
    // }
    
    

})(jQuery);