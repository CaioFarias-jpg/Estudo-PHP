<?php
    Class Usuario
    {
        private $pdo;

        public $msgErro = "";

        public function conectar($nome_banco, $host, $usuario, $senha)
        {
            global $pdo;

            try{
                $pdo = new PDO("mysql:dbname=".$nome_banco,$usuario,$senha);
            }
            catch(PDOException $erro) {
                $msgErro = $erro->getMessage();
            }
        }
        public function cadastrarUsuario($nome, $email, $telefone, $senha)
        {
            global $pdo;
    
            $usuario = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e");
            $usuario->bindValue(":e", $email);
            $usuario->execute();
            if($usuario->rowCount() >0){
                return false;
            }
            else{
                $usuario = $pdo->prepare("INSERT INTO usuario (nome, email, telefone, senha) VALUES(:m, :e, :t, :s)");
                $usuario->bindValue(":m", $nome);
                $usuario->bindValue(":t", $telefone);
                $usuario->bindValue(":e", $email);
                $usuario->bindValue(":s", $senha);
                $usuario->execute();
                return true;
            }
        }
    }
    ?>