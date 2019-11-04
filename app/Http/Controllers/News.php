<?php namespace App\Http\Controllers;

use App\Http\Models\NewsModel;

class News extends Controller

{
public $News_model;
        public function __construct()
        {
                $this->New_model = new NewsModel();       
        }
    public function index()

    {
        $datos['news'] = $this->New_model->getNews();
        return view('news\overview', compact('datos'));     

    }
    public function rutas($page=false ){
       
         
       
        /*  $datos=  $this->PaginasModel->cargar_datos($page);    */
         $datos['news'] = $this->New_model->getNews($page);
         return view('news\view', compact('datos'));
     }



}