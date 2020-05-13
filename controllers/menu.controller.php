<?php
include_once __DIR__."/../commonfucntions/mvccontrol.php";
///este sacara todos los datos necesarios
class menu  extends mvcControl{
    function __construct($DB = null, $viewName = null){
        parent::__construct($DB,$viewName);
    }
}


