<?php

//----------------------------CONEXAO-DB----------------------------

try{
    $pdo = new PDO("mysql:dbname=pizzaria;host=localhost","root","");

}

catch(PDOException $e){
    echo "erro com a conexão:".$e->getMessage();
}

catch(Exception $e){
    echo "erro generico:".$e->getMessage();
}

//------------------------------INSERT-------------------------------

/*

$res = $pdo->prepare("INSERT INTO encomenda(nome_cliente, telefone, datta, desc_encomenda) VALUES (:n, :t, :dt, :dsc) ");
$res->bindValue(":n","Leandro");
$res->bindValue(":t","942583628");
$res->bindValue(":dt","12/06/1999");
$res->bindValue(":dsc","Quero uma pizza");
$res->execute();

*/


//------------------------DELETE&UPDATE-------------------------------

/*
        -------Delete-------

$cmd = $pdo->prepare("DELETE FROM encomenda WHERE num_encomenda = :ids");
$num_encomenda = 6;
$cmd->bindValue(":ids",$num_encomenda);
$cmd->execute();

*/

/*
        -------UPDATE------

$cmd = $pdo->prepare("UPDATE encomenda SET nome_cliente = :e WHERE num_encomenda = :id");
$cmd->bindValue(":e","Vanilson");
$cmd->bindValue(":id",7);
$cmd->execute();

*/


//---------------------------SELECT--------------------------------

$cmd = $pdo->prepare("SELECT * FROM encomenda WHERE num_encomenda = :id");
$cmd->bindValue(":id",9);
$cmd->execute();
$resultado = $cmd->fetch(PDO::FETCH_ASSOC); //para incurta a info no array

foreach($resultado as $key => $value)
{
   echo $key.":  ".$value."<br>";
}


?>

