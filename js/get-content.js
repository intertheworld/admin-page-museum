$(document).ready(function () {
    getContent();
});

function getContent() {
    console.log('ieslkd');
    
    const admin = 'true'
    $.ajax({
        url: './includes/get-content.php',
        method: 'POST',
        dataType: 'json',
        data: {
            admin
        },
        success: function (data) {
            console.log('sdkfndlkn');
            
            $('.overzicht').html(data['html']);
        }
    })
}
function dupliceren(id) {
    console.log('id copy:====> ' + id);

    $.ajax({
        url: './includes/duplicate-qr-code.php',
        method: 'POST',
        dataType: 'json',
        data: {
            id
        },
        success: function () {
            console.log('dupliceren success');
            location.reload();

        }
    });
}
function verwijderen(id) {
    console.log('id delete:====> ' + id);

    $.ajax({
        url: './includes/delete-qr-code.php',
        method: 'POST',
        dataType: 'json',
        data: {
            id
        },
        success: function () {
            console.log('delete success');
            location.reload();

        }
    });
}

function bewerken(id) {

    // console.log('id bewerken: ====> '+id);
    // console.log('link copy:====> '+link);
    location.href = './qr-code-edit.php?id=' + id;


    // document.location.href = './qr-code-edit.php';

    // $.ajax({
    //     url: './includes/edit-qr-code.php',
    //     method: 'GET',
    //     dataType: 'json',
    //     data: {

    //     },
    //     success: function () {
    //         console.log('Bewerken success');

    //     }
    // });
}
function template(id) {
    location.href = './template.php?id=' + id;
}

