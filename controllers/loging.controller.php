<?php
include_once __DIR__."/../commonfucntions/mvccontrol.php";
///este sacara todos los datos necesarios
class loging  extends mvcControl{
    function __construct($DB = null, $viewName = null){
       parent::__construct($DB,$viewName);
    }
    public function getUserDataFromDB($userId){
        //conexion y saco datos
        return [
            'id' => $userId,
            'name' => 'pepe',
            'surname' => 'garcia'
        ];
    }
}


