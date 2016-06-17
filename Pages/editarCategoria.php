<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css"><!-- Linkando o framework na página-->
     <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
    <title>Bibiblio</title>    
  </head>
  <body>
   
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
     
    </div>
    <center>
    <h1>Bibiblio</h1>
    <h2>Editando uma Categoria</h2>

        <?php
        $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

        if (isset($_REQUEST['nome']) && $_REQUEST['nome']!=''
                                     && isset($_REQUEST['categoria']) && $_REQUEST['categoria']!=''){

          $sql = "UPDATE categoria SET nome=\"".$_REQUEST['nome']."\"  WHERE codigo=".$_REQUEST['categoria'].";";

            if (!$pdo->query($sql)) {
                echo "Erro ao executar a edição de categoria!";
                echo "<form action=\"listarCategorias.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
            } else {
              echo "Categoria editada com sucesso!";
                             echo "<br>";
                             echo "<a href=\"listarCategorias.php\"> <input type=\"button\" value=\"Voltar\" > </a>";
                         }
                     } else {
                       $stmt_categoria = $pdo->query("SELECT codigo, nome FROM categoria");
                       $stmt_editora = $pdo->query("SELECT codigo, nome FROM editora");
        ?>
        <table width="1000">
            <tr>
                <td>
                <center>
                

                </center>

                <form action="editarCategoria.php" method="POST">




                    <table width="1000">
                      <tr>
                        <td width="30%">Nome a sera editado:</td>
                          <td width="70%">
                            <select name="categoria">
                            <?php
                                if (count($stmt_categoria)) {
                                    foreach ($stmt_categoria as $categoria) {
                            ?>
                            <option value="<?php echo $categoria['codigo']?>"><?php echo $categoria['nome']?></option>
                              <?php
                               }
                            }
                            ?>
                            </select>
                          </td>
                      </tr>
                        <tr>
                            <td width="30%">Nome:</td>
                            <td width="70%"><input type="text" name="nome" placeholder="Informe o nome da Categoria"> </td>
                        </tr>

          <tr>
              <td></td>
              <td><input id="a" type="submit"  value="Confirmar">
                  <a href="listarCategorias.php"> Cancelar </a></td>
          </tr>
          </table>
          </form>
                      </center>
<?php
}
 ?>

 </select>
  </body>
</html>
