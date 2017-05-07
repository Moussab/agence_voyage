<?php

require ('Model.php');
class modelReservation extends Model
{
    static $table = "reservation" ;
    static $primary = "id" ;

    private $id;
    private $id_user;
    private $id_voyage;
    private $date_depart;
    private $pade_retour;
    private $nb_personnes;

    /**
     * modelReservation constructor.
     * @param $id
     * @param $id_user
     * @param $id_voyage
     * @param $date_depart
     * @param $pade_retour
     * @param $nb_personnes
     */
    public function __construct($id, $id_user, $id_voyage, $date_depart, $pade_retour, $nb_personnes)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->id_voyage = $id_voyage;
        $this->date_depart = $date_depart;
        $this->pade_retour = $pade_retour;
        $this->nb_personnes = $nb_personnes;
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
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
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

    /**
     * @return mixed
     */
    public function getDateDepart()
    {
        return $this->date_depart;
    }

    /**
     * @param mixed $date_depart
     */
    public function setDateDepart($date_depart)
    {
        $this->date_depart = $date_depart;
    }

    /**
     * @return mixed
     */
    public function getPadeRetour()
    {
        return $this->pade_retour;
    }

    /**
     * @param mixed $pade_retour
     */
    public function setPadeRetour($pade_retour)
    {
        $this->pade_retour = $pade_retour;
    }

    /**
     * @return mixed
     */
    public function getNbPersonnes()
    {
        return $this->nb_personnes;
    }

    /**
     * @param mixed $nb_personnes
     */
    public function setNbPersonnes($nb_personnes)
    {
        $this->nb_personnes = $nb_personnes;
    }


    static function insertReservation($champs,$values){
        return modelReservation::insert(static::$table,$champs,$values);
    }

    public static function existReservation($champ,$value){
        return modelReservation::exist(static::$table,$champ,$value);
    }

    static function deleteReservation($para){
        return modelReservation::delete($para);
    }

    static function updateReservation($tab, $old){
        return modelReservation::update($tab,$old);
    }

    public static function selectReservation($champ,$value){
        return modelReservation::select(static::$table,$champ,$value);
    }


}