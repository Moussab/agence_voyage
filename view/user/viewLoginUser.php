<?php
if (isset($_GET['error']) AND $_GET['error'] == 1){
    ?>

    <div class="main">
        <div class="alert alert-danger alert-pos">
            <strong>Mot de pass erroné</strong>
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


<div class="layoutsMain">
    <h2>Connectez-vous maintenant</h2>
    <form action="index.php?controller=user&action=logged" method="post">
        <input  name="Email" placeholder="Email" value="<?php  echo (isset($_SESSION['mail']))?$_SESSION['mail']:''; ?>"  oninput="check20(this)" type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-Mail';}"/>
        <script language='javascript' type='text/javascript'>
            function check20(input) {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (!re.test(input.value)) {
                    input.setCustomValidity('l\'email doit etre de la forme : exemple@exemple.exemple.');
                } else {
                    // input is valid -- reset the error message
                    input.setCustomValidity('');
                }
            }
        </script>
        <input placeholder="PASSWORD"  required="required" pattern="[a-zA-Z0-9#_!@?^$£µ*/+=]{2,}" name="Password" type="password"/>

        <span><input type="checkbox" /> Souvenez-vous de moi</span><h6><a href="index.php?controller=user&action=recovery">Mot de passe oublier ?</a></h6>
        <div class="clear"></div>
        <input type="submit" value="Se connecter" name="login">
    </form>
    <p>Vous n'avez pas de compte ?<a href="index.php?controller=user&action=signUp"> Créer un compte</a></p>
</div>

