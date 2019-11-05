<script type="text/javascript">

        window.onload = function() { 
 
                var fileInput = document.getElementById('{{$archivo}}');
                var fileDisplayArea = document.getElementById('{{$caja}}');

                fileInput.addEventListener('change', function(e) {
                        var file = fileInput.files[0];
                        var fileSize = fileInput.files[0].size;
                        var siezekiloByte = parseInt(fileSize / 1024);
                        var imageType = /image.*/;

                        if (file.type.match(imageType)) {
                              if(siezekiloByte < 1124 ){ 
                                var reader = new FileReader();
                                reader.onload = function(e){
                                        fileDisplayArea.innerHTML = "";

                                        fileDisplayArea.innerHTML = '<h1 class ="text-white center">Tamaño: '+ siezekiloByte +' Kb</h1>';
                                        fileDisplayArea.style.backgroundImage='url('+ reader.result +')'; 
                                        $("#{{$binario_img}}").val(reader.result);
                                 }
                                        
                                         reader.readAsDataURL(file);
                             }else{ 
                             
                                fileDisplayArea.style.backgroundImage='url()';  
                                fileDisplayArea.innerHTML = "<h1 class ='bg-danger text-white center'>El Archivo es Mayor al tamaño máximo permitido en KB, pesa "+siezekiloByte+" Kb </h1>"; 
                              }   
                                	
                        }else {
                                fileDisplayArea.style.backgroundImage='url()'; 
                                fileDisplayArea.innerHTML = "<h1 class ='text-white center'>Archivo no soportado</h1>";
                        }
                });

}
</script>

        