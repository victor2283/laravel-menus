
window.addEventListener('load', function(){
    
    document.getElementById('archivo').addEventListener('change', function(ev_header){
        var arch=new FileReader();
        arch.addEventListener('load',function(ev){
            document.getElementById('caja').style.backgroundImage='url('+ ev.target.result +')';
        },false);
        arch.readAsDataURL(ev_header.target.files[0]);
     }, false);
    
}, false);



    
    
  
 
    
    
    