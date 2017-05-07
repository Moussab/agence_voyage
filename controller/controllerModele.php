<?php

$pagetitle ='Agence de Voyage';


switch ($action) {

    case 'acceuil' : // page d'acceuil
    {
        $view = "Welcome";
        require("{$ROOT}{$DS}view{$DS}{$layout}.php");
        break;
    }

    case 'aboutUs' : // page d'acceuil
    {
        $view = "aboutUs";
        require("{$ROOT}{$DS}view{$DS}{$layout}.php");
        break;
    }

}