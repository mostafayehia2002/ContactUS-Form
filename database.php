<?php
try {
    $host = 'localhost';
    $dbname = 'data';
    $user = 'teefa';
    $password = '2002';
    // $host = 'sql305.eb2a.com';
    // $dbname = 'eb2a_33990728_contactus';
    // $user = 'eb2a_33990728';
    // $password = 'teefa2252002';
    $con = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$password); 
} catch (PDOException $e) {
    echo  $e->getMessage();
}
?>