<?php


$layout='viewVisitor';

if(isset($_SESSION['user']))
{
    $layout ='viewConnected';

}

if(isset($_SESSION['userAdmin']))
{
    $layout='viewAdmin';
}
$error ='';
require ("{$ROOT}{$DS}model{$DS}modelRecherche.php");

$view = 'Empty';
if(isset($_POST['search']) || isset($_POST['pays'])){
    $array = modelRecherche::search(htmlspecialchars($_POST['search']),htmlspecialchars($_POST['pays']));
    if(!empty($array))
        $view ='Result';
}

require ("{$ROOT}{$DS}view{$DS}{$layout}.php");