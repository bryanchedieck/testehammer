<?php
    require '../persistence/conexaobanco.class.php';

    class CadastroDAO
    {
        private $conexao = null;

        public function __construct()
        {
            $this->conexao = ConexaoBanco::getInstance();
        }

        public function __destruct()
        {
            
        }

        public function cadastrarUsuario($cadastro)
        {
            try {
                $statement = $this->conexao->prepare("insert into cadastro(idcadastro,nome,beber,convidado,nomedoconvidado,convidadobeber,contribuir,calcularTotal)values(null,?,?,?,?,?,?,?)");
                $statement->bindValue(1, $cadastro->nome);
                $statement->bindValue(2, $cadastro->beber);
                $statement->bindValue(3, $cadastro->convidado);
                $statement->bindValue(4, $cadastro->nomeDoConvidado);
                $statement->bindValue(5, $cadastro->convidadobeber);
                $statement->bindValue(6, $cadastro->contribuir);
                $statement->bindValue(7, $cadastro->calcularTotal());
                $statement->execute();

            } catch(PDOException $error) {
                echo "Erro ao cadastrar!".$error;
            }
            }

            public function buscarCadastros()
            {
                try {
                    $statement = $this->conexao->query("select * from cadastro");
                    $array = $statement->fetchAll(PDO::FETCH_CLASS, "Cadastro");
                    return $array;
                } catch(PDOException $error) {
                    echo "Erro ao buscar!".$error;
                }
            }

            public function deletarCadastro($idCadastro)
            {
                try {
                    $statement = $this->conexao->prepare("delete from cadastro where idcadastro = ?");
                    $statement->bindValue(1, $idCadastro);
                    $statement->execute();
                } catch(PDOException $error) {
                    echo "Erro ao cancelar cadastro!".$error;
                }
            }

                public function deletarConvidado($nomeDoConviado)
                {
                    try {
                        $statement = $this->conexao->prepare("delete from cadastro where nomedoconvidado = ?");
                        $statement->bindValue(1, $nomeDoConviado);
                        $statement->execute();
                    } catch(PDOException $error) {
                        echo "Erro ao cancelar cadastro!".$error;
                    }
                }

                public function filtrarCadastros($filtro, $pesquisa)
                {
                    try {
                        $query = "";
                        switch($filtro) {
                            case "codigo": $query = "where idCadastro = ".$pesquisa;
                            break;
                            case "nome": $query = "where nome like '%{$pesquisa}%'";
                            break;
                            case "nomeDoConvidado": $query = "where nomeDoConvidado like '%{$pesquisa}'";
                            break;
                            case "calcularTotal": $query = "where calcularTotal like '%{$pesquisa}'";
                            break;
                            case "todos": $query = "";
                            break;
                            case "default": $query = "";
                            break;
                        }
                        $statement = $this->conexao->query("select *from cadastro {$query}");
                        $array = $statement->fetchAll(PDO::FETCH_CLASS, "Cadastro");
                        return $array;
                        }catch(PDOException $error) {
                            echo "Erro ao filtrar cadastro!".$error;
                        }
                    }
                }
                    
            
