<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Adicionando linhas dinamicamente</title>
  <style type="text/css" media="all">
  body{ font-family:Arial, Helvetica, sans-serif }
  #tudo{ border:#CCCCCC 1px solid;width:680px;margin:0 auto }
  .bd_titulo{
    text-align:center;
    background-color:#CCCCCC;
    font-weight:bold
  }
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">
  $(function () {
    function removeCampo() {
     $(".removerCampo").unbind("click");
     $(".removerCampo").bind("click", function () {
      if($("tr.linhas").length > 1){
        $(this).parent().parent().remove();
      }
    });
   }

   $(".adicionarCampo").click(function () {
     novoCampo = $("tr.linhas:first").clone();
     novoCampo.find("input").val("");
     novoCampo.insertAfter("tr.linhas:last");
     removeCampo();
   });
 });
</script>
</head>
<body>
  <form method="post" name="frm_campo_dinamico" action="">
    <div id="tudo">
      <table border="0" cellpadding="2" cellspacing="4">
        <tr><td colspan="4" class="bd_titulo">Adicionando Linhas Dinamicamente</td></tr>
        <tr><td colspan="4" align="center"><a href="http://www.linhadecomando.com" target="_blank">www.linhadecomando.com</a></td></tr>

        <tr>
          <td class="bd_titulo" width="10">Qtde</td>
          <td class="bd_titulo">Descrição</td>
          <td class="bd_titulo">Valor R$</td></tr>
          <tr class="linhas">

            <td><input type="text" name="qtd[]" style="text-align:center" /></td>
            <td><input type="text" name="descricao[]" /></td>

            <td><input type="text" name="valor[]" style="text-align:center" /></td>
            <td><a href="#" class="removerCampo" title="Remover linha"><img src="images/minus.png" border="0" /></a></td>
          </tr>
          <tr><td colspan="4">
            <a href="#" class="adicionarCampo" title="Adicionar item"><img src="images/plus.png" border="0" /></a>
          </td></tr>
          <tr>
            <td align="right" colspan="4"><input type="submit" id="btn-cadastrar" value="Cadastrar" /></td>
          </tr> 
        </table>
      </div>
    </form>
    <?php 

    if ($_POST){
     $qtd 	 = $_POST['qtd'];
     $descr 	 = $_POST['descricao'];
     $cor          = $_POST['cor'];
     $valor	 = $_POST['valor'];
     $quant_linhas = count($qtd);

   // exibindo os dados
     for ($i=0; $i<$quant_linhas; $i++) {
       echo  "Quantidade: ".$qtd[$i]."<br />";
       echo  "Descrição: ".$descr[$i]."<br />";
       echo  "Cor: ".$cor[$i]."<br />";
       echo  "Valor: ".$valor[$i]."<br />";
     }

   // para enviar por e-mail
   /* descomente aqui
   $mensagem = "";
   for ($i=0; $i<$quant_linhas; $i++) {
       $mensagem .=  "Quantidade: ".$qtd[$i]."<br />";
       $mensagem .=  "Descrição: ".$descr[$i]."<br />";
       $mensagem .=  "Cor: ".$cor[$i]."<br />";
       $mensagem .=  "Valor: ".$valor[$i]."<br />";
       $mensagem .=  "<hr>";
    }
   $destinatario = 'seu-email@seu-dominio.com.br';
   $subject	 = 'Assunto do Email';
 
   $header       = 'Content-type: text/html; charset=utf-8' . "\r\n";
   $header      .= 'From: linhadecomando.com <no-reply@linhadecomando.com>' . "\r\n";
 
   $envio = mail($destinatario, $subject, $mensagem, $header);
   if($envio){
      echo "Sua mensagem foi enviada com sucesso!";
   }else{
      echo "Ocorreu um erro ao enviar a mensagem. Tente novamente.";
   }
   */
 }
 ?>
</body>
</html>