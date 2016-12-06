<?php

require_once File::build_path(array('config', 'Conf.php'));

class Model{

    static public $pdo;
    static private $hostname;
    static private $database_name;
    static private $login;
    static private $password;

    static public function Init(){
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

        try{
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo $e->getMessage(); // affiche un message d'erreur
            die();
        }
    }

    /*/////////////////////////////////////
    ///             Fonctions           ///
    /////////////////////////////////////*/

    public static function selectAll() {
        $table_name = static::$object;
        $class_name = "Model" . ucfirst($table_name);
        $table_name = $table_name . 's';

        $sql = "SELECT * FROM $table_name ;";
        $req_prep = Model::$pdo->query($sql);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab_prod = $req_prep->fetchAll(PDO::FETCH_NUM);
        return $tab_prod;
    }

    //deplacer les fonctions des classes filles ici

    public static function save($data) {
        $table_name = static::$object;
        $class_name = "Model" . ucfirst($table_name);
        $table_name = $table_name . 's';
        
        $sql = "INSERT INTO $table_name(";
        
        foreach($data as $clef => $valeur){
            $sql = $sql . $clef.",";
        }
        $sql = rtrim($sql, ',');
        $sql = $sql.") VALUES(";
        foreach($data as $clef => $valeur){
            $sql = $sql.":".$clef.",";
        }
        $sql = rtrim($sql, ',');
        $sql = $sql.");";
        
        echo $sql;
        
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute($data);
        return true;
    }
    
    public static function delete() {
        $table_name = static::$object;
        $class_name = "Model" . ucfirst($table_name);
        $table_name = $table_name . 's';
        $primary_key = static::$primary;
        $value = "bonjour";
        
        $sql = "DELETE * FROM $table_name WHERE $primarey_key == $value";
        $req_prep = Model::$pdo->query($sql);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab_prod = $req_prep->fetchAll(PDO::FETCH_NUM);
    }
    
    public static function update($data) {
        
    }
}
Model::Init();
?>
