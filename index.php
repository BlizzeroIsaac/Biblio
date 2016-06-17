<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css"><!-- Linkando o framework na página-->
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
    <title>Bibiblio</title>
  
</head>
<body>
<?php 
  session_start();
  if (!isset($_SESSION['login'])&& !isset($_SESSION['senha'])){
?>

<div class="content">Bibiblio</div>
<div class="content">Efetue o seu login para ter acesso a todas as funcionalidades</div>

  <form class="ui form" method="POST" action="Pages/login.php">
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="senha" placeholder="Senha">
    <input type="submit" value="Entrar"></input>
  </form>

  <?php
  }else{
  header("Location: Pages/listarLivros.php");
  $var = $_SESSION['login'];
  echo $var;;
  ?>
  <?php
  }
  ?>

</body>
</html>
