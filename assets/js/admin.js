jQuery(function($){
    let button_submit       = $('.insta-parse-submit');
    var setting_container   = $('.admin-setting-insta-parse-page');
    var adm_input           = $('.insta-parse-input');
    var adm_select          = $('.insta-parse-select');
    var loading             = $('.loading-parse');
    button_submit.on('click', function(){
        console.log(vars_admin);

        $.ajax({
            type: "post",
            dataType: 'json',
            url: vars_admin.ajax_url,
            data: {
                action: "runInstaParse",
                process: adm_select.val(),
                password: adm_input.val() 
            },
            beforeSend: function(){
                loading.addClass('loading-active');
            },
            success:  function( response ){
                loading.removeClass('loading-active');
                console.log(response)
                $('.adm-result').append('<br>$(admin): ');
                $('.adm-result').append(response.message);
                $('.adm-result').append('<br>');
            },
            error: function(){
                loading.removeClass('loading-active');
                $('.adm-result').append('<br>$(admin): ');
                console.log(response)
                setting_container.append(response.message);
            }
        });
    });

});