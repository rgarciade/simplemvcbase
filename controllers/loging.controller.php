<?php
include_once __DIR__."/../commonfucntions/mvccontrol.php";
///este sacara todos los datos necesarios
class loging  extends mvc{
    public function getUserDataFromDB($userId){
        //conexion y saco datos
        return [
            'id' => $userId,
            'name' => 'pepe',
            'surname' => 'garcia'
        ];
    }
}


