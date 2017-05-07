
<div class="main">
    <div class="alert alert-success alert-pos">
        <strong><?php echo htmlspecialchars($error); ?></strong>
        <br>
        <?php
        header('Refresh: 5; url=./index.php?controller=produit&action=getProduct');

        ?>
    </div>
</div>
