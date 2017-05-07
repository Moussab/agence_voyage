<?php

require ('Model.php');
class modelPhoto extends Model
{
    static $table = "photo" ;
    static $primary = "id" ;


    private $id;
    private $urlPhoto;
    private $id_voyage;

    /**
     * modelPhoto constructor.
     * @param $id
     * @param $urlPhoto
     * @param $id_voyage
     */
    public function __construct($id, $urlPhoto, $id_voyage)
    {
        $this->id = $id;
        $this->urlPhoto = $urlPhoto;
        $this->id_voyage = $id_voyage;
    }

    /**
     * @return string
     */
    public static function getTable()
    {
        return self::$table;
    }

    /**
     * @param string $table
     */
    public static function setTable($table)
    {
        self::$table = $table;
    }

    /**
     * @return string
     */
    public static function getPrimary()
    {
        return self::$primary;
    }

    /**
     * @param string $primary
     */
    public static function setPrimary($primary)
    {
        self::$primary = $primary;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUrlPhoto()
    {
        return $this->urlPhoto;
    }

    /**
     * @param mixed $urlPhoto
     */
    public function setUrlPhoto($urlPhoto)
    {
        $this->urlPhoto = $urlPhoto;
    }

    /**
     * @return mixed
     */
    public function getIdVoyage()
    {
        return $this->id_voyage;
    }

    /**
     * @param mixed $id_voyage
     */
    public function setIdVoyage($id_voyage)
    {
        $this->id_voyage = $id_voyage;
    }


    public static function getAllPhotos(){
        return modelPhoto::getAll(static::$table);
    }

    public static function updatePhoto($champs,$values){
        return modelPhoto::update(static::$table,$champs,$values);
    }

    public static function insertPhoto($champs,$values){
        return modelPhoto::insert(static::$table,$champs,$values);
    }

    public static function existPhoto($champ,$value){
        return modelPhoto::exist(static::$table,$champ,$value);
    }


    public static function deletePhoto($champs,$values){
        return modelPhoto::delete(static::$table,$champs,$values);
    }


    public static function selectPhoto($champ,$value){
        return modelPhoto::select(static::$table,$champ,$value);
    }



}