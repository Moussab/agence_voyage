<br>


<?php
require_once('model/Model.php');
    isset($_GET['page'])?$page=$_GET['page']:$page=0;
$max = count($array);
?>


<div class="promotions">
    <div class="promotion-grids">
        <?php
        $reste = $max - 9*$page;
        if ($reste < 9) $top = $reste + 9*$page;
        else $top = (9*($page+1));

        for ($i = (9*$page) ; $i < $top ; $i++){

            $pays = $array[$i]['pays'];
            $description = $array[$i]['description'];
            $id = $array[$i]['id'];
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
            <a href="index.php?controller=produit&action=showProd&id_prod=<?php echo $id; ?>" >
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
        <?php
        if (count($array)>9){
            $maximum = (int)(count($array) / 9);
            ?>
            <ul class="pager">
                <?php
                if ($page > 0) {
                    ?>
                    <li class="previous"><a
                            href="index.php?controller=produit&action=allTravels&go=previous&page=<?php echo ($page-1); ?>"
                            style="width: 200px; margin-left: 40px;">Previous</a></li>
                    <?php
                }
                if ($page < $maximum) {
                    ?>
                    <li class="next"><a
                            href="index.php?controller=produit&action=allTravels&go=next&page=<?php echo ($page+1); ?>"
                            style="width: 200px; margin-right: 40px;">Next</a></li>
                    <?php
                }
                ?>
            </ul>
            <?php
        }
        ?>

    </div>


</div>