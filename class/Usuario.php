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

        public function __construct($login = "",$senha = ""){
            $this->setDeslogin($login);
            $this->setDessenha($senha);
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
                $this->setData($results[0]);
            }

        }

        public function login($usuario,$password){
            $banco = new Sql();
            
            $results = $banco->select("SELECT * FROM tb_usuarios WHERE deslogin = :USUARIO AND dessenha = :SENHA", array(
                ":USUARIO"=>$usuario,
                ":SENHA"=>$password
            ));

            if(count($results)>0){
                $this->setData($results[0]);
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
        
        public function setData($data){
            $this->setIdusuario($data['idusuario']);
            $this->setDeslogin($data['deslogin']);
            $this->setDessenha($data['dessenha']);
            $this->setDtcadastro($data['dtcadastro']);
        }

        public function insert(){

            $banco = new Sql();
            $results = $banco->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)",array(
                ":LOGIN"=>$this->getDeslogin(),
                ":PASSWORD"=>$this->getDessenha()
            ));

            if(count($results)>0){
                $this->setData($results[0]);
            }
        }

        public function update($login, $password){
            $banco = new Sql();

            $this->setDeslogin($login);
            $this->setDessenha($password);
            
            $banco->execQuery("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID",array(
                ":LOGIN"=>$this->getDeslogin(),
                ":PASSWORD"=>$this->getDessenha(),
                ":ID"=>$this->getIdusuario()
            ));
        }

        public function delete(){
            $banco = new Sql();
            
            $banco->execQuery("DELETE FROM tb_usuarios WHERE idusuario = :ID",array(
                ":ID"=>$this->getIdusuario()
            ));

            $this->setDeslogin(0);
            $this->setDeslogin("");
            $this->setDessenha("");
            $this->setDtcadastro("");
        }

        public function __toString(){
            return "idusuario = ".$this->getIdusuario()." deslogin = ".$this->getDeslogin()." dessenha = ".$this->getDessenha()." dtcadastro = ".$this->getDtcadastro(); 
        }
    }
?>