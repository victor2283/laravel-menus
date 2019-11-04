<?php namespace App\Http\Controllers;
use App\Http\Models\MenusModel;
use App\Http\Models\PaginasModel;
class HomeController extends Controller
{
    public $page;
    public $data=array(); 

    protected $PaginasModel;
    protected  $MenusModel;
    public function __construct(){
        $this->PaginasModel = new PaginasModel; 
        $this->MenusModel= new MenusModel;
    }
    public function index()
    {
        $datos=array();
        return view('pages\index', compact('datos'));
        /* return view('pages\home', compact('datos')); */
        
    }
    public function rutas($page){
        /* echo "seccion:".$seccion.'<br>';
        echo "ruta:".$page.'<br>';
        echo url()->full().'<br>';
        echo url()->current().'<br>';
        echo url()->previous(); */
        
        $datos=   $this->PaginasModel->cargar_datos($page);  
		$datos['seccion']='home';  
		$datos['menu'] = $this->MenusModel->datos_principales($page);
      //  var_dump($datos['menu']);
        return view('pages\\'.$page, compact('datos'));

    }
 
 
}
