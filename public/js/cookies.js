jQuery(document).ready(function() {
    function checkCookies() {
        if (localStorage.getItem('acceptCookies') === null || localStorage.getItem('acceptCookies') == false) {
            $('#cookies_box').show();
        }
    }

    function acceptCookies() {
        localStorage.setItem('acceptCookies', true);
        $('#cookies_box').hide();
    }

    $('#accept_cookies').on('click', function (e) {
        acceptCookies();
    });

    checkCookies();
});