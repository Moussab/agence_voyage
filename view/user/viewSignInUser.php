<?php
if (isset($_GET['error']) AND $_GET['error'] == 3){
    ?>

    <div class="main">
        <div class="alert alert-danger alert-pos">
            <strong>Numèro de téléphone incorrect</strong>
            <br>
        </div>
    </div>

    <?php
}
?>
<?php
if (isset($_GET['error']) AND $_GET['error'] == 2){
    ?>

    <div class="main">
        <div class="alert alert-danger alert-pos">
            <strong>E-mail incorrect</strong>
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
                    <form action="index.php?controller=user&action=signed" method="post" enctype="multipart/form-data">
                        <div class="icon1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="text" value="<?php  echo (isset($_SESSION['nom']))?$_SESSION['nom']:''; ?>" oninput="check0(this)" required="required" pattern="[A-Za-z]{6,20}" class="champ" placeholder="Entrer votre Nom" id="nom" name="nom" >
                            <script language='javascript' type='text/javascript'>
                                function check0(input) {
                                    var re = /[A-Za-z]{6,20}/;

                                    if (!re.test(input.value)) {
                                        input.setCustomValidity('Le nom doit être sur 6 caractères alphabitiques au minimum, 20 au max.');
                                    } else {
                                        // input is valid -- reset the error message
                                        input.setCustomValidity('');
                                    }
                                }
                            </script>
                        </div>
                        <div class="icon1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="text" class="champ" value="<?php  echo (isset($_SESSION['prenom']))?$_SESSION['prenom']:''; ?>" oninput="check1(this)" pattern="[A-Za-z0-9]{6,20}" required="required"  placeholder="Entrer votre Prenom" id="prenom" name="prenom" >
                            <script language='javascript' type='text/javascript'>
                                function check1(input) {
                                    var re = /[A-Za-z]{6,20}/;

                                    if (!re.test(input.value)) {
                                        input.setCustomValidity('Le prenom doit être sur 6 caractères alphabitiques au minimum, 20 au max.');
                                    } else {
                                        // input is valid -- reset the error message
                                        input.setCustomValidity('');
                                    }
                                }
                            </script>
                        </div>
                        <div class="icon1">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input type="email" value="<?php  echo (isset($_SESSION['mail']))?$_SESSION['mail']:''; ?>" oninput="check2(this)" class="champ" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required"  placeholder="Entrer votre e-mail" id="email" name="email"  >
                            <script language='javascript' type='text/javascript'>
                                function check2(input) {
                                    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                                    if (!re.test(input.value)) {
                                        input.setCustomValidity('l\'email doit etre de la forme : exemple@exemple.exemple.');
                                    } else {
                                        // input is valid -- reset the error message
                                        input.setCustomValidity('');
                                    }
                                }
                            </script>
                        </div>
                        <div class="icon1">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <input type="tel" value="<?php  echo (isset($_SESSION['tel']))?$_SESSION['tel']:''; ?>" class="champ" oninput="check3(this)" placeholder="Numero de téléphone" id="numTel" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" required="required" name="numTel" >
                            <script language='javascript' type='text/javascript'>
                                function check3(input) {
                                    var re = /^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$/;

                                    if (!re.test(input.value)) {
                                        input.setCustomValidity('Le numèro de téléphone doit être sur 10 chiffres.');
                                    } else {
                                        // input is valid -- reset the error message
                                        input.setCustomValidity('');
                                    }
                                }
                            </script>
                        </div>
                        <div class="icon1">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input type="password" oninput="check(this)" required="required" pattern="[a-zA-Z0-9#_!@?^$£µ*/+=]+" placeholder="Créer un mot de passe" id="pwd" class="champ" name="pwd" >
                        </div>
                        <div class="icon1">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input type="password" required="required" oninput="check(this)" pattern="[a-zA-Z0-9#_!@?^$£µ*/+=]+" placeholder="Confirmer votre mot de passe" id="pwdConf" class="champ" name="pwdConf" >
                            <script language='javascript' type='text/javascript'>
                                function check(input) {
                                    if (input.value != document.getElementById('pwd').value) {
                                        input.setCustomValidity('Le mot de passe doit correspondre au champ précédent.');
                                    } else {
                                        // input is valid -- reset the error message
                                        input.setCustomValidity('');
                                    }
                                }
                            </script>
                        </div>
                        <div class="icon1 row">
                            <div class="col-md-6">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                <input type="file" class="champ" id="picProf" name="picProf">
                                <script src="assets/js/imageShow.js"></script>
                            </div>
                            <div class="col-md-6">
                                <img class="img-responsive" id="imgProf" src="uploads/profilePicture.png" style="width: 40%; height: 30%;">
                                <br>
                            </div>
                        </div>
                        <div class="bottom">
                            <input type="submit" id="submit" value="Enregistrer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
