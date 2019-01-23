 <?php include("logica-usuario.php");
verificaUsuario();

                          
?>
<?php include ("cabecalho2.php");
include './Class/conexao.php'; 

$conn = new conexao();
$sql = "SELECT nome FROM equipamento";

  $stmt = $conn->conectar()->prepare($sql);
  $stmt->execute();
$result = $stmt->fetchAll();
?>

   <?php
$host = '192.168.0.140';
$port = 80;
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
// Se conecta ao IP e Porta:
socket_connect($sock,$host, $port);
 
// Executa a ação correspondente ao botão apertado.
if(isset($_POST['bits'])) {
  $msg = $_POST['bits'];
  if(isset($_POST['Fora'])){ if($msg[0]=='1') { $msg[0]='0'; } else { $msg[0]='1'; }}
  if(isset($_POST['Quarto1'])){ if($msg[1]=='1') { $msg[1]='0'; } else { $msg[1]='1'; }}

  socket_write($sock,$msg,strlen($msg));
}
 
socket_write($sock,'R#',2); //Requisita o status do sistema.
 
// Espera e lê o status e define a cor dos botões de acordo.
$status = socket_read($sock,6);
if (($status[4]=='L')&&($status[5]=='#')) {
  if ($status[0]=='0') ;
  if ($status[1]=='0') ;

   
 


  echo "</form>";
}
// Caso ele não receba o status corretamente, avisa erro.
else { echo "Falha ao receber status da casa."; }
socket_close($sock);
?>
    
<form method ="post" action="Manual.php">
  <input type="hidden" name="bits" value="<?=$status?>">
<table class="centered">
     <h1 class="center-align">Acionar Manualmente</h1>
  <thead>
    <tr>
            <th> Equipamento </th>  
        </tr>
        </thead>

         

                                               <?php foreach ($result as $value) {?>
        <tbody>
          <tr>
            <td><?= $value['nome']?></td>
            <td> <div class="switch">
    <label>
      Desligar
      <input type="checkbox" Name ="Quarto1">
      <span class="lever"></span>
      Ligar
      
      <td><button class="btn btn-primary"  type = "Submit" Name = "Fora">Quarto2</button></td>
    </label>
  </div></td>
      </tr>
       
 <?php }?>
 <tr>
  <td>Todos Equipamentos</td>
    <td><div class="switch">
    <label>
      Desligar
      <input type="checkbox">
      <span class="lever"></span>
      Ligar
    </label>
  </div></td>
      
 
  
  
           
        </tr>
        </tbody>
     <td><button class="btn btn-primary" type = "Submit">Confirmar</button></td>                                        
                                                
        </tr>
 

</table>

<?php include("rodape.php");?>



