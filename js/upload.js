$(function () {
    $('#subida').submit(function () {

       var comprobar = $('#title').val().length* $('#foto').val().length*$('#desc').val().length;	
        
        if (comprobar > 0) {

            var formulario = $('#subida');

            var datos = formulario.serialize();

            var archivos = new FormData();
           
            var url = 'php/Upload_Photo.php';

            for (var i = 0; i < (formulario.find('input[type=file]').length); i++) {

                archivos.append((formulario.find('input[type="file"]:eq(' + i + ')').attr("name")), ((formulario.find('input[type="file"]:eq(' + i + ')')[0]).files[0]));

            }

            $.ajax({
                url: url + '?' + datos,
                type: 'POST',
                contentType: false,
                data: archivos,
                processData: false,
                beforeSend: function () {
                    $('#cargando').show(300);
                },
                success: function (data) {
                    console.log(data);
                    $('#cargando').hide(900);
                    $(location).attr('href', 'images.php');
                    return false;
                }

            });

            return false;

        } else {


            var imagen = document.getElementById("foto").files;
            if (imagen.length === 0)

            {
              //  $('#foto').after('<div class="alert alert-danger">No has seleccionado ningun archivo</div>');
                
                bootbox.alert("No has seleccionado ningun archivo");
                return false;
            }
            else

            {
                var imagen = document.getElementById("foto").files;
                for (x = 0; x < imagen.length; x++)

                {



                    if (imagen[x].type != "image/png" && imagen[x].type != "image/jpg" && imagen[x].type != "image/jpeg")

                    {
                        
                        bootbox.alert("El archivo" + imagen[x].name+ " no es una imagen");    
                        return false;
                          

                    }


                    if (imagen[x].size > 1024 * 1024 * 2)

                    {
                        
                        bootbox.alert("El archivo   " + imagen[x].name+ " sobrepasa el peso permitido");    
                        return  false;
                    }
                }
            }

        }
    });
});
