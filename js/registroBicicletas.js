$(document).ready(function() {
    $('#resp').hide();
    $('#err').hide();
    $('#camp').hide();
    $('#progress').hide();
});

$('#registroBicicletas').click(function() {

    let Cedula = document.getElementById('cedula').value;
    let Ingreso = document.getElementById('ingreso').checked;
    let Foto = $('#foto')[0].files[0];

    let formData = new FormData();

    formData.append('fot', Foto);
    formData.append('ced', Cedula);
    if (Ingreso) {
        formData.append('chk', '1');
    } else {
        formData.append('chk', '0');
    }


    if (Cedula.length == 0 || Foto == null) {
        $('#camp').show();
        $('#camp').html("Debe llenar todos los campos");
        $('#camp').delay(2000).hide(0);
    } else {

        $.ajax({
            url: '../model/registroBicicletas.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == 0) {
                    $('#registroBicicletas').hide();
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
                        $('#resp').show();
                        $('#registroBicicletas').show();
                        $('#resp').html('Registro exitoso.');
                        $('#resp').delay(2000).hide(0);
                        document.getElementById('cedula').value = "";
                        $('#foto').val('');
                        $(".delPhoto").addClass('notBlock');
                        $("#img").remove();
                    }, 2000);
                }
                if (response == 1) {
                    $('#err').show();
                    $('#err').html('Error al registrar.');
                    $('#err').delay(2000).hide(0);
                }
                if (response == 2) {
                    $('#err').show();
                    $('#err').html('Error en el formato de imagen.');
                    $('#err').delay(2000).hide(0);
                }
                if (response == 3) {
                    $('#registroBicicletas').hide();
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
                        $('#resp').show();
                        $('#registroBicicletas').show();
                        $('#resp').html('Registro exitoso.');
                        $('#resp').delay(2000).hide(0);
                        document.getElementById('cedula').value = "";
                        $('#foto').val('');
                        $(".delPhoto").addClass('notBlock');
                        $("#img").remove();
                    }, 2000);
                    setTimeout(function() {
                        window.location.href = '../view/bicicletas?case=1';
                    }, 3000);
                }

            }
        });
    };

});