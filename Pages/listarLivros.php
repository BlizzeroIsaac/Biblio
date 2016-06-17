<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css"><!-- Linkando o framework na página-->
        <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
        <title>Bibiblio</title>
        
    </head>

    <body>

        <?php
            if (isset($_GET['codigo']) && $_GET['codigo']!='' ) {
                $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");
                $rowsAffect = $pdo->exec("DELETE FROM livros WHERE codigo=".$_GET['codigo'].";");
                if ($rowsAffect > 0) {
                    echo "Registro Excluído com sucesso!";
                    echo "<br>";
                    echo '<a href="listarLivros.php"><input type="button" value="Voltar"></a>';
                } else {
                    echo "Registro não encontrado!";
                    echo "<br>";
                    echo '<a href="listarLivros.php"><input type="button" value="Voltar"></a>';
                }
            } else {
        ?>
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
        <table width="1000">
            <tr>
                <td>
                <center>
                    <a href="novoLivro.php">Incluir novo livro</a>
                </center>
            </td>
          </tr>
          <tr>
              <td>
                  <?php
                  $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");
                  $stmt = $pdo->prepare("SELECT * FROM grade_livros");
                  $stmt->execute();

                  echo "<center>";
                  echo "<h2>Livros Disponíveis</h2>";
                  echo "<table width=\"1000\" cellpading=10 border=1>";
                  echo "<tr>";
                  echo "<th width=\"25%\">Título</th>";
                  echo "<th width=\"25%\">Autores</th>";
                  echo "<th width=\"15%\">Editora</th>";
                  echo "<th width=\"15%\">Categoria</th>";
                  echo "<th width=\"7%\">Editar</th>";
                  echo "<th width=\"7%\">Excluir</th>";
                  echo "</tr>";
                  while ($linha = $stmt->fetch()) {
                                          echo "<tr>";
                                          echo "<td>" . $linha[1] . "</td>";
                                          echo "<td>" . $linha[2] . "</td>";
                                          echo "<td>" . $linha[3] . "</td>";
                                          echo "<td>" . $linha[4] . "</td>";
                                          echo "<td>" . '<a href="editarLivro.php?codigo='.$linha[0].'&editora='.$linha[3].'&categoria='.$linha[4].'"> Editar </a>' . "</td>";
                                          echo "<td>" . '<a href="listarLivros.php?codigo='.$linha[0].'"> Excluir </a>' . "</td>";
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
                    </div>
                  </div>
                  </body>
                  </html>
