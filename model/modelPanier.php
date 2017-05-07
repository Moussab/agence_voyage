<?php


class modelPanier
{

    static function createBasket(){ // creation du panier
     /*   if(!isset($_SESSION['panier'])){ // si le panier n'exsite pas on le creer
            $_SESSION['panier']=array();
            $_SESSION['panier']['id']= array();
            $_SESSION['panier']['titre']= array();
            $_SESSION['panier']['pays']= array();
            $_SESSION['panier']['prix']= array();
            $_SESSION['panier']['nbr']= array();

        }*/
        return true;
    }
/*
    static function addProd ($prod, $qteProd){
        $id = $prod['id'];
        $prix = $prod['prix'];
        $titre = $prod['titre'];
        $pays = $prod['pays'];
        $nbr = $prod['nbr'];
        if(self::createBasket()){
            //Si le produit existe déjà on ajoute seulement la quantité
            $index = array_search($id,  $_SESSION['panier']['id']);


            if ($index !== false)
            {
                $_SESSION['panier']['nbr'][$index] += $qteProd ; // on incremente juste le nombre
            }else{ // on ajoute l'article
                array_push($_SESSION['panier']['id'],$id);
                array_push($_SESSION['panier']['titre'],$titre);
                array_push($_SESSION['panier']['prix'],$prix);
                array_push($_SESSION['panier']['nbr'],$qteProd);
                array_push($_SESSION['panier']['pays'],$pays);
            }
        }

    }

    static function delProd ($prod)
    { // supprimer un Article du panier
        $id = $prod['id'];

        //Si le shoppingCart existe
        if (self::createBasket()) {
            //creation shoppingCart temporaire
            $tmp = array();
            $tmp['idProd'] = array();
            $tmp['nomProd'] = array();
            $tmp['nbProd'] = array();
            $tmp['prodPrice'] = array();

            for ($i = 0; $i < count($_SESSION['panier']['idProd']); $i++) {
                if ($_SESSION['panier']['idProd'][$i] != $id) {
                    // si l'article n'est pas celui que l'on veut supprmier
                    // on l'ajoute au panier temporaire
                    array_push($tmp['idProd'], $_SESSION['panier']['idProd'][$i]);
                    array_push($tmp['nomProd'], $_SESSION['panier']['nomProd'][$i]);
                    array_push($tmp['nbProd'], $_SESSION['panier']['nbProd'][$i]);
                    array_push($tmp['prodPrice'], $_SESSION['panier']['prodPrice'][$i]);
                }else {
                    if($_SESSION['panier']['nbProd'][$i] >1){
                        array_push($tmp['idProd'], $_SESSION['panier']['idProd'][$i]);
                        array_push($tmp['nomProd'], $_SESSION['panier']['nomProd'][$i]);
                        array_push($tmp['nbProd'], $_SESSION['panier']['nbProd'][$i]-1);
                        array_push($tmp['prodPrice'], $_SESSION['panier']['prodPrice'][$i]);
                    }
                }


            }
            //On remplace le shoppingCart en session par notre shoppingCart temporaire à jour
            $_SESSION['panier'] = $tmp;
            // on supprime le panier temporaire
            unset($tmp);
        } else
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }


    public static function getTotalProd(){
        $cpt = 0;
        for ($i = 0 ; $i < count($_SESSION['panier']['idProd']) ; $i++){
            $cpt += $_SESSION['panier']['nbProd'][$i];
        }

        return $cpt;
    }


    public static function getTotalPrix(){
        $total=0;
        $i=0;
        while( $i<count($_SESSION['panier']['idProd'])){
            $price=$_SESSION['panier']['prodPrice'][$i][0];
            $total += $_SESSION['panier']['nbProd'][$i]*$price;
            $i++;
        }
        return $total;
    }*/


}