<?php
try{

    // Create new Database conenction
    $pdo = new PDO('mysql:host=www.djvalley.com:3306;dbname=itcapstone', 'dev', 'itcapstone');
    // Set Attributes and Encoding
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');

} catch (PDOException $ex) {

    $error = "Unable to connect to the database server<br><br>" . $ex->getMessage();

    throw $ex;

}