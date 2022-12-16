<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" type="text/css" href="estilo.css" />
      <title>

      </title>
  </head>
<body>

   <?php
       if(isset($_POST['nome']))
         { 

            include("conectar.php");

            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $data = $_POST['datta'];
            $descricao = $_POST['mensagem'];

            //Inserir dados a tabela
            $inserir=$conexao->prepare("INSERT INTO encomenda (nome_cliente,telefone,datta,desc_encomenda) VALUES (:n,:t,:dt,:dsc)");
            $inserir->bindValue(':n',$nome);
            $inserir->bindValue(':t',$telefone);
            $inserir->bindValue(':dt',$data);
            $inserir->bindValue(':dsc',$descricao);
            $inserir->execute();
            if ($inserir->rowCount()>0) {
	           echo "Dados inseridos com sucesso";
                } 
            else
                {
	                    echo "Os dados não foram inseridos";
                }

         }

   ?>

   <div id="header">     
        <h1><img src="img/the-pizza.png"/></h1>
          <div id="nome_pizzaria"><h1><img src="img/imgtitulo.jpg"/></h1></div>
          <div id="menus">
            <li><a href="index.php"><strong>Inicio</strong></a></li>
            <li><a href="index.php"><strong>Inicio</strong></a></li>
            <li><a href="index.php"><strong>Inicio</strong></a></li>
            <li><a href="index.php"><strong>Inicio</strong></a></li>
          </div>
   </div>

   <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST">
     <div id="campos">
        <div class="xp">
            <label>Nome:</label>
            <input type="text" placeholder="digite o seu nome aqui:" name="nome" id="nome"/>
        </div>
        <div class="xp">
            <label>Telefone:</label>
            <input type="tel" name="telefone" id="telefone"/>
        </div>
        <div class="xp">
            <label>Data:</label>
            <input type="date" name="datta" id="datta"/>
        </div>
    </div>
       <div id="txtarea">
           <div id="label1"><label>Escreva o seu pedido:</label></div>
           <textarea name="mensagem" id="mensagem"> </textarea>
       </div>
       <div id="btn-cad">
          <button value="cadastrar">Enviar</button>
       </div>

   </form>
 
   <div id="footer">
       <ul>
          <li><strong><div id="tipoLetra">Menus</div></strong></li>
          <li><strong><div id="tipoLetra">Sobre nos</div></strong></li>
          <li><strong><div id="tipoLetra">Contactos</div></strong></li>
          <li><strong><div id="tipoLetra">Redes sociais</div></strong></li>
       </ul>

       <div id="pp">
          <ul>
              <li>Inicio</li>
              <li>Login</li>
              <li>Ver menu</li>
              <li>Localizacao</li>
          </ul>
       </div>

       <div id="ppp">
         <p>Somos uma pizzaria que não <br/> 
          mede esforços para agradar os nossos<br/>
          Clientes. Estamos em Angola desde <br/>
          2021 para trazer um atendimento <br/> 
          aos nossos clientes com qualidade.</p>
       </div>

       <div id="contactospp">
          <p><strong>Email:</strong> Leandrodossantos.lc5@gmail.com<br/>
             <strong>Telefone:</strong> 942583628</p>
       </div>

       <div id="redeSocialpp">
          <ul>
             <li><img src="img/facebook.png" width="36px" height="30px"/></li>
             <li><img src="img/twitter.png" width="36px" height="30px" /></li>
          </ul>
       </div>

       <footer>
        <div class="coluna">
           <span><bold><strong>COPYRIGHT &copy; 2021 - PIZZARIA CLAV</strong></bold></span>
        </div>
       </footer>

    </div>
</body>
</html>