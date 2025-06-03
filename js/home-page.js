$(document).ready(function () {
    getContent();
});


function getContent() {
    console.log('esjdvjbkng,b');
    
    const admin = 'false'
    $.ajax({
        url: './includes/get-content.php',
        method: 'POST',
        dataType: 'json',
        data: {
            admin
        },
        success: function (data) {
            $('.tentoonstellingen').html(data['html']);
        }
    })
}
function logOut() {
    $.ajax({
        url: './includes/log-out.php',
        method: 'POST',
        data: {},
        dataType: 'json',
        success: function(data) {
            window.location.href ='./home-page.php';
        }
    })

}


function redirectTo(value) {
    if (value == 'login') {
        location.href = './login-page.php';
    }
    else if (value == 'logout') {
        logOut();
    }
    else if (value == 'admin') {
        location.href = './admin-museum.php';
    }
}
