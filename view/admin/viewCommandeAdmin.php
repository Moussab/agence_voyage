
<br><br>

<div class="panel panel-default">
    <div class="panel-heading">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Client</th>
                <th>Voyage</th>
                <th>Date d'arrivée</th>
                <th>DATE de retour</th>
                <th>Nombre de personnes</th>
                <th>Prix</th>
            </tr>
            </thead>
    </div>




    <div class="panel-body">

        <tbody>
        <?php

        $SQL="SELECT * FROM reservation";
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
        $str = '';
        for ($i = 0 ; $i < $max; $i++){

            $reservation = $reservations[$i];

            if($reservation['valider'] == 1){

                $idProds = $reservation['id_voyage'];

                $SQL="SELECT * FROM voyage WHERE id = $idProds";
                //echo $SQL ;
                try{
                    $req_prep = Model::$pdo->query($SQL);
                    $voyages = $req_prep->fetchAll();
                } catch(PDOException $e) {
                    if (Conf::getDebug()) {
                        echo $e->getMessage(); // affiche un message d'erreur
                    } else {
                        echo 'Une erreur est survenue <a href="www.google.com"> retour a la page d\'accueil </a>';
                    }
                    die();
                }
                $voyage = $voyages[0];

                $idUser = $reservation['id_user'];

                $SQL="SELECT * FROM user WHERE id = $idUser";
                //echo $SQL ;
                try{
                    $req_prep = Model::$pdo->query($SQL);
                    $users = $req_prep->fetchAll();
                } catch(PDOException $e) {
                    if (Conf::getDebug()) {
                        echo $e->getMessage(); // affiche un message d'erreur
                    } else {
                        echo 'Une erreur est survenue <a href="www.google.com"> retour a la page d\'accueil </a>';
                    }
                    die();
                }
                $user = $users[0];

                $str .= '<tr>
                                    <td>';
                $str .= htmlspecialchars($user['nom'].' '.$user['prenom']);

                $str .= '</td>
                                    <td>';
                $str .= htmlspecialchars($voyage['titre']);

                $str .= '</td>
                                    <td>';
                $str .= $reservation['date_depart'];

                $str .= '</td>
                                    <td>';
                $str .= htmlspecialchars($reservation['date_retour']);

                $str .= '</td>
                                    <td>';
                $str .= htmlspecialchars($reservation['nb_personnes']);

                $str .= '</td>
                                    <td>';
                $str .= htmlspecialchars($voyage['prix']);

                $str .= '</td>
                                    </tr>';


            }

        }

        echo $str;
        ?>
        </tbody>
        </table>

    </div>
</div>
<br>
<br>