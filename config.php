<?php
try{
$user="root";
$pass=123;
$dbh = new PDO('mysql:host=172.17.0.2;dbname=blog;port:3306', $user, $pass);
$dbh->exec("set names utf8");

if($dbh!=null){

    $stmt = $dbh->prepare("UPDATE blogdata SET pen=:pen WHERE author=:author");
    $stmt->bindParam(':author',$author);
    $stmt->bindParam(':pen',$pen);

    $stmt->execute();

}
}
catch(PDOException $e){

    echo $e->getMessage();
}
?>
