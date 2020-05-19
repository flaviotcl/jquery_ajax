<?php



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