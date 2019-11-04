<script type="text/javascript">

        window.onload = function() { 
 
                var fileInput = document.getElementById('{{$archivo}}');
                var fileDisplayArea = document.getElementById('{{$caja}}');

                fileInput.addEventListener('change', function(e) {
                        var file = fileInput.files[0];
                        var imageType = /image.*/;

                        if (file.type.match(imageType)) {
                             if(file.size < 1200 ){ // 1.2 mb
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                        fileDisplayArea.innerHTML = "";

                                        /* var img = new Image();
                                        img.src = reader.result; */

                                        /* fileDisplayArea.appendChild(img); */
                                        fileDisplayArea.style.backgroundImage='url('+ reader.result +')'; 
                                        $("#{{$binario_img}}").val(reader.result);
                                }

                                reader.readAsDataURL(file);
                             }else{
                             
                                fileDisplayArea.style.backgroundImage='url()';  
                                fileDisplayArea.innerHTML = "<h1 class ='text-white center'>Archivo es mayor al tamaño maximo permitido</h1>"
                             }   
                                	
                        }else {
                                fileDisplayArea.style.backgroundImage='url()'; 
                                fileDisplayArea.innerHTML = "<h1 class ='text-white center'>Archivo no soportado</h1>"
                        }
                });

}
</script>

        