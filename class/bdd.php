<?php

class bdd{

    protected $connexion = "";
    private $query="";
    private $result=[];
    private $search="";


public function connect()
    {
        $connect = mysqli_connect('localhost', 'root', '','autocompletion');
        if($connect == false)
        {
            return false;
        }
        $this->connexion = $connect;
    }


    public function close(){
        mysqli_close($this->connexion);
    }


    public function execute($query)
    { 
        {
            $this->query=$query;
            $execute=mysqli_query($this->connexion, $query);

            // Si le résultat est un booléen 
            if(is_bool($execute))
            {
                $this->result=$execute;
            }
            // Si le résultat est un tableau
            else
            {
                $this->result=mysqli_fetch_all($execute);
            }

            return $this->result;
        }
    }

//Fonctions sur la BDD

    public function var_bdd(){
        //Création de la variable "oiseaux" qui contient tous les noms
        $this->connect();
        $this->execute("SET NAMES UTF8");
        $result=$this->execute("SELECT id,nom from oiseaux");
        $oiseaux=[];
        foreach($result as list($id,$nom))
        {
            array_push($oiseaux,$nom);
        }
        return $oiseaux;
    }

    public function search($str){
        $this->connect();
        $this->execute("SET NAMES UTF8");
        $str=addslashes($str);
        $result=$this->execute("SELECT id,nom from oiseaux WHERE nom LIKE '%$str%' GROUP BY id ORDER BY id DESC");
        $this->search=$str;
        return $result;
    }

    public function infos($id){
        $this->connect();
        $this->execute("SET NAMES UTF8");
        $result=$this->execute("SELECT * from oiseaux WHERE id=$id");
        return $result;
    }

    public function getSearch()
    {
        return $this->search;
    }
}


