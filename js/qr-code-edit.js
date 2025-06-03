function submit() {
let title = $('#titel').val();
    let tijdperk = $('#tijdperk').val();
    let text = $('#textID').trumbowyg('html');
    let id = $('#id').val();
    const img = document.getElementById('fileId');
    const file = img && img.files[0] ? img.files[0] : null;

    console.log('titel: ====> ' + title);
    console.log('tijdperk: ====> ' + tijdperk);
    console.log('text: ====> ' + text);
    console.log('id: ====> ' + id);
    console.log('file: ====> ' + (file ? file.name : 'GEEN BESTAND'));

    // Create FormData object
    let formData = new FormData();
    formData.append('id', id);
    formData.append('title', title);
    formData.append('tijdperk', tijdperk);
    formData.append('text', text);
    if (file) {
        formData.append('file', file);
    }

    $.ajax({
        url: './includes/edit-qr-code.php?id=' + id, // Send id via GET
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (data) {
            console.log('Bewerken success');
            location.href = './admin-museum.php';
            if (data['error']) {
                console.log('Error:', data['error']);
                alert('Er is een fout opgetreden: ' + data['error']);
            }
        },
    });
}
