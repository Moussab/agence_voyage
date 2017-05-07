<div class="main">
    <div class="alert alert-success alert-pos">
        <strong><?php echo htmlspecialchars($error); ?></strong>
        <br>
        <p>
            Vous serez redirigé dans un instant vers l'acceuil
        </p>
        <?php
        header('Refresh: 5; url=./index.php');
        ?>
    </div>
</div>
