<?php
    Class Usuario
    {
        private $pdo;

        public $msgErro = "";

        public function conectar($nome, $host, $usuario, $senha)
        {
            global $pdo;

            try
            {
                $pdo = new PDO("mysql:dbname=".$nome, $usuario, $senha);
            }
            catch (PDOException $erro)
            {
                $msgErro = $erro->getMessage();
            }
        }
        public function cadastrar($nome, $telefone, $email, $senha)
        {
            global $pdo;

            //verificar se o email já está cadastrado
            $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :m");//:m signifca um apelido na variável email do php
            $sql->bindValue(":m",$email);
            $sql->execute();

            //verificar se existe email cadastrado
            if($sql->rowCount()>0)
            {
                return false;
            }
            else
            {
                //cadastrar usuário
                $sql = $pdo->prepare("INSERT INTO usuario (nome, telefone, email, senha) VALUES(:n,:t,:e,:s)");
                $sql->bindValue(":n",$nome);
                $sql->bindValue(":t",$telefone);
                $sql->bindValue(":e",$email);
                $sql->bindValue(":s",md5($senha));
                $sql->execute();
                return true;
            }

        }

        public function logar($email, $senha)
        {
            global $pdo;

            $verificarEmail = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e AND senha = :s");
            $verificarEmail->bindValue(":e", $email);
            $verificarEmail->bindValue(":s", md5($senha));
            $verificarEmail->execute();

            if($verificarEmail->rowCount()>0)
            {
                //Autorizado logar no sistema, pois email e senha existem no banco de dados.
                $dados = $verificarEmail->fetch();
                session_start();
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                return true;
            }
            else
            {
                return false;
            }
        }

        public function listarUsuarios()
        {
            global $pdo;

            $sql = $pdo->prepare("SELECT * FROM usuario");
            $sql->execute();

            if($sql->rowCount()>0)
            {
                $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $dados;
            }
            else
            {
                return false;
            }

        }

        public function excluirUsuario($id)
        {
            global $pdo;
            $sql = $pdo->prepare("DELETE FROM usuario WHERE id_usuario = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            
        }
        public function getUsuario($id)
        {
            global $pdo;
            $sql = $pdo->prepare("SELECT nome,email,telefone FROM usuario WHERE id_usuario = :id");
            $sql->bindValue(":id",$id);
            $sql->execute();
            
            if($sql->rowCount()>0)
            {
                $dados = $sql->fetch();
                return $dados;
            }
            else
            {
                return false;
            }
        }
        public function editarUsuario($id, $nome, $email, $telefone)
        {
            global $pdo;
            $sql = $pdo->prepare("UPDATE usuario SET nome = :n, email = :e, telefone = :t WHERE id_usuario = :id");
            $sql->bindValue(":id", $id);
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":t", $telefone);
            return $sql->execute();
        }
        

    }

?>