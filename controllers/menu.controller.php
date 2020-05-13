<?php
include_once __DIR__."/../commonfucntions/mvccontrol.php";
///este sacara todos los datos necesarios
class menu  extends mvcControl{
    private $menus = [
        'INICIO' => '',
        'SOMOS' => '',
        'SERVICIOS' => '',
        'LOGING' => '',
        'CONTACTO' => '',
    ];
    function __construct($DB = null, $viewName = null){
        parent::__construct($DB,$viewName);
    }
    public function ActualSelected($actual){
        foreach ($this->menus as $key => $value) {

            if(strtoupper($key) == strtoupper($actual) ){
                $this->menus[$key] = 'activo';
            }
        }
    }
    public function fillView( array $model = null,  $title = false, $footter = null){
        if($model){
            $model = array_merge($this->menus,$model);
        }else{
            $model = $this->menus;
        }
        parent::fillView( $model, $title, $footter);
    }
}


