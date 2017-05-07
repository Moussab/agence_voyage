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

require ("{$ROOT}{$DS}model{$DS}modelProduit.php");

switch ($action){

    case 'AddProduct':
        if (isset($_SESSION['user']) || isset($_SESSION['userAdmin'])){
            $usr = $_SESSION['userAdmin'];
            $pagetitle = ucfirst($usr['nom']);
            $view ='AddProduct';
        }else{
            header('Location:  index.php');
        }

        break;

    case 'storeProduct':
        if (isset($_SESSION['user']) || isset($_SESSION['userAdmin'])){
            if (isset($_POST['titre']) && isset($_POST['desc'])  && isset($_POST['prix']) && isset($_POST['pays'])) {

                    $titre = htmlspecialchars($_POST['titre']);
                    $pays = htmlspecialchars($_POST['pays']);
                    $prix = htmlspecialchars($_POST['prix']);
                    $desc = htmlspecialchars($_POST['desc']);
                    $picture = 'uploads/profilePicture.png';

                    $champs = array('titre', 'description', 'prix', 'pays');
                    $values = array($titre, $desc, $prix, $pays);


                modelProduit::insertProduit($champs, $values);

                $voyage = modelProduit::selectProduit('titre',$titre);

                if (isset($_FILES['picProf'])) {
                        $picProf = $_FILES['picProf'];
                        $target_dir = "uploads/";
                        $allowedExts = array("gif", "jpeg", "jpg", "png");
                        $max = count($_FILES["picProf"]["name"]);

                    if ($max !== 1) {
                        for ($i = 0; $i < $max; $i++) {
                            $temp = explode(".", $_FILES["picProf"]["name"][$i]);
                            $extension = end($temp);
                            if ((($_FILES["picProf"]["type"][$i] == "image/gif")
                                    || ($_FILES["picProf"]["type"][$i] == "image/jpeg")
                                    || ($_FILES["picProf"]["type"][$i] == "image/jpg")
                                    || ($_FILES["picProf"]["type"][$i] == "image/pjpeg")
                                    || ($_FILES["picProf"]["type"][$i] == "image/x-png")
                                    || ($_FILES["picProf"]["type"][$i] == "image/png"))
                                && in_array($extension, $allowedExts)
                            ) {

                                $destinationPicProf = $target_dir . $_FILES["picProf"]["name"][$i];
                                move_uploaded_file($_FILES["picProf"]["tmp_name"][$i], $target_dir . $_FILES["picProf"]["name"][$i]);

                                $champs = array('urlPhoto', 'id_voyage');
                                $values = array($destinationPicProf, $voyage['id']);


                                $sql = "INSERT INTO photo (";

                                foreach ($champs as $cle => $champ) {
                                    $sql .= $champ . ',';
                                }
                                $sql = rtrim($sql, ",");

                                $sql .= ')';

                                $sql .= ' VALUES ("';

                                foreach ($values as $cle => $valeur) {
                                    $sql .= $valeur . '","';
                                }
                                $sql = rtrim($sql, ',"",');

                                $sql .= '");';


                                try {
                                    $req_prep = Model::$pdo->prepare($sql);
                                    $req_prep->execute();
                                } catch (PDOException $e) {
                                    if (Conf::getDebug()) {
                                        echo $e->getMessage(); // affiche un message d'erreur
                                    } else {
                                        echo 'Une erreur est survenue <a href="#"> retour a la page d\'accueil </a>';
                                    }
                                    die();
                                }
                            }
                        }

                    }else{
                        $champs = array('urlPhoto', 'id_voyage');
                        $values = array('uploads/voyage.jpg', $voyage['id']);


                        $sql = "INSERT INTO photo (";

                        foreach ($champs as $cle => $champ) {
                            $sql .= $champ . ',';
                        }
                        $sql = rtrim($sql, ",");

                        $sql .= ')';

                        $sql .= ' VALUES ("';

                        foreach ($values as $cle => $valeur) {
                            $sql .= $valeur . '","';
                        }
                        $sql = rtrim($sql, ',"",');

                        $sql .= '");';


                        try {
                            $req_prep = Model::$pdo->prepare($sql);
                            $req_prep->execute();
                        } catch (PDOException $e) {
                            if (Conf::getDebug()) {
                                echo $e->getMessage(); // affiche un message d'erreur
                            } else {
                                echo 'Une erreur est survenue <a href="#"> retour a la page d\'accueil </a>';
                            }
                            die();
                        }
                    }
                }



                    $all_Art = ModelProduit::getAllProduit();
                    $controller = 'admin';
                    $view = 'product';
                    $action = 'produit';
                    //header('Location: index.php?controller=admin&action=Settings');

            }else{
                $view="Error";
                $error ='Compte Existant';
            }
        }else{
            header('Location:  index.php');
        }
        break;

    case 'getProduct':
        $all_Art = ModelProduit::getAllProduit();
        $controller= 'admin';
        $view = 'product';
        $action= 'produit';
        break;

    case 'removeProduct':
        if (isset($_SESSION['user']) || isset($_SESSION['userAdmin'])){

            $id_prod= htmlspecialchars($_GET['id_prod']);

            modelProduit::deleteProduit('id',$id_prod);

            $sql = "DELETE FROM photo WHERE id_voyage = $id_prod";
            try{
                $req_prep = Model::$pdo->prepare($sql);

                $req_prep->execute();
            } catch(PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                }
                return -1;
                die();
            }

            $all_Art = modelProduit::getAllProduit();

            $controller= 'admin';
            $view = 'product';
            $action= 'produit';
        }else{
            header('Location:  index.php');
        }
        break;

    case 'updateProduct':
        if (isset($_SESSION['user']) || isset($_SESSION['userAdmin'])){

            $id_prod= htmlspecialchars($_GET['id_prod']);
            $prod = null;
            $all_Art = ModelProduit::getAllProduit();


            for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
                if($id_prod == $all_Art[$i]['id']){
                    $prod = $all_Art[$i];
                }
            }

            $view ='updateProduct';
        }else{
            header('Location:  index.php');
        }
        /*$controller= 'admin';
        $view = 'product';
        $action= 'produit';*/
        break;


    case 'upProduct':
        if (isset($_SESSION['user']) || isset($_SESSION['userAdmin'])){
            if (isset($_POST['titre']) && isset($_POST['desc'])  && isset($_POST['prix']) && isset($_POST['pays'])) {


                $id = htmlspecialchars($_POST['id']);
                $titre = htmlspecialchars($_POST['titre']);
                $pays = htmlspecialchars($_POST['pays']);
                $prix = htmlspecialchars($_POST['prix']);
                $desc = htmlspecialchars($_POST['desc']);
                $picture = 'uploads/profilePicture.png';



                $id = htmlspecialchars($_POST['id']);
                $champs = array('id','titre', 'description', 'prix', 'pays');
                $values = array($id,$titre, $desc, $prix, $pays);
                modelProduit::updateProduit($champs, $values);

                $voyage = modelProduit::selectProduit('titre',$titre);


                if (isset($_FILES['picProf'])) {
                    $picProf = $_FILES['picProf'];
                    $target_dir = "uploads/";
                    $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $max = count($_FILES["picProf"]["name"]);

                    for ($i = 0 ; $i < $max ; $i++){
                        $temp = explode(".", $_FILES["picProf"]["name"][$i]);
                        $extension = end($temp);
                        if ((($_FILES["picProf"]["type"][$i] == "image/gif")
                                || ($_FILES["picProf"]["type"][$i] == "image/jpeg")
                                || ($_FILES["picProf"]["type"][$i] == "image/jpg")
                                || ($_FILES["picProf"]["type"][$i] == "image/pjpeg")
                                || ($_FILES["picProf"]["type"][$i] == "image/x-png")
                                || ($_FILES["picProf"]["type"][$i] == "image/png"))
                            && in_array($extension, $allowedExts)
                        ) {

                            $destinationPicProf = $target_dir . $_FILES["picProf"]["name"][$i];
                            move_uploaded_file($_FILES["picProf"]["tmp_name"][$i], $target_dir . $_FILES["picProf"]["name"][$i]);

                            $champs = array('urlPhoto', 'id_voyage');
                            $values = array($destinationPicProf,$voyage['id']);


                            $sql = "INSERT INTO photo (";

                            foreach ($champs as $cle => $champ){
                                $sql .= $champ.',';
                            }
                            $sql=rtrim($sql,",");

                            $sql.=')';

                            $sql .= ' VALUES ("';

                            foreach ($values as $cle => $valeur){
                                $sql .= $valeur.'","';
                            }
                            $sql=rtrim($sql,',"",');

                            $sql.='");';


                            try{
                                $req_prep = Model::$pdo->prepare($sql);
                                $req_prep->execute();
                            }catch(PDOException $e) {
                                if (Conf::getDebug()) {
                                    echo $e->getMessage(); // affiche un message d'erreur
                                } else {
                                    echo 'Une erreur est survenue <a href="#"> retour a la page d\'accueil </a>';
                                }
                                die();
                            }
                        }
                    }
                }



                    $all_Art = ModelProduit::getAllProduit();
                    $error = ' Modification effectuée, vous serez redirection  vers la gestion des produits.';

                    $controller= 'produit';
                    $view = 'msgFlash';
                    $action= 'Produit';

            }
        }else{
            header('Location:  index.php');
        }

        break;

    case 'showProd':

        $id_prod = $_GET['id_prod'];
        $prods = ModelProduit::getAllProduit();

        $prod = null;

        for ($i = 0 ; $i < sizeof($prods) ; $i++){
            $p = $prods[$i];
            if($p['id'] == $id_prod){
                $prod = $p;
            }
        }

        if(is_null($prod)){
            $view="Error";
            $error ='Produit Inexistant';
        }else{
            $controller = 'produit';
            $action = 'prodDetails';
        }


        break;

    case 'allTravels':
        $all_Art = ModelProduit::getAllProduit();
        $controller= 'produit';
        $view = 'allTravels';
        $action= 'produit';

        break;

    default:
        $controller= 'user';
        $view = 'notFound';
        $action= 'User';
        break;
}

require ("{$ROOT}{$DS}view{$DS}{$layout}.php");