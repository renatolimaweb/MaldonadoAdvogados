<?
//DOCUMENTAÇÃO DO SOFTWARE "CloudS - INTERATIVO | SISTEMAS NA NUVEM"
/*
TODA E QUALQUER DISTRIBUIÇÃO OU ALTERAÇÃO DESSE MÓDULO SEM AUTORIZAÇÃO POR ESCRITO E DOCUMENTADA PODERÁ SER INTERPRETADA COMO QUEBRA DE DIREITO DE PROPRIEDADE INTELECTUAL POR DIREITO DO ANALISTA DE DESENVOLVIMENTO E PROGRAMADOR RENATO NASCIMENTO DE LIMA CEO DA INTERATIVO NEGÓCIOS.

CONTATOS PARA INFORMAÇÕES DE DISTRIBUIÇÃO +55 (69) 9239-5959 / contato@interativo.net
*/
include("../Connections/criativo.php");
include ("../Connections/seguranca_cms.php");
//COMANDO CONTROLE//
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "controle")) {
  $arquivo = isset($_FILES["icone_16x16"]) ? $_FILES["icone_16x16"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_16x16 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_16x16;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_16x16"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_16x16 = $_POST["icone_16x16_original"];
  }
  
  $arquivo = isset($_FILES["icone_32x32"]) ? $_FILES["icone_32x32"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_32x32 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_32x32;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_32x32"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_32x32 = $_POST["icone_32x32_original"];
  }
  
  $arquivo = isset($_FILES["icone_36x36"]) ? $_FILES["icone_36x36"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_36x36 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_36x36;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_36x36"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_36x36 = $_POST["icone_36x36_original"];
  }
  
  $arquivo = isset($_FILES["icone_48x48"]) ? $_FILES["icone_48x48"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_48x48 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_48x48;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_48x48"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_48x48 = $_POST["icone_48x48_original"];
  }
  
  $arquivo = isset($_FILES["icone_57x57"]) ? $_FILES["icone_57x57"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_57x57 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_57x57;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_57x57"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_57x57 = $_POST["icone_57x57_original"];
  }
  
  $arquivo = isset($_FILES["icone_60x60"]) ? $_FILES["icone_60x60"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_60x60 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_60x60;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_60x60"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_60x60 = $_POST["icone_60x60_original"];
  }
  
  $arquivo = isset($_FILES["icone_70x70"]) ? $_FILES["icone_70x70"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_70x70 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_70x70;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_70x70"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_70x70 = $_POST["icone_70x70_original"];
  }
  
  $arquivo = isset($_FILES["icone_72x72"]) ? $_FILES["icone_72x72"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_72x72 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_72x72;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_72x72"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_72x72 = $_POST["icone_72x72_original"];
  }
  
  $arquivo = isset($_FILES["icone_76x76"]) ? $_FILES["icone_76x76"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_76x76 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_76x76;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_76x76"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_76x76 = $_POST["icone_76x76_original"];
  }
  
  $arquivo = isset($_FILES["icone_96x96"]) ? $_FILES["icone_96x96"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_96x96 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_96x96;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_96x96"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_96x96 = $_POST["icone_96x96_original"];
  }
 
  $arquivo = isset($_FILES["icone_120x120"]) ? $_FILES["icone_120x120"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_120x120 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_120x120;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_120x120"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_120x120 = $_POST["icone_120x120_original"];
  }
  
  $arquivo = isset($_FILES["icone_114x114"]) ? $_FILES["icone_114x114"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_114x114 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_114x114;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_114x114"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_114x114 = $_POST["icone_114x114_original"];
  }
  
  $arquivo = isset($_FILES["icone_144x144"]) ? $_FILES["icone_144x144"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_144x144 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_144x144;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_144x144"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_144x144 = $_POST["icone_144x144_original"];
  }
  
  $arquivo = isset($_FILES["icone_150x150"]) ? $_FILES["icone_150x150"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_150x150 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_150x150;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_150x150"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_150x150 = $_POST["icone_150x150_original"];
  }
  
  $arquivo = isset($_FILES["icone_152x152"]) ? $_FILES["icone_152x152"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_152x152 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_152x152;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_152x152"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_152x152 = $_POST["icone_152x152_original"];
  }
  
  $arquivo = isset($_FILES["icone_180x180"]) ? $_FILES["icone_180x180"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_180x180 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_180x180;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_180x180"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_180x180 = $_POST["icone_180x180_original"];
  }
  
  $arquivo = isset($_FILES["icone_192x192"]) ? $_FILES["icone_192x192"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_192x192 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_192x192;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_192x192"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_192x192 = $_POST["icone_192x192_original"];
  }
  
  $arquivo = isset($_FILES["icone_310x310"]) ? $_FILES["icone_310x310"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icone_310x310 = $imagem;
  	 $imagem_dir = "../conteudo/img/".$icone_310x310;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["icone_310x310"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icone_310x310 = $_POST["icone_310x310_original"];
  }
	
  $updateSQL = sprintf("UPDATE interface_movel SET icone_16x16=%s, icone_32x32=%s, icone_36x36=%s, icone_48x48=%s, icone_57x57=%s, icone_60x60=%s, icone_70x70=%s, icone_72x72=%s, icone_76x76=%s, icone_96x96=%s, icone_114x114=%s, icone_120x120=%s, icone_144x144=%s, icone_150x150=%s, icone_152x152=%s, icone_180x180=%s, icone_192x192=%s, icone_310x310=%s, titulo_interface_movel=%s WHERE id_interface_movel=%s",
					   GetSQLValueString($icone_16x16, "text"),
					   GetSQLValueString($icone_32x32, "text"),
					   GetSQLValueString($icone_36x36, "text"),
					   GetSQLValueString($icone_48x48, "text"),
					   GetSQLValueString($icone_57x57, "text"),
					   GetSQLValueString($icone_60x60, "text"),
					   GetSQLValueString($icone_70x70, "text"),
					   GetSQLValueString($icone_72x72, "text"),
					   GetSQLValueString($icone_76x76, "text"),
					   GetSQLValueString($icone_96x96, "text"),
					   GetSQLValueString($icone_114x114, "text"),
					   GetSQLValueString($icone_120x120, "text"),
					   GetSQLValueString($icone_144x144, "text"),
					   GetSQLValueString($icone_150x150, "text"),
					   GetSQLValueString($icone_152x152, "text"),
					   GetSQLValueString($icone_180x180, "text"),
					   GetSQLValueString($icone_192x192, "text"),
					   GetSQLValueString($icone_310x310, "text"),
					   GetSQLValueString($_POST['titulo_interface_movel'],"text"),
					   GetSQLValueString($_POST['id_interface_movel'],"int"));
					   
  mysql_select_db($database_criativo, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());
	?>
	<SCRIPT language="JavaScript">
		alert("Cadastro Atualizado com Sucesso");
		location.href="inicial.php";
	</script>
	<?
}

$operacao = "MM_insert";
$botao = "<button type=\"submit\" class=\"btn btn-primary\">Cadastrar</button>";

if (isset($_GET['cod'])) {
  $colname_busca_dados = $_GET['cod'];
}
mysql_select_db($database_criativo, $conexao);
if ($colname_busca_dados) {
	$query_busca_dados = sprintf("SELECT * FROM interface_movel WHERE id_interface_movel = %s", GetSQLValueString($colname_busca_dados, "int"));
	$busca_dados = mysql_query($query_busca_dados) or die(mysql_error());
	$row_busca_dados = mysql_fetch_assoc($busca_dados);
	$totalRows_busca_dados = mysql_num_rows($busca_dados);
	$operacao = "MM_update";
	$botao = "<button type=\"submit\" class=\"btn btn-primary\">Atualizar</button>";
}
//FIM DO COMANDO CONTROLE//
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="iso-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RENAN MALDONADO ADVOGADOS | INTERFACE MÓVEL | CLOUDS | SISTEMA GERENCIADOR DE CONTEÚDO</title>
<link rel="shortcut icon" href="img/favicon.ico">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/londinium-theme.min.css" rel="stylesheet" type="text/css">
<link href="css/styles.min.css" rel="stylesheet" type="text/css">
<link href="css/icons.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<script type="text/javascript" src="ajax/jquery.min.js"></script>
<script type="text/javascript" src="ajax/jquery-ui.min.js"></script>
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
<script type="text/javascript" src="js/globalize/globalize.js"></script>
<script type="text/javascript" src="js/globalize/globalize.culture.de-DE.js"></script>
<script type="text/javascript" src="js/globalize/globalize.culture.ja-JP.js"></script>
<script type="text/javascript" src="js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="js/plugins/interface/mousewheel.js"></script>
<script type="text/javascript" src="js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/timepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/collapsible.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/application.js"></script>
</head>
<body class="sidebar-wide">
<!-- Navbar -->
<?php include("includes/topo.php"); ?>
<!-- /navbar -->
<!-- Page container -->
<div class="page-container">
  <!-- Sidebar -->
  <?php include("includes/menu.php"); ?>
  <!-- /sidebar -->
  <!-- Page content -->
  <div class="page-content">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3>INTERFACE MÓVEL <small>FORMULÁRIO DE CONTROLE DE DADOS</small></h3>
      </div>
    </div>
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="inicial.php">PAINEL</a></li>
        <li class="active">INTERFACE MÓVEL</li>
      </ul>
    </div>
    <!-- /breadcrumbs line -->
    <!-- Callout -->
    <div class="callout callout-danger fade in">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <h5>Atenção</h5>
      <p>É importante que sejam preenchidos todos os campos de forma correta.</p>
    </div>
    <!-- /callout -->
    <!-- Form components -->
    <form method="post" name="controle" class="form-horizontal" role="form" action="<?php echo $editFormAction; ?>" onSubmit="return checkForm(this)" ENCTYPE="multipart/form-data">
      <!-- Basic inputs -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h6 class="panel-title"><i class="icon-bubble4"></i> Formulário de Controle</h6>
        </div>
        <div class="panel-body">
        
          <div class="form-group">
            <label class="col-sm-2 control-label">Título APP HTML5: </label>
            <div class="col-sm-10">
              <input id="titulo_interface_movel" name="titulo_interface_movel" type="text" class="form-control" value="<?=$row_busca_dados["titulo_interface_movel"];?>">
            </div>
          </div>
        
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_16x16"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_16x16"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 16x16 Android | Navegadores: </label>
            <div class="col-sm-9">
              <input id="icone_16x16" name="icone_16x16" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_32x32"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_32x32"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 32x32: </label>
            <div class="col-sm-9">
              <input id="icone_32x32" name="icone_32x32" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_36x36"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_36x36"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 36x36: </label>
            <div class="col-sm-9">
              <input id="icone_36x36" name="icone_36x36" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_48x48"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_48x48"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 48x48: </label>
            <div class="col-sm-9">
              <input id="icone_48x48" name="icone_48x48" type="file" class="styled">
            </div>
          </div>
          
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_57x57"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_57x57"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 57x57: </label>
            <div class="col-sm-9">
              <input id="icone_57x57" name="icone_57x57" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_60x60"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_60x60"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 60x60: </label>
            <div class="col-sm-9">
              <input id="icone_60x60" name="icone_60x60" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_70x70"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_70x70"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 70x70: </label>
            <div class="col-sm-9">
              <input id="icone_70x70" name="icone_70x70" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_72x72"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_72x72"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 72x72 iOS | iPhones | BlackBerry | Windows Phone | FirefoxOS | Ubuntu Phone: </label>
            <div class="col-sm-9">
              <input id="icone_72x72" name="icone_72x72" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_76x76"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_76x76"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 76x76 iOS | iPhones | BlackBerry | Windows Phone | FirefoxOS | Ubuntu Phone: </label>
            <div class="col-sm-9">
              <input id="icone_76x76" name="icone_76x76" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_96x96"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_96x96"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 96x96: </label>
            <div class="col-sm-9">
              <input id="icone_96x96" name="icone_96x96" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_114x114"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_114x114"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 114x114 iOS | iPads | Tablets | BlackBerry | Windows Phone | FirefoxOS | Ubuntu Phone: </label>
            <div class="col-sm-9">
              <input id="icone_114x114" name="icone_114x114" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_120x120"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_120x120"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 120x120 iOS | iPads | Tablets | BlackBerry | Windows Phone | FirefoxOS | Ubuntu Phone: </label>
            <div class="col-sm-9">
              <input id="icone_120x120" name="icone_120x120" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_144x144"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_144x144"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 144x144 iOS | iPads | Tablets | BlackBerry | Windows Phone | FirefoxOS | Ubuntu Phone: </label>
            <div class="col-sm-9">
              <input id="icone_144x144" name="icone_144x144" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_150x150"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_150x150"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 150x150: </label>
            <div class="col-sm-9">
              <input id="icone_150x150" name="icone_150x150" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_152x152"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_152x152"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 152x152 iOS | iPads | Tablets | BlackBerry | Windows Phone | FirefoxOS | Ubuntu Phone: </label>
            <div class="col-sm-9">
              <input id="icone_152x152" name="icone_152x152" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_180x180"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_180x180"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 180x180: </label>
            <div class="col-sm-9">
              <input id="icone_180x180" name="icone_180x180" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_192x192"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_192x192"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 192x192 Android | Tablets | Apps Chrome HTML5: </label>
            <div class="col-sm-9">
              <input id="icone_192x192" name="icone_192x192" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["icone_310x310"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["icone_310x310"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Ícone 310x310: </label>
            <div class="col-sm-9">
              <input id="icone_310x310" name="icone_310x310" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-actions text-right">
            <?=$botao;?>
          </div>
        </div>
      </div>
      <input type="hidden" name="<?=$operacao;?>" value="controle" />
      <input name="icone_16x16_original" type="hidden" id="icone_16x16_original" value="<?=$row_busca_dados["icone_16x16"];?>" />
      <input name="icone_32x32_original" type="hidden" id="icone_32x32_original" value="<?=$row_busca_dados["icone_32x32"];?>" />
      <input name="icone_36x36_original" type="hidden" id="icone_36x36_original" value="<?=$row_busca_dados["icone_36x36"];?>" />
      <input name="icone_48x48_original" type="hidden" id="icone_48x48_original" value="<?=$row_busca_dados["icone_48x48"];?>" />
      <input name="icone_57x57_original" type="hidden" id="icone_57x57_original" value="<?=$row_busca_dados["icone_57x57"];?>" />
      <input name="icone_60x60_original" type="hidden" id="icone_60x60_original" value="<?=$row_busca_dados["icone_60x60"];?>" />
      <input name="icone_70x70_original" type="hidden" id="icone_70x70_original" value="<?=$row_busca_dados["icone_70x70"];?>" />
      <input name="icone_72x72_original" type="hidden" id="icone_72x72_original" value="<?=$row_busca_dados["icone_72x72"];?>" />
      <input name="icone_76x76_original" type="hidden" id="icone_76x76_original" value="<?=$row_busca_dados["icone_76x76"];?>" />
      <input name="icone_96x96_original" type="hidden" id="icone_96x96_original" value="<?=$row_busca_dados["icone_96x96"];?>" />
      <input name="icone_114x114_original" type="hidden" id="icone_114x114_original" value="<?=$row_busca_dados["icone_114x114"];?>" />
      <input name="icone_120x120_original" type="hidden" id="icone_120x120_original" value="<?=$row_busca_dados["icone_120x120"];?>" />
      <input name="icone_144x144_original" type="hidden" id="icone_144x144_original" value="<?=$row_busca_dados["icone_144x144"];?>" />
      <input name="icone_150x150_original" type="hidden" id="icone_150x150_original" value="<?=$row_busca_dados["icone_150x150"];?>" />
      <input name="icone_152x152_original" type="hidden" id="icone_152x152_original" value="<?=$row_busca_dados["icone_152x152"];?>" />
      <input name="icone_180x180_original" type="hidden" id="icone_180x180_original" value="<?=$row_busca_dados["icone_180x180"];?>" />
      <input name="icone_192x192_original" type="hidden" id="icone_192x192_original" value="<?=$row_busca_dados["icone_192x192"];?>" />
      <input name="icone_310x310_original" type="hidden" id="icone_310x310_original" value="<?=$row_busca_dados["icone_310x310"];?>" />
      <input name="id_interface_movel" type="hidden" id="id_interface_movel" value="<?=$row_busca_dados["id_interface_movel"];?>" />
      <!-- /basic inputs -->
      </form>
      
    
    <!-- Footer -->
    <?php include("includes/rodape.php"); ?>
    <!-- /footer -->
  </div>
  <!-- /page content -->
</div>
<!-- /page container -->
</body>
</html>
<?php include("../Connections/end_criativo.php"); ?>