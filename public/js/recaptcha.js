jQuery(document).ready(function() {
    const siteKey = '6Lf8BfsUAAAAAC-HUxlN_QbFDUxCgALzyonBL1M7';

    //either on page load
    grecaptcha.ready(function () {
        setInterval(function(){
            grecaptcha.execute(siteKey, {
                action: 'request'
            }).then(function (token) {
                $('#request_captcha').val(token);
            });

        }, 60000);
    });
});