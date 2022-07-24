<?php
    class Usuario {

        private $idusuario;
        private $deslogin;
        private $dessenha;
        private $dtcadastro;

        public function getIdusuario(){
            return $this->idusuario;
        }

        public function setIdusuario($idusuario){
            $this->idusuario = $idusuario;
        }

        public function getDeslogin(){
            return $this->deslogin;
        }
        public function setDeslogin($deslogin){
            $this->deslogin = $deslogin;
        }

        public function getDessenha(){
            return $this->dessenha;
        }

        public function setDessenha($dessenha){
            $this->dessenha = $dessenha;
        }

        public function getDtcadastro(){
            return $this->dtcadastro;
        }

        public function setDtcadastro($dtcadastro){
            $this->dtcadastro = $dtcadastro;
        }






        public static function todosUsuarios(){
            $banco = new Sql();

            return $results = $banco->select("SELECT * FROM tb_usuarios");
        }

        public function loadById($id){
            $banco = new Sql();
            
            $results = $banco->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
                ":ID"=>$id
            ));

            if(count($results)>0){
                $row = $results[0];
                $this->setIdusuario($row['idusuario']);
                $this->setDeslogin($row['deslogin']);
                $this->setDessenha($row['dessenha']);
                $this->setDtcadastro($row['dtcadastro']);
            }

        }

        public function login($usuario,$password){
            $banco = new Sql();
            
            $results = $banco->select("SELECT * FROM tb_usuarios WHERE deslogin = :USUARIO AND dessenha = :SENHA", array(
                ":USUARIO"=>$usuario,
                ":SENHA"=>$password
            ));

            if(count($results)>0){
                $row = $results[0];
                $this->setIdusuario($row['idusuario']);
                $this->setDeslogin($row['deslogin']);
                $this->setDessenha($row['dessenha']);
                $this->setDtcadastro($row['dtcadastro']);
            }else{
                throw new Exception("Login e/ou senha errados");
                
            }

        }

        public static function search($usuario){
            $banco = new Sql();
            
            $usuariopesq = "%".$usuario."%";
            return $results = $banco->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :USUARIO", array(
                ":USUARIO"=>$usuariopesq,
            ));

        }
        
        
        public function __toString(){
            return "idusuario = ".$this->getIdusuario()." deslogin = ".$this->getDeslogin()." dessenha = ".$this->getDessenha()." dtcadastro = ".$this->getDtcadastro(); 
        }
    }
?>