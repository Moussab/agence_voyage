<?php

require ('Model.php');


class modelUser  extends Model{


    static $table = "user" ;
    static $primary = "id" ;

    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $numTel;
    private $password;
    private $imgUrl;


    public function __construct($id=NULL, $nom=NULL, $prenom=NULL,
                                $mail=NULL, $numTel=NULL, $password=NULL, $imgUrl=NULL){

        if(!is_null($id)&&!is_null($nom)&&!is_null($prenom)&&!is_null($mail)&&!is_null($numTel)
            &&!is_null($password)&&!is_null($imgUrl) ){
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mail = $mail;
            $this->numTel = $numTel;
            $this->password = $password;
            $this->imgUrl = $imgUrl;
        }

    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return null
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return null
     */
    public function getPrenom()
    {
        return $this->prenom;
    }


    /**
     * @return null
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @return null
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * @return null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return null
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    public static function getAllUsers(){
        return modelUser::getAll(static::$table);
    }

    public static function updateUser($champs,$values){
        return modelUser::update(static::$table,$champs,$values);
    }

    public static function insertUser($champs,$values){
        return modelUser::insert(static::$table,$champs,$values);
    }

    public static function existUser($champ,$value){
        return modelUser::exist(static::$table,$champ,$value);
    }


    public static function deleteUser($champs,$values){
        return modelUser::delete(static::$table,$champs,$values);
    }


    public static function selectUser($champ,$value){
        return modelUser::select(static::$table,$champ,$value);
    }



}