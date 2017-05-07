<br>

<?php
    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
    if (isset($_SESSION['userAdmin'])){
        $user = $_SESSION['userAdmin'];
    }


    $SQL="SELECT * FROM voyage WHERE id = $id_prod";
    //echo $SQL ;
    try{
        $req_prep = Model::$pdo->query($SQL);
        $voyage = $req_prep->fetchAll();
    } catch(PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage(); // affiche un message d'erreur
        } else {
            echo 'Une erreur est survenue <a href="www.google.com"> retour a la page d\'accueil </a>';
        }
        die();
    }
?>
<div class="bg-agile">
    <div class="book-reservation">
        <form action="index.php?controller=reservation&action=addReservation" method="post">
            <input  hidden value="<?php  echo $id_prod; ?>" id="id" name="id" >
            <div class="form-date-w3-agileits">
                <label><i class="fa fa-user" aria-hidden="true"></i> Non :</label>
                <input type="text" name="name" value="<?php echo $user['nom'].' '.$user['prenom']; ?>" placeholder="Votre Nom" required=""/>
            </div>

            <div class="form-date-w3-agileits">
                <label><i class="fa fa-envelope" aria-hidden="true"></i> Email :</label>
                <input type="email" name="email" id="cassos" value="<?php echo $user['mail']; ?>" placeholder="Votre Email" required="" />
            </div>
            <div class="form-date-w3-agileits">
                <label><i class="fa fa-calendar" aria-hidden="true"></i> Date Arrivée :</label>
                <input  id="datepicker1" name="arive" type="date" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
            </div>
            <div class="form-date-w3-agileits">
                <label><i class="fa fa-calendar" aria-hidden="true"></i> Date Dépare :</label>
                <input  id="datepicker2" name="depart" type="date" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
            </div>
            <div class="form-left-agileits-w3layouts bottom-w3ls">
                <label><i class="fa fa-home" aria-hidden="true"></i> Destionation :</label>
                <input type="text" name="destioantion" value="<?php echo $voyage[0]['titre']; ?>" placeholder="Votre destionation" required=""/>
            </div>
            <div class="form-left-agileits-w3layouts">
                <label><i  class="fa fa-users" aria-hidden="true"></i> Nombre De personnes :</label>
                <select name="nb_personnes" class="form-control">
                    <option value="personnes">personnes</option>
                    <option value="1 Personne">1 Personne</option>
                    <option value="2 Personnes">2 Personnes</option>
                    <option value="3 Personnes">3 Personnes</option>
                    <option value="4 Personnes">4 Personnes</option>
                    <option value="5 Personnes">5 Personnes</option>
                    <option value="Plus">Plus</option>
                </select>
            </div>
            <div class="clear"> </div>
            <div class="make">
                <input type="submit" value="Reserver">
            </div>
        </form>
    </div>
</div>



