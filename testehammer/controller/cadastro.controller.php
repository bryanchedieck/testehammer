<?php
    include '../model/cadastro.class.php';
    include '../dao/cadastrodao.class.php';

    $c1 = new Cadastro();

    $c1->nome = $_POST['nome'];
    $c1->beber = $_POST['beber'];
    $c1->convidado = $_POST['convidado'];
    $c1->nomeDoConvidado = $_POST['nomeDoConvidado'];
    $c1->convidadobeber = $_POST['convidadobeber'];
    $c1->contribuir = $_POST['contribuir'];
 
    echo "<p>Dados: ".$c1->toString()."
    </p>";

    $cadastroDAO = new CadastroDAO();
    $cadastroDAO->cadastrarUsuario($c1);
    echo "<br>Usuario cadastrado com sucesso";
    

    
?>