<?php
session_start();



global $conn;

$database="dbexcel";

try {
    $conn = new PDO('mysql:host = localhost:8080; dbname='. $database, 'root', '');
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    print "ERROR: ".$e -> getMessage()."<br/>";
    die();
}

//function encode($type, $string){

//         $ciphering = "BF-CBC";
//         $iv_length = openssl_cipher_iv_length($ciphering);
//         $options = 0;
//         $encryption_iv = '1234567891011121';
//         $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE);
//         $ans = "hello";
//
//         if ($type == 'e'){
//             $ans = openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);
//         }elseif ($type == 'd'){
//             $ans = openssl_decrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);
//         }
//         return $ans;
//    if($type == 'e') {
//        $ciphering = "AES-128-CTR";
//        $options = 0;
//        $encryption_iv = '1234567891011121';
//        $encryption_key = "GeeksforGeeks";
//        return openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);
//    }
//    if($type == 'd') {
//        $ciphering = "AES-128-CTR";
//        $options = 0;
//        $decryption_iv = '1234567891011121';
//        $decryption_key = "GeeksforGeeks";
//        return openssl_decrypt ($string, $ciphering, $decryption_key, $options, $decryption_iv);
//    }
//}
//CREATE TABLE `dbfaculty`.`tbldetails` (`id` INT(11) NOT NULL AUTO_INCREMENT , `firstname` VARCHAR(200) NULL , `lastname` VARCHAR(200) NULL , `email` VARCHAR(500) NULL , `password` VARCHAR(20) NULL , `gender` VARCHAR(10) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
?>