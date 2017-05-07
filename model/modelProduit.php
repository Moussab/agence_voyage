<?php

require ('model.php');

class modelProduit extends Model
{

    static $table = "voyage" ;
    static $primary = "id" ;


    private $id;
    private $titre;
    private $prix;
    private $desc;
    private $pays;

    /**
     * ModelProduit constructor.
     * @param $id
     * @param $titre
     * @param $prix
     * @param $desc
     * @param $pays
     */
    public function __construct($id=NULL, $titre=NULL, $prix=NULL, $desc=NULL, $pays=NULL)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->prix = $prix;
        $this->desc = $desc;
        $this->pays = $pays;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param null $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return null
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param null $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return null
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param null $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    /**
     * @return null
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param null $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }



    public static function getAllProduit(){
        return modelProduit::getAll(static::$table);
    }

    public static function insertProduit($champs,$values){
        return modelProduit::insert(static::$table,$champs,$values);
    }

    public static function deleteProduit($champs,$values){
        return modelProduit::delete(static::$table,$champs,$values);
    }

    public static function updateProduit($champs,$values){
        return modelProduit::update(static::$table,$champs,$values);
    }

    public static function selectProduit($champ,$value){
        return modelProduit::select(static::$table,$champ,$value);
    }








}