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
                    <option value="" disabled selected>Porta</option> 

                    <?php
                    include './Class/Porta.php';
                    include './Dao/CrudPorta.php';

                    $porta = new Porta();
                    $daoporta = new CrudPorta();
                    
                    foreach ($daoporta->querySelect() as $value) {
                        ?>

                        <option value="<?= $value['id'] ?>"  class="left"><?= $value['nome'] ?></option>


                    <?php } ?>
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
