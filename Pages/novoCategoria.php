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
      <div >
        <a href="../index.php">Home</a>
        <a href="listarLivros.php">Livros</a>
        <a href="listarEditoras.php">Editoras</a>
        <a href="listarCategorias.php">Categoria</a>
        <a href="listarUsuarios.php">Usuarios</a>
        <a href="log.php">Historico</a>
        <a class="item" href="terminarSessao.php">Deslogar </a>
      </div>
    <center>
    <h2>Incluindo uma nova Categoria</h2>

    <?php
        $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

        if (isset($_REQUEST['nome']) && $_REQUEST['nome']!=''){
            $sql = "INSERT INTO categoria (codigo,nome,codigo_pai) VALUES (null,\"".$_REQUEST['nome']."\",null)";
            if (!$pdo->query($sql)) {
                echo "Erro ao executar a inclusão de categoria!";
                echo "<form action=\"novoCategoria.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
            } else {
              echo "Categoria cadastrada com sucesso!";
                             echo "<br>";
                             echo "<a href=\"listarCategorias.php\"> <input type=\"button\" value=\"Voltar\" > </a>";
                         }
                     } else {

                 ?>

                 <form action="novoCategoria.php" method="POST">
                     <table width="1000">
                         <tr>
                             <td width="30%">Nome:</td>
                             <td width="70%"><input type="text" name="nome" placeholder="Informe o nome da Categoria"> </td>
                         </tr>

           <tr>
               <td></td>
               <td><input type="submit" value="Confirmar">
                   <a href="listarCategorias.php"> Cancelar </a></td>
           </tr>
       </table>
     </form>

  <?php
          }
  ?>
  </center>

</body>
</html>
