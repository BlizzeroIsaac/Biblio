<?php

	$login = $_POST['login'];//pega login
	$senha = $_POST['senha'];//pega Senha
	$pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");//abre meu Banquinho
	$nao = $pdo -> query('SELECT * from usuario'); //nao é uma instancia do banco
	if (count($nao)){//percorrendo banquinho até o fim
		foreach($nao as $sim){
			if($sim['login']==$login){//se o login pego no form é igual ao salvo no Banquinho
				if ($sim['senha']==$senha){//se a Senha pego no form é igual à salva no Banquinho
					session_start();
					$_SESSION['login']=$login;
					$_SESSION['senha']=$senha;
					$var = $_SESSION['login'];
					echo $var;

				}
			}
		}
	}
	header("Location: ../index.php");//Redirecionando

?>