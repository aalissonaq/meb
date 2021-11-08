<?php

session_start();
require_once './data/dbasys.php';
require_once './data/outfunc.php';
//restrito

$login['usuario'] = strip_tags(trim(tiraMascara($_POST['usuario'])));
$login['senha'] = strip_tags(trim(md5($_POST['senha'])));

$lerPessoa = ler("pessoa", "", "WHERE docPessoa = '{$login['usuario']}'");
if ($lerPessoa->rowCount() != 0) {
  $listaPessoa = $lerPessoa->fetchAll(PDO::FETCH_ASSOC);
  foreach ($listaPessoa as $dadosP) {

    $_SESSION['ID'] = $dadosP['idPessoa'];
    $_SESSION['USUARIO'] = $dadosP['nmPessoa'];
    $_SESSION['CPFCNPJ'] = $dadosP['docPessoa'];
    $_SESSION['FOTO'] = $dadosP['foto'];

    $lerUser = ler("users", '', "WHERE idPessoa = '{$dadosP['idPessoa']}'
          AND passUser ='{$login['senha']}' AND flStatusUser = '1' ");
    $contaUser = $lerUser->rowCount();
    $very = $lerUser->fetchAll(PDO::FETCH_ASSOC);
    if ($contaUser == 1) {
      foreach ($very as $dadosUser) {
        $_SESSION['ID'] = $dadosUser['id'];
        $_SESSION['STATUS'] = $dadosUser['flStatusUser'];
        $_SESSION['NIVEL'] = $dadosUser['nivelUser'];

        $log['tipyActionLog'] = 'Entrar';
        $log['userActionLog'] = $_SESSION['USUARIO'];
        $log['actionLog'] = "o Usuario {$_SESSION['USUARIO']}, acessou o Sistema";

        inseir('logs', $log);

        header("Location: inicio.php");
      }
    } else {
      header("Location: login.php");
    }
  }
}
