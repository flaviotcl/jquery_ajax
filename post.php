<?php
/**
 *  if($_REQUEST){
 *       echo json_encode(["msg"=>"Request"]); exit;
 *  }
 */


//$_GET ? var_dump($_GET): false;


if($_GET){
   // Forçando o retorno de um erro! 
   //header("HTTP/1.0 404 Not Found"); exit;
   
   // Retornando XML
   //echo "<name>{$_GET['name']}</name>";
   
   //Retornando JSON
   echo json_encode($_GET); exit;


}


//$result = $_POST ?? var_dump($_POST);
//var_dump( $result);


if($_POST){
    $_POST['name'] = $_POST['name']." DB"; 
    $_POST['email'] = $_POST['email']." DB";
    $_POST['tel'] = $_POST['tel']." DB";
    echo json_encode($_POST); exit;
}