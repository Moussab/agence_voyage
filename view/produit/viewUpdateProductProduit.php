
<?php
if (isset($_GET['error']) AND $_GET['error'] == 1){
    ?>

    <div class="main">
        <div class="alert alert-danger alert-pos">
            <strong>Prix incorrect</strong>
            <br>
        </div>
    </div>

    <?php
}
?>

<div class="center-container">
    <div class="header-main">
        <div class="header-bottom">
            <div class="header-center w3agile">
                <div class="header-left-bottom agileinfo">
                    <form action="index.php?controller=produit&action=upProduct" method="post" enctype="multipart/form-data">
                        <input  hidden value="<?php  echo $prod['id']; ?>" id="id" name="id" >
                        <label style="color: white;">Titre :</label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <input type="text" value="<?php  echo htmlspecialchars($prod['titre']); ?>" placeholder="Titre du voyage .." id="titre" name="titre"  required="required" pattern="[A-Za-z0-9./*-+=#\_@]" >
                        </div>
                        <label style="color: white;">Description : </label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <textarea type="text"  id="desc" name="desc" placeholder="Entrer votre description ici ... "><?php  echo htmlspecialchars($prod['description']); ?></textarea>
                        </div>
                        <label style="color: white;">Prix :</label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <input type="text" value="<?php  echo htmlspecialchars($prod['prix']); ?>" placeholder="Entrer le prix du voyage" id="prix" name="prix" required="required" pattern="[0-9.,]+" >
                        </div>
                        <label style="color: white;">Pays :</label>

                        <?php

                        $SQL="SELECT * FROM pays";
                        //echo $SQL ;
                        try{
                            $req_prep = Model::$pdo->query($SQL);
                            $all_Art = $req_prep->fetchAll(); ;
                        } catch(PDOException $e) {
                            if (Conf::getDebug()) {
                                echo $e->getMessage(); // affiche un message d'erreur
                            } else {
                                echo 'Une erreur est survenue <a href="www.google.com"> retour a la page d\'accueil </a>';
                            }
                            die();
                        }

                        ?>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <select id="pays" required name="pays" style="height: 50px;">
                                <option style="color: black;" value="<?php  echo htmlspecialchars($prod['pays']); ?>"><?php  echo htmlspecialchars($prod['pays']); ?></option>
                                <?php
                                for ($i = 0 ; $i < count($all_Art); $i++) {
                                    ?>
                                    <option style="color: black;" value="<?php echo $all_Art[$i]['nom_en_gb']; ?>"><?php echo $all_Art[$i]['nom_en_gb']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <label style="color: white;">Photo produit : </label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon1" id="upload-pic">
                                    <i class="fa" aria-hidden="true"></i>
                                    <input type="file" id="picProf"  name="picProf[]" multiple accept='image/*'>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="bottom">
                            <input type="submit" value="Modifier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
