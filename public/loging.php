<?php
include_once __DIR__."/../controllers/loging.controller.php";

//creamos db ejemplo
$DB = null;
$logingV = new loging($DB);
$userData = $logingV->getUserDataFromDB(1234);


//datos para la vista en formato array
$model = [
    'NAME' => $userData['name'],
    'SURNAME' => $userData['surname']
];

$logingV->fillView($model,false);
$logingV->printView();