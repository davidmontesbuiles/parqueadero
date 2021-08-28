$(document).ready(function() {
    $('#resp1').hide();
    $('#err1').hide();
    $('#progress').hide();
});

$('#editarBicicletas').click(function() {

    let Cedula = document.getElementById('cedula').value;
    let id = document.getElementById('idCodeEd').value;
    let Foto = $('#foto')[0].files[0];

    let formData = new FormData();

    formData.append('fot', Foto);
    formData.append('ced', Cedula);
    formData.append('idC', id);


    if (Cedula.length == 0) {
        $('#err1').show();
        $('#err1').html("Debe llenar todos los campos");
        $('#err1').delay(2000).hide(0);
    } else {

        $.ajax({
            url: '../model/editarBicicletas.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == 0) {
                    $('#editarBicicletas').hide();
                    $('#x').hide();
                    $('#progress').show();
                    move();

                    function move() {
                        let elem = document.getElementById("myBar");
                        let width = 0;
                        let id = setInterval(frame, 20);

                        function frame() {
                            if (width >= 100) {
                                clearInterval(id);
                            } else {
                                width++;
                                elem.style.width = width + '%';
                                document.getElementById("label").innerHTML = width * 1 + '%';
                            }
                        }
                    }
                    setTimeout(function() {
                        $('#progress').hide();
                        $('#resp1').show();
                        $('#editarBicicletas').show();
                        $('#resp1').html('Actualización exitosa.');
                        $('#resp1').delay(2000).hide(0);
                    }, 2000);

                    setTimeout(function() {
                        location.reload();
                        $('#x').show();
                    }, 3000);
                }
                if (response == 1) {
                    $('#err1').show();
                    $('#err1').html('Error al actualizar.');
                    $('#err1').delay(2000).hide(0);
                }
                if (response == 2) {
                    $('#err1').show();
                    $('#err1').html('Error en el formato de imagen.');
                    $('#err1').delay(2000).hide(0);
                }
            }
        });
    };

});