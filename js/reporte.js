$(document).ready(function() {
    $('#resp').hide();
    $('#err').hide();
});

$('#reporte').click(function() {

    let data = 1;

    let formData = new FormData();

    formData.append('data', data);

    $.ajax({
        url: '../model/reporte.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response == 0) {
                $('#resp').show();
                $('#resp').html('Reporte generado.');
                $('#resp').delay(2000).hide(0);
            }
            if (response == 1) {
                $('#err').show();
                $('#err').html('Error al generar reporte.');
                $('#err').delay(2000).hide(0);
            }

        }
    });
});