<?php
include_once __DIR__."/../controllers/loging.controller.php";
include_once __DIR__."/../controllers/menu.controller.php";
include_once __DIR__."/../commonfucntions/mvcpreview.php";

//creamos db ejemplo
$DB = null;
$mvcPreview = new mvcPreview('loging');

//menu
$menuV = new menu();
$menuV->ActualSelected('loging');
$menuV->fillView();

//loging
$logingV = new loging($DB);
$userData = $logingV->getUserDataFromDB(1234);

//cerramos la db
//mysqli_close(DB);

//datos para la vista en formato array
$model = [
    'NAME' => $userData['name'],
    'SURNAME' => $userData['surname']
];

$logingV->fillview($model);

//pintar
$mvcPreview->composeAndPreview([$menuV,$logingV]);