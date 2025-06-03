$('.login-error').hide();


function login(){
    const username = $('#username').val()
    const password = $('#password').val()
    $.ajax({
        url:'./includes/login-page.php',
        method:'POST',
        data:{
            username,
            password
             },
        dataType:'json',
        success: function(data) {
            if (data['status'] == 'success') {
                if (data['admin'] == true) {
                    window.location.href = './admin-museum.php';
                }else if (data['admin'] == false) {
                    alert('You are not an admin!')
                }
            } else if (data['status'] == 'error') {
                $('.login-error').show();
            }
        },
        
    })
}