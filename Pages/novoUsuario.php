<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css"><!-- Linkando o framework na página-->
        <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
        <title>Bibiblio</title>
    </head>
    <body>
    <center>
       <h1>Bibiblio</h1>
       <div>    
      <div>
        <a href="../index.php">Home</a>
        <a href="listarLivros.php">Livros</a>
        <a href="listarEditoras.php">Editoras</a>
        <a href="listarCategorias.php">Categoria</a>
        <a href="listarUsuarios.php">Usuarios</a>
        <a href="log.php">Historico</a>
        <a class="item" href="terminarSessao.php">Deslogar </a>
      </div>
	  <center>
          <h2>Incluindo um novo Usuario</h2>
    <?php
        $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

        if (isset($_REQUEST['nome']) && $_REQUEST['nome']!=''
                        && isset($_REQUEST['login']) && $_REQUEST['login']!=''
                        && isset($_REQUEST['senha']) && $_REQUEST['senha']!=''
                        && isset($_REQUEST['email']) && $_REQUEST['email']!=''){
            $sql = "INSERT INTO usuario (codigo,nome,login,senha,email) VALUES (null,\"".$_REQUEST['nome'].
                            "\",\"".$_REQUEST['login'].
                            "\",\"".$_REQUEST['senha'].
                            "\",\"".$_REQUEST['email']."\")";
            if (!$pdo->query($sql)) {
                echo "Erro ao executar o cadastro do usuario!";
                echo "<form action=\"novoUsuario.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
            } else {
              echo "Usuario cadastrado com sucesso!";
                             echo "<br>";
                             echo "<a href=\"listarUsuarios.php\"> <input type=\"button\" value=\"Voltar\" > </a>";
                         }
                     } else {

                 ?>

                 <form action="novoUsuario.php" method="POST">
                     <table width="1000">
                         <tr>
                             <td width="30%">Nome:</td>
                             <td width="70%"><input type="text" name="nome" placeholder="Informe o nome do Usuario"> </td>
                           </tr>
                           <tr>
                             <td width=30%>Login:</td>
                             <td width="70%"><input type="text" name="login" placeholder="Informe o login"> </td>
                           </tr>
                           <tr>
                             <td width="30%">Email:</td>
                             <td width="70%"><input type="email" name="email" placeholder="Informe o email"> </td
                           </tr>
                           <tr>
                                 <td width="30%">Senha:</td>
                                 <td width="70%"><input type="password" name="senha" placeholder="Informe a senha"><td>
                           </tr>


           <tr>
               <td></td>
               <td><input type="submit" value="Confirmar">
                   <a href="listarUsuarios.php"> Cancelar </a></td>
           </tr>
       </table>
     </form>

  <?php
          }
  ?>
  </center>

</body>
</html>
