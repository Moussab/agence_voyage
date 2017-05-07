<?php


session_start();

$ROOT = __DIR__;

$DS = DIRECTORY_SEPARATOR;

require_once ("{$ROOT}{$DS}model{$DS}modelPanier.php");
modelPanier::createBasket();

if ( !isset($_GET['action']) && !isset($_GET['controller']) ) /* soit page d'acceuil */
{
    $action = "acceuil" ;
}
else if(!isset($_GET['action'])) // s'il n a pas d'action
    $action = "readAll";
else
    $action = htmlspecialchars($_GET["action"]); // on recupère l'action

if(!isset($_GET["controller"])) // par defaut
    $controller = 'modele';
else
    $controller = htmlspecialchars($_GET["controller"]);


$view ='';

$layout='viewVisitor';

if(isset($_SESSION['user']))
{
    $layout ='viewConnected';
}
else
    if(isset($_SESSION['userAdmin']))
    {
        $layout='viewAdmin';
    }



switch ($controller){
    case 'modele':
        require("controller{$DS}controllerModele.php");
        break;

    case 'user':
        require ("controller{$DS}controllerUser.php");
        break;

    case 'admin':
        require ("controller{$DS}controllerAdmin.php");
        break;

    case 'produit':
        require ("controller{$DS}controllerProduit.php");
        break;

    case 'reservation':
        require ("controller{$DS}controllerReservation.php");
        break;

    case 'search':
        require ("controller{$DS}controllerSearch.php");
        break;

}


?>