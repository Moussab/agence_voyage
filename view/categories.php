<br>


<?php
require_once('model/Model.php');

$SQL="SELECT * FROM voyage ORDER BY id DESC";
//echo $SQL ;
try{
    $req_prep = Model::$pdo->query($SQL);
    $travels = $req_prep->fetchAll();
    $max = count($travels);
    if($max >6) $max = 6;
} catch(PDOException $e) {
    if (Conf::getDebug()) {
        echo $e->getMessage(); // affiche un message d'erreur
    } else {
        echo 'Une erreur est survenue <a href="www.google.com"> retour a la page d\'accueil </a>';
    }
    die();
}

?>


<div class="promotions">
        <h2 class="tittle">Meilleur Guide de Voayge</h2>
        <span>Meilleur Package </span>
        <div class="promotion-grids">
            <?php
                for ($i = 0 ; $i < $max ; $i++){
                    $pays = $travels[$i]['pays'];
                    $description = $travels[$i]['description'];
                    $id = $travels[$i]['id'];
                    $SQL="SELECT DISTINCT * FROM photo WHERE id_voyage = $id";
                    //echo $SQL ;
                    try{
                        $req_prep = Model::$pdo->query($SQL);
                        $photo = $req_prep->fetchAll();
                        $url = $photo[0]['urlPhoto'];
                    } catch(PDOException $e) {
                        if (Conf::getDebug()) {
                            echo $e->getMessage(); // affiche un message d'erreur
                        } else {
                            echo 'Une erreur est survenue <a href="www.google.com"> retour a la page d\'accueil </a>';
                        }
                        die();
                    }
                ?>
                    <a href="index.php?controller=produit&action=showProd&id_prod=<?php echo $id; ?>"  style="margin-bottom: 20px;">
                    <div class="col-md-4 promation-grid">
                        <img src="<?php echo $url;?>" class="img-responsive" alt="">
                        <div class="prom-text" style="padding-bottom: 50px;">
                            <h4><?php echo $pays;?></h4>
                            <p><?php echo $description;?>.</p>
                        </div>
                    </div>
                </a>
                <?php
                }
            ?>

            <div class="clearfix"></div>
        </div>

</div>