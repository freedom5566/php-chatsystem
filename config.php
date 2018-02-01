<?php
try{
    $user="root";
    $pass=123;
    $dbh = new PDO('mysql:host=172.17.0.2;dbname=HelloTest;port:3306', $user, $pass);
    $dbh->exec("set names utf8");
    


}
catch(PDOException $e){

    echo $e->getMessage();
}
?>
