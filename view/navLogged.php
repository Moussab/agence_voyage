<div class="header">
    <div class="header-top">

        <?php
        if((isset($_SESSION['user'])) OR (isset($_SESSION['userAdmin']))) {
            ?>
            <a href="index.php?controller=user&action=Profile"
               style="float: right; color: #0b0b0b; text-decoration: none; "><?php echo $_SESSION['user']['nom']; ?></a>
            <?php
        }
        ?>


        <div class="col-sm-3 logo text-left">
            <a href="index.php">Agence de Voyage</a>
        </div>

        <div class="col-sm-9">
            <div class="cart box_1">
                <a href="index.php?controller=reservation&action=showPanier">
                    <?php

                    if (isset($_SESSION['user'])){
                        $user = $_SESSION['user'];
                    }
                    if (isset($_SESSION['userAdmin'])){
                        $user = $_SESSION['userAdmin'];
                    }

                    $id = $user['id'];

                    $SQL="SELECT * FROM reservation WHERE id_user = $id AND valider = 0";
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

                    $nbProd = count($reservations);

                    ?>
                    <h3><?php echo $nbProd;  ?> <img src="assets/images/cart.png" alt=""></h3>
                </a>

            </div>
            <p class="log">
                <?php
                if (isset($_SESSION['user'])){
                $usr = $_SESSION['user'];
                ?>
                <a href="index.php?controller=produit&action=allTravels&page=0">Nos Voyages</a><span> </span><a  href="index.php">Qui Sommes-Nous</a><span> </span><a  href="index.php?controller=user&action=Logout">Se déconnecter</a>
            </p>
            <?php
            }

            ?>
            </p>
        </div>
        <div class="clearfix"> </div>

    </div>

    <div class="head-top">
        <div class="col-sm-3 number">
            <span><i class="glyphicon glyphicon-headphones"></i>Service client : 00 33 6 98 63 54 23</span>
        </div>
        <div class="col-sm-7 search">
            <form method="post" action="index.php?controller=search">
                <div class="col-sm-8">
                    <input name="search" type="search" value="Rechercher" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Rechercher';}" required="">
                </div>
                <?php
                require_once ('model/Model.php');

                $SQL="SELECT * FROM pays";
                //echo $SQL ;
                try{
                    $req_prep = Model::$pdo->query($SQL);
                    $paysss = $req_prep->fetchAll(); ;
                } catch(PDOException $e) {
                    if (Conf::getDebug()) {
                        echo $e->getMessage(); // affiche un message d'erreur
                    } else {
                        echo 'Une erreur est survenue <a href="www.google.com"> retour a la page d\'accueil </a>';
                    }
                    die();
                }

                ?>
                <div class="col-sm-3">
                    <select id="pays"  required name="pays" style="border 1px solid gainsboro ; color: #0b0b0b; font-size: 10px; float: right; margin-right: -30px;  height: 42px; width: 150px;">
                        <option style="color: black;" value="Pays">--Pays--</option>
                        <?php
                        for ($i = 0 ; $i < count($paysss); $i++) {
                            ?>
                            <option style="color: black;" value="<?php echo $paysss[$i]['nom_en_gb']; ?>"><?php echo $paysss[$i]['nom_en_gb']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-sm-1">
                    <input type="submit" value=" ">
                </div>

            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>