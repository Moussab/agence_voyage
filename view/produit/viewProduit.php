<div class="container">

    <?php
    $id = $prod['id'];
    $SQL="SELECT * FROM photo WHERE id_voyage = $id";
    //echo $SQL ;
    try{
        $req_prep = Model::$pdo->query($SQL);
        $photos = $req_prep->fetchAll();
    } catch(PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage(); // affiche un message d'erreur
        } else {
            echo 'Une erreur est survenue <a href="www.google.com"> retour a la page d\'accueil </a>';
        }
        die();
    }
    ?>

    <div class="product-desc">
        <div class="col-md-7 product-view">
            <h2 style="color: white;"><?php echo htmlspecialchars($prod['titre']); ?></h2>
            <br>
            <div class="flexslider">

                <div class="flex-viewport" style="overflow: hidden; position: relative;">
                    <ul class="slides" style="width: 1000%;">
                        <li data-thumb="images/ss3.jpg" class="clone" aria-hidden="true" style="width: 625px; float: left; display: block;">
                            <img style="width: 100%; height: 100%;" src="<?php echo $photos[0]['urlPhoto']; ?>" draggable="false">
                        </li>
                    </ul>
                </div>

                <ul class="flex-direction-nav">
                    <li class="flex-nav-prev">
                        <?php
                        if((isset($_SESSION['user'])) OR (isset($_SESSION['userAdmin']))){

                            ?>
                            <br>
                            <a class="flex-prev" id="showProd" href="index.php?controller=reservation&action=addCart&id_prod=<?php echo $prod['id']; ?>">Ajouter au panier</a>
                            <br>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>

            <!-- //FlexSlider -->
            <div class="product-details">
                <br>
                <p><strong style="color: white;">Description : </strong><br>
                    <strong><?php echo htmlspecialchars($prod['description']); ?></strong> </p>

            </div>
        </div>
        <div class="col-md-5 product-details-grid">
            <div class="item-price">
                <div class="product-price">
                    <p class="p-price">Prix : </p>
                    <h3 class="rate"><?php echo htmlspecialchars($prod['prix']); ?> €</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="condition">
                    <p class="p-price">Disponibilité : </p>
                    <h4><?php echo 'Disponible'; ?></h4>
                    <div class="clearfix"></div>
                </div>
                <div class="itemtype">
                    <p class="p-price">Pays : </p>
                    <h4><?php echo htmlspecialchars($prod['pays']); ?></h4>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php
            for ($k = 1 ; $k < count($photos); $k++) {
                ?>
                <div class="gallery">
                    <a target="_blank" href="<?php echo $photos[$k]['urlPhoto']; ?>">
                        <img src="<?php echo $photos[$k]['urlPhoto']; ?>" alt="Fjords" width="300" height="200">
                    </a>
                </div>
                <?php
            }
        ?>

    </div>
</div>