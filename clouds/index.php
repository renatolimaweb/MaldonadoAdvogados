<?
setcookie("email_usuario","",time()-86400);
setcookie("senha_usuario","",time()-86400);

require_once('../Connections/criativo.php');
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($accesscheck)) {
  $GLOBALS['PrevUrl'] = $accesscheck;
  session_register('PrevUrl');
}
if (isset($_POST['email_usuario'])) {
  $loginUsername = anti_invasao('email_usuario');
  $password 	 = anti_invasao('senha_usuario');
  
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "inicial.php";
  $MM_redirecttoReferrer = true;
  
  mysql_select_db($database_criativo, $conexao);
  $LoginRS__query=sprintf("SELECT * FROM usuarios WHERE email_usuario='%s' AND senha_usuario='%s'",
	get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), 
	get_magic_quotes_gpc() ? $password : addslashes($password)); 
  $LoginRS = mysql_query($LoginRS__query, $conexao) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  $loginUser = mysql_fetch_assoc($LoginRS);
  if ($loginFoundUser) {
	  setcookie("email_usuario",$loginUsername,time()+86400);
	  setcookie("senha_usuario",$password,time()+86400);
	  /*
	$id_usuario = $loginUser["id_usuario"];
	$data_log = date("Y-m-d");
	$hora_log = date("H:i:s"); 
	$ip_log = $_SERVER["REMOTE_ADDR"];
	$status_log = 1;
	
	$sqlinsert = "INSERT INTO logs (id_usuario, data_log, hora_log, ip_log, status_log) VALUES ('$id_usuario', '$data_log', '$hora_log', '$ip_log', '$status_log')";
    $resultado = mysql_query($sqlinsert) or die (mysql_error());
	  */
	  header("Location: " . $MM_redirectLoginSuccess );
  } else { 
	?>
	<script language="JavaScript"> 
	<!-- 
	window.alert("Voce nao tem acesso!"); 
	location.href("index.php");
	//--> 
	</script> 
	<?  	
  }
}
?>
<script language="javascript" charset="utf-8">
function validaracesso(){
	    d = document.form1;
		erro=0;
		if (d.email_usuario.value == ""){
			alert("O login deve ser preenchido!");
			d.email_usuario.focus();
			return false;
		}

		if (d.senha_usuario.value == ""){
			alert("A senha deve ser preenchido!");
			d.senha_usuario.focus();
			return false;
		}

		return true;
}
</script>

<?
//DOCUMENTAÇÃO DO SOFTWARE "CloudS - INTERATIVO | SISTEMAS NA NUVEM"
/*
TODA E QUALQUER DISTRIBUIÇÃO OU ALTERAÇÃO DESSE MÓDULO SEM AUTORIZAÇÃO POR ESCRITO E DOCUMENTADA PODERÁ SER INTERPRETADA COMO QUEBRA DE DIREITO DE PROPRIEDADE INTELECTUAL POR DIREITO DO ANALISTA DE DESENVOLVIMENTO E PROGRAMADOR RENATO NASCIMENTO DE LIMA CEO DA INTERATIVO NEGÓCIOS.

CONTATOS PARA INFORMAÇÕES DE DISTRIBUIÇÃO +55 (69) 9239-5959 / contato@interativo.net
*/
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="iso-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RENAN MALDONADO ADVOGADOS | CLOUDS | SISTEMA GERENCIADOR DE CONTEÚDO</title>
<link rel="shortcut icon" href="img/favicon.ico">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/londinium-theme.min.css" rel="stylesheet" type="text/css">
<link href="css/styles.min.css" rel="stylesheet" type="text/css">
<link href="css/icons.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/charts/sparkline.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/switch.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/uploader/plupload.full.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/uploader/plupload.queue.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/wysihtml5/toolbar.js"></script>
<script type="text/javascript" src="js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/timepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/collapsible.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/application.js"></script>
</head>
<body style="margin-top:-30px;" class="full-width page-condensed">
<!-- Login wrapper -->
<div class="login-wrapper">
  <form id="formulario_login" role="form" name="form1" action="<?php echo $loginFormAction; ?>" method="POST" onSubmit="return validaracesso()">
    <div class="popup-header">
    <img style="margin-bottom:10px; margin-top:15px;" src="img/logo_interativo_sistema_nuvem.png" alt="" width="236" height="24"/> </div>
    <div class="well">
    <div class="thumbnail">
        <div class="thumb"><img alt="" src="img/logo_empresa.png">
        </div>
      </div>
      <div class="form-group has-feedback">
        <label>E-mail</label>
        <input name="email_usuario" type="text" class="form-control" id="email_usuario" placeholder="E-mail">
        <i class="icon-users form-control-feedback"></i></div>
      <div class="form-group has-feedback">
        <label>Senha</label>
        <input name="senha_usuario" type="password" class="form-control" id="senha_usuario" placeholder="Senha">
        <i class="icon-lock form-control-feedback"></i></div>
      <div class="row form-actions">
        <div class="col-xs-6">
          <div class="checkbox checkbox-success">
          </div>
        </div>
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary pull-right"><i class="icon-enter3"></i> Entrar</button>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- /login wrapper -->
</body>
</html>
<?php include("../Connections/end_criativo.php"); ?>