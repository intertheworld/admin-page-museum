function submit() {
    let title = $('#titel').val();
    let tijdperk = $('#tijdperk').val();
    let text = $('#textID').trumbowyg('html');
    console.log('titel: ====> ' + title);
    console.log('tijdperk: ====> ' + tijdperk);
    console.log('text: ====> ' + text);

    const img = document.getElementById('fotoid')
    const file = img && img.files[0] ? img.files[0] : '';
    console.log('file: ====> ' + file);
    
    let formData = new FormData();
    formData.append('title', title);
    formData.append('tijdperk', tijdperk);
    formData.append('text', text);
    formData.append('file', file);
    $.ajax({
        url: "./includes/add-qr-code.php",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function () {
            console.log('Bewerken success');
            location.href = './admin-museum.php';
        }
    });
};