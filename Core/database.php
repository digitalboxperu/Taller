<?php

require_once("Config.php");

class Database
{
    /*
    public static function Conectar()
    {
    	$stringConnection = 'mysql:host='.DB_SERVER.";dbname=".DB_DATABASE.";charset=".DB_CHARSET;
        $pdo = new PDO($stringConnection, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
    public static function Conectar_postgresql()
    {
    	//venintrans
    	$stringConnection = "host='localhost' port='5432' dbname='venintrans' user='postgres'  password='123' options='--client_encoding=UTF8'";
    	$dbconn=pg_connect($stringConnection);
        return $dbconn;
    }
    */

    public static function Conectar()
    {
        //$stringConnection = 'mysql:host='.DB_SERVER.";dbname=".DB_DATABASE.";charset=".DB_CHARSET;
        $stringConnection = "pgsql:host=".DB_SERVER." ; port='5432';dbname=".DB_DATABASE.";user=".DB_USERNAME.";password=".DB_PASSWORD."; options='--client_encoding=UTF8'";
        $pdo = new PDO($stringConnection);
        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
        try{
        if($pdo){
         //echo "Connected to the  database successfully!";
            }
        }catch (PDOException $e){
         // report error message
         echo $e->getMessage();
        }
        return $pdo;
    }
}