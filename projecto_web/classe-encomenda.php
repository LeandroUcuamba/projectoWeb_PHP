<?php

  class Encomenda
  {

    // CONEXAO COM BASE DE DADOS
      private $pdo;
    
      public function __construct($dbname, $host, $user, $senha)
      {
          try
           {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
           }
          catch(PDOException $e)
          {
              echo "erro com o banco de dados: ".$e->getMessage();
          }
          catch(Exception $e)
          {
            echo "erro generico: ".$e->getMessage();
          }


      } 

     // FUNCAO PARA BUSCAR DADOS;
       public function buscarDados()
       {
           $res = array();
           $cmd = $this->pdo->query("SELECT * FROM encomenda ORDER BY datta");
           $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
           return $res;
       }


      /* //CADASTRAR ENCOMENDA
      public function cadastrarEncomenda($nome, $telefone, $data, $descricao)
      {
          //Antes de cadastrar verificar se já tem o numero-telefone;
          $cmd = $this->pdo->prepare("SELECT num_encomenda FROM encomenda WHERE telefone = :e");
          $cmd->bindValue(":e",$telefone);
          $cmd->execute();

          if($cmd->rowCount() > 0) // telefone ja existe na BD
          {
              return false;
          }
          else // nao foi encontrado
          {
            $cmd = $this->pdo->prepare("INSERT INTO encomenda (nome_cliente, telefone, datta, desc_encomenda) VALUES (:n, :t, :dt, :dsc)");
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":t",$telefone);
            $cmd->bindValue(":dt",$data);
            $cmd->bindValue(":dsc",$descricao);
            $cmd->execute();
            return true;
          
          }

      }

      */


      public function buscarDadosEncomenda($num_encomenda)
      {
          $res = array();
          $cmd = $this->pdo->prepare("SELECT * FROM encomenda WHERE num_encomenda = :id");

          $cmd->bindValue(":id",$num_encomenda);
          $cmd->execute();

          $res = $cmd->fetch(PDO::FETCH_ASSOC);
          return $res;


      }

      
  }
  
?>