<?php

require ('Model.php');

class modelPays extends Model
{

    static $table = "pays" ;
    static $primary = "id" ;

    private $id;
    private $code;
    private $alpha2;
    private $alpha3;
    private $nom_en_gb;
    private $nom_fr_fr;

    /**
     * modelPays constructor.
     * @param $id
     * @param $code
     * @param $alpha2
     * @param $alpha3
     * @param $nom_en_gb
     * @param $nom_fr_fr
     */
    public function __construct($id = NULL, $code = NULL, $alpha2 = NULL, $alpha3 = NULL, $nom_en_gb = NULL, $nom_fr_fr = NULL)
    {
        $this->id = $id;
        $this->code = $code;
        $this->alpha2 = $alpha2;
        $this->alpha3 = $alpha3;
        $this->nom_en_gb = $nom_en_gb;
        $this->nom_fr_fr = $nom_fr_fr;
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param null $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return null
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * @param null $alpha2
     */
    public function setAlpha2($alpha2)
    {
        $this->alpha2 = $alpha2;
    }

    /**
     * @return null
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * @param null $alpha3
     */
    public function setAlpha3($alpha3)
    {
        $this->alpha3 = $alpha3;
    }

    /**
     * @return null
     */
    public function getNomEnGb()
    {
        return $this->nom_en_gb;
    }

    /**
     * @param null $nom_en_gb
     */
    public function setNomEnGb($nom_en_gb)
    {
        $this->nom_en_gb = $nom_en_gb;
    }

    /**
     * @return null
     */
    public function getNomFrFr()
    {
        return $this->nom_fr_fr;
    }

    /**
     * @param null $nom_fr_fr
     */
    public function setNomFrFr($nom_fr_fr)
    {
        $this->nom_fr_fr = $nom_fr_fr;
    }


    public static function getAllPays(){
        return modelPays::getAll(static::$table);
    }





}