$(document).ready(function() {
    $('#err').hide();
    $('#resp').hide();
});

$('#marcarSalida').click(function() {

    let Fecha = document.getElementById('fecha').value;
    let Hora = document.getElementById('hora').value;
    let Celda = document.getElementById('celda').value;
    let idCode = document.getElementById('idCode').value;

    let formData = new FormData();

    formData.append('fec', Fecha);
    formData.append('hor', Hora);
    formData.append('cel', Celda);
    formData.append('id', idCode);



    if (Fecha == null || Hora.length == 0 || Celda.length == 0) {
        $('#err').show();
        $('#err').html("Debe llenar todos los campos");
        $('#err').delay(2000).hide(0);
    } else {

        $.ajax({
            url: '../model/marcarSalida.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == 0) {
                    $('#marcarSalida').hide();
                    $('#cancelar').hide();
                    $('.mr').hide();
                    $('#resp').show();
                    $('#resp').html('Salida Exitosa.');
                    $('#resp').delay(2000).hide(0);
                    document.getElementById('fecha').value = "";
                    document.getElementById('hora').value = "";
                    document.getElementById('celda').value = "";

                    setTimeout(function() {
                        window.location.href = '../view/index';
                    }, 2000);
                }
                if (response == 1) {
                    $('#err').show();
                    $('#err').html('Error al marcar salida.');
                    $('#err').delay(2000).hide(0);
                }

            }
        });
    };

});