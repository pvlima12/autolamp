<?php
include("Logica-Usuario.php");
verificaUsuario();
?>
<?php
include ("cabecalho2.php");
include './class/Usuario_Prof.php';
        include './DAO/CrudProf.php';

            $objdao = new CrudProf();
            $prof = new Usuario_Prof();
        
                    if ($_POST) {
    if (isset($_POST['excluir'])){
        if ((isset($_POST['excluir_id']))) {
// resgata variáveis do formulário
            $prof->setId(isset($_POST['excluir_id']) ? $_POST['excluir_id'] : '');

                       $resultado = $objdao->queryDelete($prof->getId());
            
                if ($resultado == true) { ?>
    <div><span style="position:absolute; display:block;text-align: center;
               top:20%; left:45%; width:150px; height:25px;
               margin:-5px 0 0 -10px; background-color:#9F81F7;border-radius: 5px;">Professor Removido.</span></div>
    
<?php }else{
    ?>
    <div><span style="position:absolute; display:block;text-align: center;
               top:20%; left:45%; width:150px; height:25px;
               margin:-5px 0 0 -10px; background-color:#9F81F7;border-radius: 5px;">Professor Não Removido.</span></div>
<?php }
        }
    }
  
}
     if ($_POST) {
    if (isset($_POST['alterar'])){
        if ((isset($_POST['alterar_id']))) {
        if ((isset($_POST['alterar_id'])) && (isset($_POST['nome'])) 
                && (isset($_POST['estado']))&& (isset($_POST['num_mat']))) {
// resgata variáveis do formulário
            $prof->setId(isset($_POST['alterar_id']) ? $_POST['alterar_id'] : '');
            $prof->setNome(isset($_POST['nome']) ? $_POST['nome'] : '');
            $prof->setEstado(isset($_POST['estado']) ? $_POST['estado'] : '');
            $prof->setNum_mat(isset($_POST['num_mat']) ? $_POST['num_mat'] : '');

            $resultado = $objdao->queryUpdate($prof->getId(), $prof->getNome(), $prof->getEstado() ,$prof->getNum_mat());
           if ($resultado == "ok") { 
            ?>
    <div><span style="position:absolute; display:block;text-align: center;
               top:20%; left:45%; width:150px; height:25px;
               margin:-5px 0 0 -10px; background-color:#9F81F7;border-radius: 5px;">Professor Alterado.</span></div>
               
    
<?php }else{
    ?>
    <div><span style="position:absolute; display:block;text-align: center;
               top:20%; left:45%; width:150px; height:25px;
               margin:-5px 0 0 -10px; background-color:#9F81F7;border-radius: 5px;">Professor Não Alterado.</span></div>
<?php }
        }
    }
    }
  
}                 
?>
<h1 class="center-align">Listar Professor</h1> 
<table >
    <thead>
        <tr>
            <th> Nome </th>
            <th> Número de Matricula</th>     
        </tr>
    </thead>
<?php foreach ($objdao->querySelect() as $value) { ?>
        <tbody>
            <tr>
                <td><?= $value['nome'] ?></td>
                <td><?= $value['num_mat'] ?></td>


                <td>
                                         
                    <form class="form_editar" action="EditarProfessor.php" method="post" style="float: left; margin: 0 15px;">
                                <input name="editar_id" type="hidden" value="<?= $value['id'] ?>"/>
                                <button class="btn tooltipped btn-floating btn-large waves-effect waves-light blue" 
                                        name="editar" type="submit" data-position="bottom" data-tooltip="Editar"><i class="material-icons">create</i></button>
                       </form>
                    
                    
                    <form class="form_excluir" action="ListaUsuario.php" method="post" style="float: left; margin: 0 15px">
                                <input name="excluir_id" type="hidden" value="<?= $value['id'] ?>"/>
                                <button class="btn tooltipped btn-floating btn-large waves-effect waves-light red" 
                                        name="excluir" type="submit" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete</i></button>
                       </form>
                  
                </td>

            </tr>
        </tbody>
<?php } ?>
</table>

    <?php include("rodape.php"); ?>