<?php

include './Class/conecta.php';

class CrudDisciplina {

    public function queryInsert($id,$nome,$carga_horaria,$sala_id,$professor_id) {

        try {

            $con = new conexao();
  
            $query = $con->conectar()->prepare("SELECT * FROM disciplina WHERE nome=:nome and"
                    . "id=:id");
            $query->bindParam(':nome', $nome);
            $query->bindParam(':id', $id);
            $query->execute();
            $retorno = $query->rowCount();
            if ($retorno == 0) {

                $stmt = $con->conectar()->prepare("INSERT INTO `disciplina` (`id`,`nome`,`carga_horaria`, `sala_id`,`professor_id`) VALUES (:id,:nome,:carga_horaria,:sala_id,:professor_id);");
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':carga_horaria', $carga_horaria);
                $stmt->bindParam(':sala_id', $sala_id);
                $stmt->bindParam(':professor_id', $professor_id);
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
  public function querySelect3() {
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
    public function querySelect() {
        try {

            $con = new conecta();

            $stmt = $con->conectar()->prepare("SELECT e.id,e.nome as nome_equi,p.nome as nome_porta ,s.nome as nome_sala from equipamento e ,porta p, sala s where e.cod_porta=p.id and e.cod_equipamento=s.id");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
    }

    public function querySeleciona($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT * FROM `equipamento` WHERE `id` = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function querySeleciona2($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT p.nome as nome_porta,p.id as porta_id from "
                    . "equipamento e ,porta p, sala s where e.cod_porta=p.id and e.cod_equipamento=s.id and e.cod_porta = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
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

    public function queryUpdate($id, $nome, $cod) {
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
