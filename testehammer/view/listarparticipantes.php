<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../css/style2.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
include "../model/cadastro.class.php";
include "../dao/cadastrodao.class.php";

$cadastroDAO = new CadastroDAO;
$cadastros = $cadastroDAO->buscarCadastros();
if (count($cadastros) == 0) {
  echo "<h1>Não há cadastros!</h1>";
  echo "</body>";
  echo "</html>";
  die();
}

?>

<?php
if (isset($_POST['filtrar'])) {
  include_once "../dao/cadastrodao.class.php";
  $pesquisa = $_POST['pesquisa'];
  $filtro = $_POST['filtro'];

  $cadastroDAO = new CadastroDAO;
  $cadastros = $cadastroDAO->filtrarCadastros($filtro, $pesquisa);
  if (count($cadastros) == 0) {
    echo "<h2> Sua pesquisa não retornou nenhum cadastro!</h2>";
    echo "</body>";
    echo "</html>";
    die();
  }
}

?>
<table class="content-table">
<thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Vai beber</th>
          <th scope="col">Levou convidado</th>
          <th scope="col">Nome do convidado</th>
          <th scope="col">O convidado vai beber</th>
          <th scope="col">Total a contribuir</th>      
          <th scope="col">Cancelar participação</th>      
          <th scope="col">Cancelar convidado</th>      
        </tr>
      </thead>

      <?php
      foreach ($cadastros as $cadastro) :
        ?>
        <tr>
          <td><?= $cadastro->idcadastro ?></td>
          <td><?= $cadastro->nome ?></td>
          <td><?= $cadastro->beber ?></td>
          <td><?= $cadastro->convidado ?></td>
          <td><?= $cadastro->nomedoconvidado ?></td>
          <td><?= $cadastro->convidadobeber ?></td>
          <td><?= $cadastro->calcularTotal() ?></td>
         <td><a class="vermelho" href='listarparticipantes.php?id=<?= $cadastro->idcadastro ?> 'class="button">Cancelar participação</a></></td>
          <td><a  href='listarparticipantes.php?id=<?= $cadastro->nomedoconvidado ?>' class="button">Cancelar convidado</td>
        </tr>
        <?php endforeach; ?>
      </table>

      <div class="tabela">
  <table class="table">
    <form name="pesquisa" method="post" action="">
      <div class="row">
        <div class="form-group col-md-6">
          <input type="text" name="pesquisa" class="form-control" placeholder="Digite sua pesquisa">
        </div>
      <div class="form-group col-md-6">
        <select name="filtro" class="form-control">
          <option value="todos">Todos</option>
          <option value="codigo">ID</option>
          <option value="nome">Nome</option>
          <option value="nomeDoConvidado">Nome do convidado</option>
          <option value="calcularTotal">Total a contribuir</option>
        </select>
      </div>
      </div>
      <div class="form-group">
        <input type="submit" name="filtrar" value="Filtrar" class="button">
        <a class="vermelho" href="../index.html">Voltar</a>
      </div>
    </form>
  </table>
</div>
      <?php
         if (isset($_GET['id'])) {
          $cadastro = new CadastroDAO;
          $cadastroDAO->deletarCadastro($_GET['id']);
       
        }

      ?>
        

</body>
</html>