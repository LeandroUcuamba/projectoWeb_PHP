<?php
    require_once 'classe-encomenda.php';
    $p = new Encomenda("pizzaria","localhost","root","")
?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" type="text/css" href="estilo.css" />
      <link rel="stylesheet" type="text/css" href="cadastroadmin.css" />
      <title>

      </title>
  </head>
<body>
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


   <?php
       if(isset($_GET['id_up']))
        {
              $id_update = addslashes($_GET['id_up']);
              $res = $p->buscarDadosEncomenda($id_update);
        }

   ?>


   <form action="" method="POST">
     <div id="campos">
        <div class="xp">
            <label>Nome:</label>
            <input type="text" placeholder="digite o seu nome aqui:" name="nome" id="nome"  
            value="<?php if(isset($res)){ echo $res["nome_cliente"]; } ?>" />
        </div>
        <div class="xp">
            <label>Telefone:</label>
            <input type="tel" name="telefone" id="telefone" 
            value="<?php if(isset($res)){ echo $res['telefone']; } ?>"  />
        </div>
        <div class="xp">
            <label>Data:</label>
            <input type="date" name="datta" id="datta"
            value="<?php if(isset($res)){ echo $res['datta']; } ?>"  />
        </div>
    </div>
       <div id="txtarea">
           <div id="label1"><label>Escreva o seu pedido:</label></div>
           <textarea name="mensagem" id="mensagem" 
           value="<?php if(isset($res)){ echo $res['desc_encomenda']; } ?>"  > </textarea>
       </div>
       <div id="btn-cad">
          <input type="submit" value="<?php if(isset($res)){ echo "Actualizar"; } else{ echo "Cadastrar"; } ?>">
       </div>
   </form>


    <div class="rrrr">
     <table>
          <tr id="titulo">
             <td>Cliente</td>
             <td>Telefone</td>
             <td>Data</td>
             <td colspan="2">Encomenda</td>
          </tr>


       <?php
          $dados = $p->buscarDados();
          if(count($dados) > 0 )
          {
              for($i = 0; $i < count($dados); $i++)
              {
                  echo "<tr>";
                  foreach($dados[$i] as $k => $v)
                  {
                      if($k != "num_encomenda")
                      {
                         echo "<td>".$v."</td>";
                      }
                  }
        ?>  <td><a href="">Excluir</a>
        <a href="cadastroadmin.php?id_up=<?php echo $dados[$i]['num_encomenda']; ?>" >Editar</a></td> <?php
                  echo "</tr>";
               }

          }
                                                                   ?>
             
       </table>
   </div>
 


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
         <p>Somos uma pizzaria que n??o <br/> 
          mede esfor??os para agradar os nossos<br/>
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