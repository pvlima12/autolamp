<?php
include './Class/conexao.php'; 
class CrudSala {
    public function queryInsert($nome) {

        try {
            $con = new conexao();
            $query = $con->conectar()->prepare("SELECT * FROM sala WHERE nome=:nome");
            $query->bindParam(':nome', $nome);
            $query->execute();
            $retorno = $query->rowCount();
            if($retorno == 0){
                
            
            $stmt = $con->conectar()->prepare("INSERT INTO `sala` (`nome`) VALUES (:nome);");
            $stmt->bindParam(':nome', $nome);
            $stmt->execute();
                return 'ok';
            } else {
                return 'erro';
            
            }
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
    }

    public function querySelect() {
        try {
            
            $con = new conexao();

            $stmt = $con->conectar()->prepare("SELECT * from sala");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
        }
        
          public function querySeleciona($id){
        try{
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT * FROM `equipamento` WHERE `id` = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    

    public function queryDelete($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("DELETE FROM `equipamento` WHERE `id` = :id;");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
    }

    public function queryUpdate($id,$nome,$cod){
        try {
            $con = new conecta();

            $stmt = $con->conectar()->prepare("UPDATE `equipamento` SET  `nome` = :nome,`cod_porta` = :cod WHERE `id` = :id;");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":cod", $cod);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
          echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
    }
}
