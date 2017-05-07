<div class="header">
    <div class="header-top">


        <div class="col-sm-3 logo text-left" style="font-size: larger;">
            <a href="index.php">Agence de Voyage</a>
        </div>
        <div class="col-sm-6">
            <p class="log">

                <a href="index.php?controller=produit&action=allTravels&page=0">Nos Voyages</a><span> </span><a  href="index.php?controller=modele&action=aboutUs">Qui Sommes-Nous</a>

            </p>
        </div>
        <div class="col-sm-3 header-left">
            <!--div-- class="cart box_1">
                <a href="index.php?controller=panier&action=schow">
                    <h3><*/?php echo (isset($_SESSION['panier']))?/* ModelPanier::getTotalProd().*/' produit(s)':'0 produit';  ?> <img src="assets/images/cart.png" alt=""></h3>
                </a>
            </div-->

            <p class="log">
                <br><br>
                <a href="index.php?controller=user&action=signUp">S'inscrire </a><span>ou</span><a  href="index.php?controller=user&action=logIn"> S'identifier</a>
            </p>

            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>

    </div>

    <div class="head-top">
        <div class="col-sm-3 number">
            <span>Service client : 00 33 6 98 63 54 23</span>
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
                    <select id="pays"  required name="pays" style="border 1px solid gainsboro ;color: #0b0b0b; font-size: 10px; float: right; margin-right: -30px;  height: 42px; width: 150px;">
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