<?php

$path = "{$ROOT}{$DS}model{$DS}";
require ("{$path}modelProduit.php");
class modelRecherche
{

    /**
     * @param $param
     * @return array
     * fonction which return all model, brand and category when
     * the name is like $param
     */
    public static function search($param,$param2){
        $produit = static::searchProduit($param,$param2);
        $res = array();
        if(!empty($produit)){
            $res = $produit;//array("produits"=>$produit);
        }

        return $res;
    }

    /**
     * @param $param
     * @return mixed
     * fonction intermediaire
     * qui regarde s'il existe un produit
     */
    private static function searchProduit($param,$param2){
        $sql = 'SELECT *
                FROM voyage
                 WHERE titre like :param OR  pays LIKE :param2';
        try{
            $req_prep = Model::$pdo->prepare($sql);
        }catch (PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }

        $req_prep->execute(array('param'=>'%'.$param.'%','param2'=>'%'.$param2.'%'));
        return $req_prep->fetchAll();
    }



}