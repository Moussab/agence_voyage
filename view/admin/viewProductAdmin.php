<div class="row">


    <div class="col-sm-12">
        <a href="index.php?controller=produit&action=AddProduct" id="addProd">Ajouter un produit</a>
        <br><br><br><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th style="width:5%;">ID_Voyage</th>
                        <th style="width:15%;">Titre</th>
                        <th style="width:20%;">Description</th>
                        <th>Prix</th>
                        <th>Pays</th>
                        <th>Voir Photos</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
            </div>
            <div class="panel-body">


                <tbody>
                <?php
                $max = sizeof($all_Art);
                $str = '';
                for ($i = 0 ; $i < $max; $i++){

                    $p = $all_Art[$i];

                    $str .= '<tr>
                                    <td style="width:5%;">';
                    $str .= $p['id'];

                    $str .= '</td>
                                    <td style="width:15%;">';
                    $str .= $p['titre'];

                    $str .= '</td>
                                    <td style="width:20%;">';
                    $str .= $p['description'];

                    $str .= '</td>
                                    <td>';
                    $str .= $p['prix'].' €';

                    $str .= '</td>
                                    <td>';
                    $str .= $p['pays'];

                    $str .= '</td>
                                    <td>';
                    $str .= '<a  data-toggle="modal" data-target="#Modal'.$i.'" href="#"  >Photos</a>';;

                    $str .= '</td>
                                    <td>';
                    $str .= '<a href="index.php?controller=produit&action=updateProduct&id_prod='.$p['id'].'" >Modifier</a>';

                    $str .= '</td>
                                    <td>';
                    $str .= '<a data-toggle="modal" data-target="#myModal'.$i.'" href="#" >Supprimer</a>';

                    $str .= '</td>
                                    </tr>';

                    ?>

                    <div id="myModal<?php echo $i; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Voulez vous vraiment supprimer ce produit ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                    <a style="padding-left: 20px; padding-right: 20px; padding-top: 8px; color: #0b0b0b; text-decoration: none; padding-bottom: 8px; background-color: #00cc00; margin-left: 35px;" href="index.php?controller=produit&action=removeProduct&id_prod=<?php echo $p['id']; ?>">Confirmer</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <?php
                    $str1 = '';
                    $id = $p['id'];
                    $sql = "SELECT * FROM photo";

                    try{
                        $results = Model::$pdo->query($sql);
                        $results->setFetchMode(PDO::FETCH_ASSOC);

                        $cpt = 0;
                        while ($result = $results->fetch()){

                            $url = $result['urlPhoto'];
                            $titre = $p['titre'];
                            $str1 .= '<li>
                                <a href="'.$url.'">
                                    <img src="'.$url.'" alt="" style="width: 120%; height: 120%;" />
                                </a>
                            </li>';

                        }
                        ?>
                        <?php

                    } catch(PDOException $e) {
                        if (Conf::getDebug()) {
                            echo $e->getMessage(); // affiche un message d'erreur
                        } else {
                            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                        }
                        die();
                    }
                    ?>


                    <div id="Modal<?php echo $i; ?>" style="width: 80%; margin-left: 10%;" class="modal fade" role="dialog">
                            <ul class="unorderlist">
                                <?php
                                echo $str1;
                                ?>
                            </ul>
                    </div>
                    <?php

                }

                echo $str;
                ?>
                </tbody>
                </table>

            </div>
        </div>
    </div>

</div>







