<?php

    class ConexaoBanco extends PDO
    {
        private static $instance = null;

        public function __construct($databaseName,$user,$password)
        {
            parent::__construct($databaseName, $user, $password);
        }

        

        public static function getInstance()
        {
            try {
                if(!isset(self::$instance)) {
                    self::$instance = new ConexaoBanco("mysql:dbname=bdtestehammer;host=localhost","root","");
                }
                return self::$instance;
            } catch(PDOException $error) {
                echo "Erro ao conectar!".$error;
            }
            }

            public function buscarCadastro()
            {
                try {
                    $statement = $this->conexao->query("select * from cadastro");
                    $array = $statement->fetchAll(PDO::FETCH_CLASS, "Cadastro");
                    return $array;
                } catch(PDOException $error) {
                    echo "Erro ao buscar!".$error;
                }
            }

            
        }
?>