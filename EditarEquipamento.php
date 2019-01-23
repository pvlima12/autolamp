<?php
include ("cabecalho2.php");
 

if ($_POST) {
    if (isset($_POST['editar'])){
        if ((isset($_POST['editar_id']))) {
            
            include './Class/Equipamento.php';
            require_once './Dao/CrudEquipamento.php';
            $equipamento = new Equipamento();
            $daoEqi = new CrudEquipamento();
            
            $equipamento->setId($_POST['editar_id']);


foreach ($daoEqi->querySeleciona($equipamento->getId()) as $value) {
    ?>

    <h1 class="center-align">Editar Equipamento</h1>

    <div class="row">
        <form class="col s12" action="ListaEquipamento.php" method="post">
            <input name="alterar_id" type="hidden" value="<?= $value['id'] ?>"/>
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" name="nome" class="validate" required autofocus value="<?= $value['nome'] ?>">
                    <label for="first_name">Nome</label>
           </div>
                </div>
             <div class="row">
            <div class="input-field col s6">
                <select class="icons" name = "cod_porta" required autofocus>

                    <?php
  
                    $sal=$value['cod_porta'];
                    foreach ($daoEqi->querySeleciona2($sal) as $valor) {
                        ?>

                        <option value="<?= $valor['porta_id'] ?>"  class="left"><?= $valor['nome_porta'] ?></option>


                    <?php } 
                     include './Class/Porta.php';
            require_once './Dao/CrudPorta.php';
                    $porta = new Porta();
                    $daoporta = new CrudPorta();
                    $resul = $daoporta->querySelect2();

                    if ($resul == 'erro') {
                        ?>
                        <option value="" disabled selected>Sem Porta Disponivel</option> 

                    <?php
                    } else {
                  
                        foreach ($daoporta->querySelect2() as $val) {
                            ?>
                            <option value="<?= $val['id'] ?>"  class="left"><?= $val['nome'] ?></option>


                        <?php }
                    }
                    ?>
                    </select>
                  </div>
</div>
                <div class="row">
            <div class="input-field col s6">
                <select class="icons" name = "cod_sala" required autofocus>
                    
                <?php
                     foreach ($daoporta->querySelect3() as $var) {
                            ?>
                            <option value="<?= $var['id'] ?>"  class="left"><?= $var['nome'] ?></option>


                        <?php }
                    
                    ?>
                </select>
                <input class="btn btn-primary" type="submit" value="Alterar" name="alterar">
            </div>
        </form>
    </div>
</div>
<?php } 
 }
    }
}
    
 include("Rodape.php"); ?>
