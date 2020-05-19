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
   //echo json_encode($_GET); exit;
    $data = listAll();
    echo json_encode($data); exit;
}

//$result = $_POST ?? var_dump($_POST);
//var_dump( $result);


if($_POST){
  /*  $_POST['name'] = $_POST['name']." DB"; 
    $_POST['email'] = $_POST['email']." DB";
    $_POST['tel'] = $_POST['tel']." DB";
  */ 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    if($name == ""){
        echo json_encode(["status"=>false, "msg"=>"Preencha o nome !"]); exit;
    }
    if($email == ""){
        echo json_encode(["status"=>false, "msg"=>"Preencha o email !"]); exit;
    }
    if($tel == ""){
        echo json_encode(["status"=>false, "msg"=>"Preencha o telefone !"]); exit;
    }
    $id = save($_POST);

    if($id){
        echo json_encode(["status"=>true, "msg"=>"Sucess ! ID: {$id}"]); exit;
    }else{
        echo json_encode(["status"=>false, "msg"=>"Error !"]); exit;
    }
    
}

function conn(){
    $conn = new \PDO("mysql:host=localhost;dbname=ajax_jquery","root","123456");
    return $conn;
}

function save($data){
    $db =  conn();
    $query = "INSERT INTO `contacts` (`name`,`email`,`tel`) VALUES (:name,:email,:tel)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':name',$data['name']);
    $stmt->bindValue(':email',$data['email']);
    $stmt->bindValue(':tel',$data['tel']);
    $stmt->execute();
    return $db->lastInsertId();

}

function listAll(){
    $db = conn();
    $query ="Select * from `contacts`";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}