<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;


use Illuminate\Routing\Controller as BaseController;

/* los modelos  */
use App\Http\Models\UsuariosModel;
use App\Http\Models\ImagenesModel;

/* fin de modelos  */

class Controller extends BaseController
{
    protected $UsuariosModel;
    protected $ImagenesModel; 
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /* protected $Auth; */
    public function __construct(){
     $this->UsuariosModel = new UsuariosModel();
     $this->ImagenesModel = new ImagenesModel(); 
    }
    
}
