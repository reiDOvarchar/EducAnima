<?php

include_once "../model/vo/cadastroVO.class.php";

class cadastroDAO {
    public function __construct(){
        // parent::__construct();
    }

    public function insert($conn, $obj) {
        $senha = password_hash($obj->getSenha(), PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuario(email, data_nasc, senha, adm, eh_professor, ensino, nome, formacao) VALUES ('{$obj->getEmail()}', '{$obj->getDataNasc()}', '{$senha}', 0, {$obj->getEhProfessor()}, '{$obj->getEnsino()}', '{$obj->getNome()}', '{$obj->getFormacao()}')";
        
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao inserir!");
        }
    }

    public function delete($conn, $id) {
        $sql = `DELETE FROM cadastro WHERE` . $id;
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao deletar!");
        }
    }

    public function update($conn, $obj) {
        $sql = "UPDATE usuario 
                SET nome = {$obj->getNome()}, 
                email = {$obj->getEmail()}, 
                data_nasc = {$obj->getDataNasc()}, 
                senha = {$obj->getSenha()}, 
                adm = {$obj->getAdm()}, 
                eh_professor ={$obj->getEhProfeessor()}, 
                ensino = {$obj->getEnsino()}, 
                formacao = {$obj->getFormacao()}  
                WHERE id = {$obj->getId()}";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    public function login($email, $senha, $mysql){                                                                     
        $sql_code = "SELECT * FROM usuario WHERE email = '$email'";
        $sql_exec = $mysql->query($sql_code) or die ($mysql->error);
        
        $usuario = $sql_exec->fetch_assoc();
        
        return $usuario;
    }

    public function taLogado($email, $mysql){
        $sql = "SELECT id, nome, email, adm FROM usuario WHERE email = '$email'";

        $result = $mysql->query($sql);
        $arr = [];
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        
        return $arr;
    }
}
?>