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
require ("{$ROOT}{$DS}model{$DS}modelReservation.php");


switch ($action){


    case 'addCart':

        $controller = 'reservation';
        $view = 'reservation';
        $action = 'reservation';
        $id_prod = $_GET['id_prod'];

        break;

    case 'addReservation':



            if (isset($_POST['email']) && isset($_POST['name'])  &&
                isset($_POST['arive']) && isset($_POST['depart']) &&
                isset($_POST['destioantion']) && isset($_POST['nb_personnes'])) {

                $email = htmlspecialchars($_POST['email']);
                $name = htmlspecialchars($_POST['name']);
                $arive = htmlspecialchars($_POST['arive']);
                $depart = htmlspecialchars($_POST['depart']);
                $destioantion = htmlspecialchars($_POST['destioantion']);
                $nb_personnes = htmlspecialchars($_POST['nb_personnes']);
                $id_prod = $_POST['id'];

                if (isset($_SESSION['user'])){
                    $user = $_SESSION['user'];
                }
                if (isset($_SESSION['userAdmin'])){
                    $user = $_SESSION['userAdmin'];
                }


                $champs = array('id_user', 'id_voyage', 'date_depart', 'date_retour','nb_personnes');
                $values = array($user['id'],$id_prod, $arive, $depart,$nb_personnes);

                modelReservation::insertReservation($champs, $values);

                $all_Art = modelReservation::getAll('reservation');
                $controller = 'reservation';
                $view = 'panier';
                $action = 'showPanier';
            }

        break;

    case 'showPanier':
        $all_Art = modelReservation::getAll('reservation');
        $controller = 'reservation';
        $view = 'panier';
        $action = 'panier';
        break;

    case 'done':

        if (isset($_SESSION['user'])){
            $user = $_SESSION['user'];
        }
        if (isset($_SESSION['userAdmin'])){
            $user = $_SESSION['userAdmin'];
        }

        $id = $user['id'];

        $SQL="SELECT * FROM reservation WHERE id_user = $id";
        //echo $SQL ;
        try{
            $req_prep = Model::$pdo->query($SQL);
            $reservations = $req_prep->fetchAll();
        } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="www.google.com"> retour a la page d\'accueil </a>';
            }
            die();
        }

        $max = count($reservations);

        for ($i = 0 ; $i < $max; $i++){
            $reservation = $reservations[$i];
            $id = $reservation['id'];
            if($reservation['valider'] == 0){
                $sql = "UPDATE reservation SET valider = 1 WHERE id = $id ";

                try{
                    $req_prep = Model::$pdo->prepare($sql);
                    $req_prep->execute();
                } catch(PDOException $e) {
                    if (Conf::getDebug()) {
                        echo "PROBLEME"; // affiche un message d'erreur
                    }
                    return -1;
                    die();
                }
            }
        }

        $all_Art = modelReservation::getAll('reservation');
        $controller = 'reservation';
        $view = 'panier';
        $action = 'panier';

        break;


}
require ("{$ROOT}{$DS}view{$DS}{$layout}.php");