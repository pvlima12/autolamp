<?php
include("logica-usuario.php");
verificaUsuario();
?>
<?php
include ("cabecalho2.php");
?>

        <?php
        if ($_POST) {
            if (isset($_POST['salvar'])) {
                if ((isset($_POST['cod_sala']))) {
                    include './Class/Equipamento.php';
                    require_once './Dao/CrudEquipamento.php';


                    $equipamento = new Equipamento();
                    $daoEqi = new CrudEquipamento();
// resgata variáveis do formulário
                    $equipamento->setCod_sala(isset($_POST['cod_sala']) ? $_POST['cod_sala'] : '');


                    foreach ($daoEqi->querySeleciona3($equipamento->getCod_sala()) as $value) {
                        ?>
                        <tbody>
                            <tr>
                                        <div class="center-align">		
                                            <form method="POST" action="manual_sala.php">
                                                <button class="btn btn-primary" type="submit" value="led1_ligado"  name="estadoLed"><?= $value['nome'] ?></button><br />                                  
                                            </form>
                                        </div>
                                    <?php } ?>
                            </tr>
                        </tbody>
                </table>
            </form>

            <?php
        }
    }
		$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	socket_connect($sock,"192.168.0.140", 80);
			if (isset($_POST['estadoLed'])=="led1_ligado"){
	socket_write($sock, "3");
}
			else if (isset($_POST['estadoLed'])=="led2_ligado"){
    socket_write($sock, "5");
}
socket_close($sock);    
}
?>
<?php include("Rodape.php"); ?>
