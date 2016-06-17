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
        <?php
            if (isset($_GET['codigo']) && $_GET['codigo']!='' ) {
                $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");
                $rowsAffect = $pdo->exec("DELETE FROM usuario WHERE codigo=".$_GET['codigo'].";");
                if ($rowsAffect > 0) {
                    echo "Registro Excluído com sucesso!";
                    echo "<br>";
                    echo '<a href="listarUsuarios.php"><input type="button" value="Voltar"></a>';
                } else {
                    echo "Registro não encontrado!";
                    echo "<br>";
                    echo '<a href="listarUsuarios.php"><input type="button" value="Voltar"></a>';
                }
            } else {
        ?>
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
        <table width="1000">
            <tr>
                <td>
                <center>
                    <a href="novoUsuario.php">Incluir novo Usuario</a>
                </center>
            </td>
          </tr>
          <tr>
              <td>
                  <?php
                  $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");
                  $stmt = $pdo->prepare("SELECT * FROM usuario");
                  $stmt->execute();

                  echo "<center>";
                  echo "<h2>Usuario Disponíveis</h2>";
                  echo "<table width=\"1000\" cellpading=10 border=1>";
                  echo "<tr>";
                  echo "<th width=\"25%\">Nome</th>";
                  echo "<th width=\"25%\">Email</th>";
                  echo "<th width=\"3%\">Editar</th>";
                  echo "<th width=\"3%\">Excluir</th>";
                  echo "</tr>";
                  while ($linha = $stmt->fetch()) {
                                          echo "<tr>";
                                          echo "<td>" . $linha[1] . "</td>";
                                          echo "<td>" . $linha[4] . "</td>";
                                          echo "<td>" . "" . "</td>";
                                          echo "<td>" . '<a href="listarUsuarios.php?codigo='.$linha[0].'"> Excluir </a>' . "</td>";
                                          echo "</tr>";
                                      }
                                      echo "</table>";
                                      echo "</center>";

                                      unset($dados);
                                      }
                                      ?>
                                  </td>
                              </tr>
                          </table>
                      </center>
                  </body>
                  </html>
