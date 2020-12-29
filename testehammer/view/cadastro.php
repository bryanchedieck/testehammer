<!DOCTYPE html>
<html lang="pt-br">

<head>
<title>Document</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style1.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#convidado').hide();
            $('#convidado1').hide();
        });

    


    </script>


</head>

<body>
    <nav>

    </nav>
    <header>
        <div class="title">
            <h1>Participe do Churrasco</h1>
            <h2><span>Cadastre-se para o churrascão da Hammer</span></h2>
        </div>
        <div class="item">
            <span>
                <h3>Endereço</h3>
            </span>
            <p>Rua Caracas, 46</p>
            <p>Bairro Jardim Lindóia</p>
            <p>Porto Alegre/RS - Brasil</p>
            <p>CEP: 91050-150</p>
            <span>
                <h3>Contatos</h3>
            </span>
            <p>Telefone: (51) 3516-0636</p>
            <p>E-mail: contato@hammerconsult.com.br</p>
        </div>

        <form action="../controller/cadastro.controller.php" method="post">
            <div class="campo">
                <label for="nome"><strong>Nome</strong></label>
                <input type="text" name="nome" id="nome">
            </div>

            <div class="campo">
                <label><strong>Você vai beber?</strong></label>
                <label><input type="radio" name="beber" value="sim">Sim</label>
                <label><input type="radio" name="beber" value="nao" >Não</label>
            </div>

            <div class="campo">
                <label><strong>Levará convidado?</strong></label>
                <label><input onclick="$('#convidado,#convidado1').show();" type="radio" name="convidado" value="sim">Sim</label>
                <label><input onclick="$('#convidado,#convidado1').hide();" type="radio" name="convidado" value="nao">Não</label>
            </div>
            <div id="convidado">
                <label for="nomeconvidado"><strong>Nome do Convidado</strong></label>
                <input type="text" name="nomeDoConvidado" id="nomeDoConvidado">

            </div>
            <div id="convidado1">
                <label><strong>O convidado vai beber?</strong></label>
                <label><input type="radio" name="convidadobeber" value="sim">Sim</label>
                <label><input type="radio" name="convidadobeber" value="nao" checked>Não</label>
            </div>
            <div class="campo">
                <label><strong>Contribua com o valor</strong></label>
                <label><input type="radio" name="contribuir" value=0>Sim</label>
            </div>
            <button class="botao" type="submit">Concluído</button>
            <a class="voltar" href="../index.html">Voltar</a>
        </form>
        <div class="texto">
            <fieldset id="oi">
                <p><strong>Lembrando que terá que contribuir com 20$ e se quiser levar um convidado 40$. Se você não beber o valor do churrasco será metade, a mesma regra é válida para o convidado.</strong></p>
            </fieldset>
        </div>
    </header>
    
</body>

</html>