$(document).ready(function() {
    $('#err2').hide();
    $('#resp2').hide();
});

$('#confirmar').click(function() {

    let idCode = document.getElementById('idCodeR2').value;

    let formData = new FormData();


    formData.append('id', idCode);



    if (idCode.length == 0) {
        $('#err2').show();
        $('#err2').html("Hubo un error al marcar el retiro");
        $('#err2').delay(2000).hide(0);
    } else {

        $.ajax({
            url: '../model/marcarRetiro.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == 0) {
                    $('#confirmar').hide();
                    $('#cancelar2').hide();
                    $('#resp2').show();
                    $('#resp2').html('Retiro Exitoso.');
                    $('#resp2').delay(2000).hide(0);
                    setTimeout(function() {
                        window.location.href = '../view/index';
                    }, 2000);
                }
                if (response == 1) {
                    $('#err2').show();
                    $('#err2').html('Error al marcar retiro.');
                    $('#err2').delay(2000).hide(0);
                }

            }
        });
    };

});