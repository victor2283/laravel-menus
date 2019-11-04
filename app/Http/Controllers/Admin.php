<?php namespace App\Controllers;

class Admin extends Controller
{

public function __construct(){

  $this->UsuariosModel =  new UsuariosModel();
     $this->FormulariosModel = new FormulariosModel();
     $this->ImagenesModel =  new ImagenesModel();
     $this->control = new Paginas();
     
    
  }
   public function index($pagina = 'administrar'){
       //echo 'aqui en admin';
      $dato= array('pagina' => $pagina, 'contenido'=> '');
      
      echo $this->control->mostrar_vistas('administrar');//ok / se modifica en paginas/menu_administrar
      
  }
   public function rutas($pagina = ''){
         
         echo 'enrutado';
        $dato= array('pagina' => $pagina, 'contenido'=> 'aqui contenidos ');
       echo $this->control->mostrar_header('administrar');
       echo  view('administrar/principal', $dato);
        echo $this->control->mostrar_footer('administrar');
  }
  }
   