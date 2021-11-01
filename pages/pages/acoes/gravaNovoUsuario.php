<?php

require_once './../../../data/dbasys.php';
require_once './../../../data/outfunc.php';

if (isset($_POST['gravar']) && $_POST['gravar'] == 'gravar') {

    $dados['nmPessoa'] = strip_tags(strip_tags(trim(strtoupper($_POST['nmPessoa']))));
    $dados['docPessoa'] = strip_tags(strip_tags(trim(strtoupper(tiraMascara($_POST['docPessoa'])))));

    $dados['dtNascPessoa'] = strip_tags(strip_tags(trim(strtoupper($_POST['dtNascPessoa']))));
    $dados['stCepPessoa'] = strip_tags(strip_tags(trim(strtoupper($_POST['stCepPessoa']))));
    $dados['stLogradouroPessoa'] = strip_tags(strip_tags(trim(strtoupper($_POST['stLogradouroPessoa']))));
    $dados['nnCasaPessoa'] = strip_tags(strip_tags(trim(strtoupper($_POST['nnCasaPessoa']))));
    $dados['stCompleEndPessoa'] = strip_tags(strip_tags(trim(strtoupper($_POST['stCompleEndPessoa']))));
    $dados['stBairroPessoa'] = strip_tags(strip_tags(trim(strtoupper($_POST['stBairroPessoa']))));
    $dados['stEstadoPessoa'] = strip_tags(strip_tags(trim(strtoupper($_POST['stEstadoPessoa']))));
    $dados['nnTelefonePessoa'] = strip_tags(strip_tags(trim(strtoupper($_POST['nnTelefonePessoa']))));
    $dados['nnWhatsappPessoa'] = strip_tags(strip_tags(trim(strtoupper($_POST['nnWhatsappPessoa']))));
    $dados['stEmailPessoa'] = strip_tags(strip_tags(trim($_POST['stEmailPessoa'])));
    $dados['txtObsContatosPessoas'] = strip_tags(strip_tags(trim(strtoupper($_POST['txtObsContatosPessoas']))));

    $lendo = ler("pessoa", '', "WHERE nmPessoa = '{$dados['nmPessoa']}' OR docPessoa = '{$dados['docPessoa']}' ");
    $verifica = $lendo->rowCount();
    if ($verifica >= 1) {

        echo "<script type='text/javascript'>
          alert('O Usuário {$dados['nmPessoa']} já possui cadastro !');
          window.location = '?page=novosuario';
        </script>";

        //echo "<div class=\"alert alert-danger text-uppercase\" role=\"alert\">O Usuário {$dados['nmPessoa']} já possui cadastro !</div>";
    } else {
        $inserido = inseir('pessoa', $dados);

        if ($inserido) {
            $lendo = ler("pessoa", '', "WHERE nmPessoa = '{$dados['nmPessoa']}' OR docPessoa = '{$dados['docPessoa']}' ");
            $dadosPessoa = $lendo->fetchAll(PDO::FETCH_ASSOC);
            #dados para tebela usuário
            foreach ($dadosPessoa as $dado) {

                $usuario['idPessoa'] = $dado['idPessoa'];
                // $p1 = explode(".", $_POST['nnCpfPessoa']);
                // $p2 = explode("-", $_POST['nnCpfPessoa']);
                $usuario['passUser'] = strip_tags(strip_tags(trim(md5($_POST['passUser']))));
                $usuario['nivelUser'] = strip_tags(strip_tags(trim(strtoupper($_POST['nivelUser']))));
                $usuario['flStatusUser'] = strip_tags(strip_tags(trim(strtoupper($_POST['flStatusUser']))));
                //$usuario['nivelUser'] = 3;
                //$usuario['flStatusUser'] = 1;
                inseir('users', $usuario);

                $log['actionLogs'] = 'Cadastro';
                $log['descriptionActionLog'] = "Cadastro de novo usuario {$dados['nmPessoa']}";
                $log['nameUserActionLogs'] = strip_tags(strip_tags(trim(strtoupper($_POST['nameUserActionLogs']))));

                inseir('logs', $log);
            }
        }

        echo "<script type='text/javascript'>
          alert('O Usuário {$dados['nmPessoa']} foi Cadastrado com sucesso !');
          window.location = '../../../inicio.php?page=listarusuarios';
        </script>";
        //echo "<div class=\"alert alert-success text-uppercase\" role=\"alert\">O paciente {$dados['nmPessoa']} foi Cadastrado com sucesso !</div>";
    }
}
//}