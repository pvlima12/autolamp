<?php include ("Logica-Usuario.php");?>
<?php include ("cabecalho2.php");
	
if (isset($_GET["logout"]) && $_GET["logout"]==true ) { ?>

<p class="alert-sucess"> Deslogado com sucesso!!</p>

<?php } ?>

<?php
	if(isset($_GET["login"]) && $_GET["login"]==false){ ?>
	<p class="alert-danger">Nome ou Matricula Invalida</p>
<?php } ?>
 

<?php
	 if(isset($_GET["falhaDeSeguranca"]) && $_GET["falhaDeSeguranca"]==true) { ?>
<div><span style="position:absolute; display:block;text-align: center;
  top:20%; left:45%; width:120px; height:25px;
  margin:-5px 0 0 -10px; background-color:#9F81F7;border-radius: 5px;">Efetue o login</span></div>
<?php } ?>


	<?php if(usuarioEstaLogado()) {?>
       
<h1 class="center-align">Seja bem vindo!</h1>
 <form  class="form-signin">

 </form>
	
<?php  
}else{ 
?>	


    <div class="container">
        <form action="login.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Nome</label>
        <input type="text" name="nome" id="inputEmail" class="form-control" placeholder="Nome" required autofocus>
        <label for="inputPassword" class="sr-only">Número da Matricula</label>
        <input type="text" name="num_mat" id="inputPassword" class="form-control" placeholder="Número da Matricula" required>
        <button class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
     
</form>

<?php  
}
?>

<?php include("Rodape.php"); ?>	