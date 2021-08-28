$(document).ready(function() {
    $('#err1').hide();
    $('#resp1').hide();
});

$('#marcarEntrada').click(function() {

    let Fecha = document.getElementById('fechaE').value;
    let Hora = document.getElementById('horaE').value;
    let Celda = document.getElementById('celdaE').value;
    let idCode = document.getElementById('idCodeE').value;
    let Reingreso = document.getElementById('rein').value;

    let formData = new FormData();

    formData.append('fec', Fecha);
    formData.append('hor', Hora);
    formData.append('cel', Celda);
    formData.append('id', idCode);
    formData.append('re', Reingreso);



    if (Fecha == null || Hora.length == 0 || Celda.length == 0) {
        $('#err1').show();
        $('#err1').html("Debe llenar todos los campos");
        $('#err1').delay(2000).hide(0);
    } else {

        $.ajax({
            url: '../model/marcarEntrada.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == 0) {
                    $('#marcarEntrada').hide();
                    $('#cancelar1').hide();
                    $('.mr1').hide();
                    $('#resp1').show();
                    $('#resp1').html('Entrada Exitosa.');
                    $('#resp1').delay(2000).hide(0);
                    document.getElementById('fechaE').value = "";
                    document.getElementById('horaE').value = "";
                    document.getElementById('celdaE').value = "";

                    setTimeout(function() {
                        window.location.href = '../view/index';
                    }, 2000);
                }
                if (response == 1) {
                    $('#err1').show();
                    $('#err1').html('Error al marcar entrada.');
                    $('#err1').delay(2000).hide(0);
                }
                if (response == 2) {
                    $('#err1').show();
                    $('#err1').html('La celda se encuentra ocupada.');
                    $('#err1').delay(2000).hide(0);
                }

            }
        });
    };

});