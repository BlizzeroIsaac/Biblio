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
       <h1>Biblio</h1>
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
			<h1>Historico</h1>
    <?php
        $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

            $sql = "SELECT * FROM historico;";
              if (!$pdo->query($sql)) {
                echo "Erro ao executar a inclusão de livros!";
                echo "<form action=\"novoLivro.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
              } else {
                echo "<table border='3px' width='100%'>";
                echo "<tr><th>Data</th><th>Tabela</th><th>Antes</th><th>Depois</th></tr>";
                $stmt_historico = $pdo->query($sql);
                        if (count($stmt_historico)) {
                           foreach ($stmt_historico as $historico) {
                             echo "<tr>";
                             echo "<td>";
                                    echo "$historico[data]";
                            echo "</td>";
                             echo "<td>";
                                    echo "$historico[tabela]";
                            echo "</td>";
                            echo "<td>";
                                    echo "$historico[antes]";
                            echo "</td>";
                            echo "<td>";
                                   echo "$historico[depois]";
                           echo "</td>";

                             echo "</tr>";
                           }
                         }
                       }
                echo "</table>";
              ?>
  </center>

</div>
</div>

</body>
</html>
