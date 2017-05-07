<?php


$layout='viewVisitor';

if(isset($_SESSION['user']))
{
    $layout ='viewConnected';
}
else if(isset($_SESSION['userAdmin']))
{
    $layout='viewAdmin';
}

$error ='';

require ("{$ROOT}{$DS}model{$DS}modelAdmin.php");


switch ($action){

    case 'Profile':
        if (isset($_SESSION['userAdmin']) || isset($_SESSION['user'])) {
            $usr = $_SESSION['userAdmin'];
            $pagetitle = htmlspecialchars(ucfirst($usr['nom']));
            $view ='Profile';
        }else{
            header('Location: index.php');
        }


        break;

    case 'product':
        if (isset($_SESSION['userAdmin']) || isset($_SESSION['user'])) {
            $pagetitle = 'Product management';
            $view ='Product';
        }else{
            header('Location: index.php');
        }
        break;

    case 'cmd':
        if (isset($_SESSION['userAdmin']) || isset($_SESSION['user'])) {
            $pagetitle = 'Commande management';
            $view ='Commande';
        }else{
            header('Location: index.php');
        }
        break;

    case 'users':
        if (isset($_SESSION['userAdmin']) || isset($_SESSION['user'])) {
            $pagetitle = 'Users Management';
            $view ='Users';
        }else{
            header('Location: index.php');
        }
        break;

    case 'comment':
        if (isset($_SESSION['userAdmin']) || isset($_SESSION['user'])) {
            $pagetitle = 'Commentaire Management';
            $view ='Commentaire';
        }else{
            header('Location: index.php');
        }
        break;

    case 'Settings':
        if (isset($_SESSION['userAdmin']) || isset($_SESSION['user'])) {
            $pagetitle = 'Settings';
            $view ='Settings';
        }else{
            header('Location: index.php');
        }
        break;

    case 'Logout':
        if(isset($_SESSION['user']) || isset($_SESSION['userAdmin'])){
            $pagetitle='Logged Out';

            if (isset($_SESSION['user']))
                session_unset($_SESSION['user']);
            else
                session_unset($_SESSION['userAdmin']);

            header('Location: index.php');
        }else{
            $pagetitle ='Login';
            $view='Login';
        }
        break;


    case 'users':



        break;

    default:
        $controller= 'user';
        $view = 'notFound';
        $action= 'User';
        break;
}

require ("{$ROOT}{$DS}view{$DS}{$layout}.php");